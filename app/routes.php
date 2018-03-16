<?php
// Agradeço a DEUS pelo dom do conhecimento

$router->get('', 'EventController@index');
$router->get('events', 'EventController@list');
$router->get('event/{id}', 'EventController@getOne');

$router->post('event/create', 'EventController@store');

$router->update('event/{id}/update', 'EventController@update');
$router->delete('event/{id}/delete', 'EventController@delete');
