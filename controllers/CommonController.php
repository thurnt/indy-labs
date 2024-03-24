<?php

namespace App\Controllers;

class CommonController
{
    public function notfound()
    {
        include PAGE_PATH . '/' . "auth-404-alt.php";
    }
    public function offline()
    {
        include PAGE_PATH . '/' . "auth-offline.php";
    }
}
