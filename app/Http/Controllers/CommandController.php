<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function runCommand($id)
    {
        Artisan::call('fetch:'.$id.'');
        return redirect()->route('home');
    }
}
