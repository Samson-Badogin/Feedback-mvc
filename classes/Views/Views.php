<?php

namespace Views;

use Views\Temp;

class Views
{
    public static function renderForm(string $file)
    {
        include("Temp/$file");
        return;
    }
}
