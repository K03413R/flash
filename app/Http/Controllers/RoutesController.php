<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use mysql_xdevapi\Exception;
use Spatie\QueryBuilder\QueryBuilder;

class RoutesController extends Controller
{
    public function index()
    {
        $routes = QueryBuilder::for(Route::class)
            ->allowedSorts(['name', 'grade', 'id'])
            ->allowedFilters(['name'])
            ->orderBy('name', 'Asc');

        if($search = \request('search')){
            $routes->where('name', 'like', "%$search%");
        }

        return Inertia::render('Routes', [
           'routes' => $routes->get()->map(function(Route $route){
               return [
                   'id' => $route->id,
                   'name' => $route->name,
                   'color' => $route->color,
                   'grade' => $route->grade,
               ];
           }),
        ]);
    }

    public function create()
    {
        return \inertia('Routes/Create');
    }

    public function edit(Route $route)
    {
        return \inertia('Routes/Edit', [
            'form' => $route->only([
                'name',
                'color',
                'grade',
            ]),
            'routeId' => $route->id
        ]);
    }

    public function store(Request $request)
    {
        Route::create($request->validate([
            'name' => 'required',
            'grade' => 'required',
            'color' => 'required'
        ]));
        return \redirect('/routes');
    }

    public function update(Route $route, Request $request)
    {
        $route->update($request->validate([
            'name' => 'required',
            'grade' => 'required',
            'color' => 'required'
        ]));
        return \redirect('/routes');
    }

    public function destroy(Route $route)
    {
        $route->delete();
        return \redirect('/routes', 303);
    }
}
