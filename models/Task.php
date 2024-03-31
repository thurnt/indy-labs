<?php

class TaskModel extends TableCRUD
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
            'created_at' => 'DATETIME',
            'updated_at' => 'DATETIME',
            'title' => 'VARCHAR(255)',
            'summary' => 'TEXT NULL',
            'description' => 'TEXT NULL',
            'priority' => 'VARCHAR(50)',
            'status' => 'VARCHAR(50)',
            'deadline' => 'DATE NULL',
            'category' => 'VARCHAR(100) NULL',
            'tags' => 'VARCHAR(100) NULL',
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}
