<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function addDriver(): View
    {
        return view('add-driver');
    }
}
