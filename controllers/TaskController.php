<?php


class TaskController
{
    public function index()
    {
        $table = new TableCRUD("task");
        $results = $table->read();
        get_template_part("apps-tasks-list-view.php", array('results' => $results));
    }

    public function addNew()
    {
        include PAGE_PATH . "/apps-tasks-create.php";
    }

    public function create()
    {
        $table = new TableCRUD("task");
        $result = $table->create($this->extract($_POST));
        if ($result) {
            header("Location: " . APP_PATH . "/task");
        } else {
            header("Location: " . APP_PATH . "/task/new");
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
        $table = new TableCRUD("task");
        $cond = "`id` = " . $id;
        $data = $table->read($cond);
        get_template_part("/apps-tasks-create.php", array('data' => $data[0]));
    }

    public function update($id)
    {
        $table = new TableCRUD("task");
        $result = $table->update($id, $this->extract($_POST));
        session_start();
        if ($result) {
            $_SESSION['success_notice'] = 'Your post was updated successfully.';
            header("Location: " . APP_PATH . "/task/edit/" . $id . "?success=1");
        } else {
            $_SESSION['error_message'] = 'An error occurred while updating your post. Please try again.';
            header("Location: " . APP_PATH . "/task/edit/" . $id . "?error=1");
        }
    }

    public function view($id)
    {
        $table = new TableCRUD("task");
        $cond = "`id` = " . $id;
        $data = $table->read($cond);
        if (count($data) > 0) {
            get_template_part("/apps-tasks-details.php", array('data' => $data[0]));
        } else {
            get_template_part("/auth-404-alt");
        }
    }

    public function delete($id)
    {
        $table = new TableCRUD("task");
        $result = $table->delete($id);
        session_start();
        if ($result) {
            header("Location: " . APP_PATH . "/task");
        } else {
            $_SESSION['error_message'] = 'An error occurred while deleting your post. Please try again.';
            header("Location: " . APP_PATH . "/task?error=1");
        }
    }
}
