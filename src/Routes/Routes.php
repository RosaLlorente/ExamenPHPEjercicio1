<?php
namespace Routes;
use Lib\Router;
use Controllers\UserController;
use Controllers\ErrorController;

class Routes{
    public static function index(){
        //User
        Router::add('GET','/',function(){
            (new UserController())->register();
        });

        //Error 404
        Router::add('GET','/not-found',function(){
            ErrorController::error404();
        });

        Router::dispatch();
    }
}