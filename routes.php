<?php


$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->post('/listings', 'ListingController@store');
$router->get('/listings/create', 'ListingController@create');


$router->put('/listings/update/{id}', 'ListingController@update');
$router->get('/listings/edit/{id}', 'ListingController@edit');


$router->get('/listings/{id}', 'ListingController@show');
$router->delete('/listings/{id}', 'ListingController@destroy');


$router->get('/auth/register', 'UserController@create');
$router->get('/auth/login', 'UserController@login');
$router->post('/auth/register', 'UserController@store');
$router->post('/auth/login', 'UserController@authenticate');
$router->get('/logout', 'UserController@logout');