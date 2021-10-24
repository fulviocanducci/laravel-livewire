<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;

class TestController extends Controller
{
    public function index() 
    {
        return (PDF::loadView('test'))->stream();
    }
}
