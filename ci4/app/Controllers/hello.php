<?php

namespace App\Controllers;

class Hello extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function hello_message()  
    {  
        return view('hello');
    }  
}
?>  