<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        include PAGE_PATH . "/dashboard-projects.php";
    }
}
