<?php

class TodoModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('todo');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'title' => 'VARCHAR(255)',
            'status' => 'ENUM("Pending", "InProgress", "Completed")', // Assuming status options
            'priority' => 'ENUM("Low", "Medium", "High")', // Assuming priority levels
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
