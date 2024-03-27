<?php

namespace App\Controllers;

use TableCRUD;

class ProjectController
{
    public function index()
    {
        $table = new TableCRUD("project");
        $results = $table->read();
        get_template_part("apps-projects-list.php", array('results' => $results));
    }

    public function addNew()
    {
        include PAGE_PATH . "/apps-projects-create.php";
    }

    public function extract($post)
    {
        $data = array();
        $params = array("title", "summary", "description", "priority", "status", "deadline", "privacy", "category", "tags", "member_lead", "member_list");
        foreach ($post as $key => $value) {
            if (in_array($key, $params)) {
                $data[$key] = isset($value) ? $value : null;
                if ($key == "deadline" && isset($value)) {
                    $data[$key] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
                }
            }
        }
        return $data;
    }

    public function create()
    {
        $table = new TableCRUD("project");
        $result = $table->create($this->extract($_POST));
        if ($result) {
            header("Location: " . APP_PATH . "/project");
        } else {
            header("Location: " . APP_PATH . "/project/new");
        }
    }
}
