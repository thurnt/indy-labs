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

    public function extract($post)
    {
        $data = array();
        $params = array("title", "summary", "description", "priority", "status", "deadline", "category", "tags");
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

    public function edit($id)
    {
        $table = new TableCRUD("project");
        $cond = "`id` = " . $id;
        $data = $table->read($cond);
        get_template_part("/apps-projects-create.php", array('data' => $data[0]));
    }

    public function update($id)
    {
        $table = new TableCRUD("project");
        $result = $table->update($id, $this->extract($_POST));
        session_start();
        if ($result) {
            $_SESSION['success_notice'] = 'Your post was updated successfully.';
            header("Location: " . APP_PATH . "/project/edit/" . $id . "?success=1");
        } else {
            $_SESSION['error_message'] = 'An error occurred while updating your post. Please try again.';
            header("Location: " . APP_PATH . "/project/edit/" . $id . "?error=1");
        }
    }

    public function view($id)
    {
        $table = new TableCRUD("project");
        $cond = "`id` = " . $id;
        $data = $table->read($cond);
        if (count($data) > 0) {
            get_template_part("/apps-projects-overview.php", array('data' => $data[0]));
        } else {
            get_template_part("/auth-404-alt");
        }
    }

    public function delete($id)
    {
        $table = new TableCRUD("project");
        $result = $table->delete($id);
        session_start();
        if ($result) {
            header("Location: " . APP_PATH . "/project");
        } else {
            $_SESSION['error_message'] = 'An error occurred while deleting your post. Please try again.';
            header("Location: " . APP_PATH . "/project?error=1");
        }
    }
}
