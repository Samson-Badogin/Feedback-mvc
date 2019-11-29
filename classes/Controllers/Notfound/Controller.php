<?php

namespace Controllers\Notfound;

use Views\Views;
use Models\Messages;
use App\Router;
use Models\Message;

class Controller
{
    public function NFMethod()
    {
        echo '<style>.outer {text-align: center;}</style><h1 class="outer"><br>404<br>Страница не найдена</h1>';
        $ins = new Message;
        $ins->insertMessage();
        return true;
    }
}
