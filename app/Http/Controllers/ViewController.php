<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ViewController extends Controller
{
    public function app() {
        $view = App::environment('local') ? 'dev' : 'app';
        return view($view);
    }
}
