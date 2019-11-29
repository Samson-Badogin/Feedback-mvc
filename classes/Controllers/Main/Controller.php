<?php

namespace Controllers\Main;

use Views\Views;
use Models\Message;
use App\Router;

class Controller
{
    public function helloMethod()
    {
        echo '<h1><br>HELLO WORLD!</h1>';
    }

    public function byeMethod()
    {
        echo '<h1><br>GOOD BYE MY FRIEND!</h1>';
    }

    public function index()
    {
        echo "This is index in Main Controller";
    }

    public function form()
    {
        $file = 'main.tpl';
        $view= new Views();
        echo $view->renderForm($file);
    }
}
