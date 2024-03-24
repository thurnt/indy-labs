<?php

class ProjectModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('task');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'name' => 'VARCHAR(255)',
            'description' => 'TEXT',
            'created_date' => 'DATE',
            'due_date' => 'DATE',
            'status' => 'ENUM("ToDo", "InProgress", "Done")', // Assuming status options
            'priority' => 'ENUM("Low", "Medium", "High")' // Assuming priority levels
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}

