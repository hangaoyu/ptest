<?php


Route::get('/package', function () {
    return view('welcome');
});
$attributes = [
    'prefix'        => config('ptest.route.prefix'),
    'namespace'     => 'Hgy\\PackageTest\\Controllers',
    'middleware'    => config('ptest.route.middleware'),
];

Route::group($attributes, function ($router) {
    $router->get('well', 'TestController@index');
    $router->get('view',function (){
       return view('packages::test');
    });

});