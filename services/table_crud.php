<?php

class TableCRUD
{
    private $db;
    private $db_name;
    private $table_name;

    public function __construct($table_name)
    {
        global $db;
        $this->db = $db;
        $this->db_name = $_ENV['DB_NAME'];
        $this->table_name = $table_name;
    }

    // Check if the table exists
    public function tableExists()
    {
        $sql = "SHOW TABLES LIKE '" . $this->table_name . "'";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }

    // Create a table structure
    public function createTableStructure($columns)
    {
        // Ensure columns are provided
        if (empty($columns) || !is_array($columns)) {
            return false; // No columns provided or invalid format
        }

        // Construct the SQL query to create the table
        $sql = "CREATE TABLE IF NOT EXISTS " . $this->table_name . " (";
        foreach ($columns as $column => $type) {
            $sql .= $column . " " . $type . ",";
        }
        $sql = rtrim($sql, ","); // Remove the trailing comma
        $sql .= ")";

        // Execute the SQL query
        if ($this->db->query($sql) === TRUE) {
            return true; // Table created successfully
        } else {
            return false; // Failed to create table
        }
    }

    public function deleteTable()
    {
        return $this->db->query("DROP TABLE IF EXISTS " . $this->table_name);
    }

    public function calculateSize()
    {
        $sql = "SELECT 
            table_name AS `Table`,
            round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB`
        FROM 
            information_schema.tables 
        WHERE 
            table_schema = '" . $this->db_name . "' 
            AND table_name = '" . $this->table_name . "'";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Size in MB"];
            }
        } else {
            return 0;
        }
    }

    // Create a record
    public function create($data)
    {
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        if (!isset($data['updated_at'])) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        $data['created_at'] = date('Y-m-d H:i:s', strtotime($data['created_at']));
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime($data['updated_at']));

        $keys = array_keys($data);
        $values = array_map(array($this->db, 'real_escape_string'), array_values($data));
        $sql = "INSERT INTO " . $this->table_name . " (" . implode(',', $keys) . ") VALUES ('" . implode("','", $values) . "')";

        if ($this->db->query($sql) === TRUE) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    // Read records
    public function read($condition = null)
    {
        $sql = "SELECT * FROM " . $this->table_name;

        if ($condition !== null) {
            $sql .= " WHERE " . $condition;
        }
        $sql .= " ORDER BY `created_at` DESC";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return []; // No records found
        }
    }

    // Update a record
    public function update($id, $data)
    {
        // Construct the SET part of the SQL query
        $set = [];
        foreach ($data as $key => $value) {
            // Escape the value to prevent SQL injection
            $value = $this->db->real_escape_string($value);
            // Append the key-value pair to the SET array
            $set[] = "$key = '$value'";
        }
        // Combine all elements of the SET array into a comma-separated string
        $setString = implode(', ', $set);

        // Construct the SQL query
        $sql = "UPDATE " . $this->table_name . " SET $setString WHERE id = ?";

        // Prepare the statement
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            // Bind the parameter and execute the statement
            $stmt->bind_param('i', $id);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                return true; // Update successful
            } else {
                $stmt->close();
                return false; // Update failed
            }
        } else {
            // Error in preparing the statement
            return false;
        }
    }

    // Delete a record
    public function delete($id)
    {
        // Implement your logic to delete a record from the table
    }
}
