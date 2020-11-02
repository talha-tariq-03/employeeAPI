<?php

namespace App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->group(['prefix' => 'api'], function () use ($app) {



    $app->get('employees',  ['uses' => 'App\Http\Controllers\EmployeeController@showAllEmployee']);

    $app->get('employees/{id}', ['uses' => 'App\Http\Controllers\EmployeeController@showOneEmployee']);

    $app->post('employees', ['uses' => 'App\Http\Controllers\EmployeeController@create']);

    $app->delete('employees/{id}', ['uses' => 'App\Http\Controllers\EmployeeController@delete']);

    $app->put('employees/{id}', ['uses' => 'App\Http\Controllers\EmployeeController@update']);

    $app->get('employees/all/locations',  ['uses' => 'App\Http\Controllers\EmployeeController@getAllLocations']);

    $app->get('employee/{position}',  ['uses' => 'App\Http\Controllers\EmployeeController@getEmployeeWithPosition']);
});
