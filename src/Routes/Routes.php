<?php
namespace Routes;
use Lib\Router;
use Controllers\UserController;
use Controllers\ErrorController;
use Controllers\MedicosController;

class Routes{
    public static function index(){
        Router::add('GET','/',function(){
            (new MedicosController())->ListMedicos();
        });
        //User
        
        Router::add('GET','/register',function(){
            (new UserController())->Register();
        });

        Router::add('POST','/register',function(){
            (new UserController())->Register();
        });

        Router::add('GET','/login',function(){
            (new UserController())->Login();
        });
        Router::add('POST','/login',function(){
            (new UserController())->Login();
        });

        
        Router::add('GET','/logout',function(){
            (new UserController())->Logout();
        });
        //Error 404
        Router::add('GET','/not-found',function(){
            ErrorController::error404();
        });

        Router::dispatch();
    }
}