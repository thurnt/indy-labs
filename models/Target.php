<?php

class ProjectModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('target');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'title' => 'VARCHAR(255)',
            'description' => 'TEXT',
            'priority' => 'ENUM("Low", "Medium", "High")', // Assuming priority levels
            'status' => 'ENUM("Pending", "InProgress", "Completed")', // Assuming status options
            'due_date' => 'DATE'
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}

