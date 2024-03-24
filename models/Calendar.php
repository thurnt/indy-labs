<?php

class ProjectModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('calendar');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'type' => 'VARCHAR(50)', // Assuming type as a string
            'name' => 'VARCHAR(255)',
            'start_date' => 'DATE',
            'end_date' => 'DATE',
            'start_time' => 'TIME',
            'end_time' => 'TIME',
            'description' => 'TEXT'
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}

