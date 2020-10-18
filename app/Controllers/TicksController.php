<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Tick;
use Illuminate\Http\Request;

class TicksController extends Controller
{
    public function store(Route $route, Request $request)
    {
        $route->ticks()->create([
            'comment' => $request->comment
        ]);
    }
}
