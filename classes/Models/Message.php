<?php

namespace Models;

use App\App;

class Message
{
    public function getMessages()
    {
        $sql = 'SELECT * FROM message';   
        $data = App::$database->getAll($sql);
        return $data;
    }

    public function insertMessage()
    {
        $sql = 'INSERT INTO message (name, email, message) VALUES (1, 2, 3)';
        $data = App::$database->insert($sql);
        return;
    }
}
