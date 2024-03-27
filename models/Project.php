<?php

class ProjectModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('project');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'created_at' => 'DATETIME',
            'updated_at' => 'DATETIME',
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'title' => 'VARCHAR(255)',
            'summary' => 'TEXT NULL',
            'description' => 'TEXT NULL',
            'priority' => 'ENUM("Low", "Medium", "High")',
            'status' => 'ENUM("ToDo", "InProgress", "Done")',
            'deadline' => 'DATE NULL',
            'privacy' => 'ENUM("Public", "Private")',
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
