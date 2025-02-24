<?php

namespace Controllers;

use Lib\Pages;

class UserController{

    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function register()
    {
        $this->pages->render('User/RegisterForm'); 
    }
}
