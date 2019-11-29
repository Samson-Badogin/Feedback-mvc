<?php
namespace App;

use App\Router;
use App\DB;

class App 
{
    public static $database;
    public static $router;

    public function __construct()
    {
        self::$database = new DB();
        self::$router = new Router($_SERVER['REQUEST_URI']);
    }

    public function run()
    {
        self::$router->run();
    }
}
