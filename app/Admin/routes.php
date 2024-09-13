<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\CompanyControllers;
use App\Admin\Controllers\PilotControllers;
use App\Admin\Controllers\AirportControllers;
use App\Admin\Controllers\CompagnieControllers;
use App\Admin\Controllers\Cost_centerControllers;
use App\Admin\Controllers\BoatControllers;
use App\Admin\Controllers\ChampControllers;
use  App\Admin\Controllers\ActivityControllers;
use App\Admin\Controllers\TypeboatControllers;
use App\Admin\Controllers\CategoryControllers;
use App\Admin\Controllers\HotelControllers;
use App\Admin\Controllers\RoomControllers;
use App\Admin\Controllers\LocationControllers;
use App\Admin\Controllers\NouveauvoyageControllers;
use App\Admin\Controllers\VoyageControllers;
use App\Admin\Controllers\EquipageControllers;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('companies', CompanyControllers::class);
    $router->resource('pilots', PilotControllers::class);
    $router->resource('airports', AirportControllers::class);
    $router->resource('compagnies', CompagnieControllers::class);
    $router->resource('cost_centers', Cost_centerControllers::class);
    $router->resource('boats', BoatControllers::class);
    $router->resource('champs', ChampControllers::class);
    $router->resource('activities', ActivityControllers::class);
    $router->resource('typeboats', TypeboatControllers::class);
    $router->resource('categories', CategoryControllers::class);
    $router->resource('hotels', HotelControllers::class);
    $router->resource('rooms', RoomControllers::class);
    $router->resource('locations', LocationControllers::class);
    $router->resource('nouveauvoyages', NouveauvoyageControllers::class);
    $router->resource('voyages', VoyageControllers::class);
    $router->resource('equipages', EquipageControllers::class);
});
Route::post('/submit-form', [VoyageControllers::class, 'store_data']);
