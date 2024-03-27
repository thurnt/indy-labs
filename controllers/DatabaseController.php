<?php

namespace App\Controllers;

use TableCRUD;

class DatabaseController
{
    public function index()
    {
        get_template_part("database-list.php");
    }

    public function refresh()
    {
        if (isset($_POST['table_name'])) {
            $table = checkDBModel($_POST['table_name']);
            $table->down();
            $table->up();
            header("Location: " . APP_PATH . "/database");
        }
    }
}
