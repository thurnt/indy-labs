<?php

namespace App\Controllers;

class CommonController
{
    public function notfound()
    {
        include PAGE_PATH . '/' . "auth-404-alt.php";
    }
    public function error()
    {
        include PAGE_PATH . '/' . "auth-500.php";
    }
}
