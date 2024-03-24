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
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'title' => 'VARCHAR(255)',
            'description' => 'TEXT',
            'priority' => 'ENUM("Low", "Medium", "High")',
            'status' => 'ENUM("ToDo", "InProgress", "Done")',
            'deadline' => 'DATE',
            'privacy' => 'ENUM("Public", "Private")',
            'category' => 'VARCHAR(100)',
            'tag' => 'VARCHAR(100)',
            'member_lead' => 'INT',
            'member_list' => 'TEXT'
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}

