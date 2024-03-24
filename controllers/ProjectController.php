<?php

namespace App\Controllers;

class ProjectController
{
    public function index()
    {
        include PAGE_PATH . "/apps-projects-list.php";
    }

    public function addNew()
    {
        include PAGE_PATH . "/apps-projects-create.php";
    }

    public function create()
    {
        var_dump($_POST);
        die();
    }
}
