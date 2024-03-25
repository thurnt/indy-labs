<?php

class UserModel extends TableCRUD
{
    public function __construct()
    {
        parent::__construct('user');
    }

    public function up()
    {
        // Define the table structure
        $columns = array(
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'email' => 'VARCHAR(255) NOT NULL UNIQUE KEY', 
            'username' => 'VARCHAR(255) NOT NULL',
            'password' => 'VARCHAR(255) NOT NULL',
            'token' => 'VARCHAR(255) DEFAULT NULL',
            'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
        );

        // Create the table structure
        $this->createTableStructure($columns);
    }

    public function down()
    {
        $this->deleteTable();
    }
}

