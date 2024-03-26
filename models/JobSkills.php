<?php

class JobSkillsModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('job_skills');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'title' => 'VARCHAR(255)',
            'description' => 'TEXT',
            'priority' => 'ENUM("Low", "Medium", "High")', // Assuming priority levels
            'tags' => 'TEXT' // Assuming tags as comma-separated list of strings
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}
