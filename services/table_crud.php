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
        // Implement your logic to insert data into the table
    }

    // Read records
    public function read($condition = null)
    {
        // Implement your logic to fetch data from the table
    }

    // Update a record
    public function update($id, $data)
    {
        // Implement your logic to update a record in the table
    }

    // Delete a record
    public function delete($id)
    {
        // Implement your logic to delete a record from the table
    }
}
