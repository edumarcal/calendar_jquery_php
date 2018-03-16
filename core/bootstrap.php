<?php
// Agradeço a Deus pelo dom do conhecimento

use App\Core\App;
use App\Core\Database\{ QueryBuilder, Connection };

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));

function view($view, $data = [])
{
	extract($data);
	return require "app/views/{$view}.php";
}

function redirect($uri = '')
{
	header("Location: /{$uri}");
}

function json($data)
{
	header('Content-Type: application/json');
	$json = json_encode($data, JSON_PRETTY_PRINT);
	/*	
	switch (json_last_error()) {
	    case JSON_ERROR_NONE:
	        echo ' - No errors';
	    break;
	    case JSON_ERROR_DEPTH:
	        echo ' - Maximum stack depth exceeded';
	    break;
	    case JSON_ERROR_STATE_MISMATCH:
	        echo ' - Underflow or the modes mismatch';
	    break;
	    case JSON_ERROR_CTRL_CHAR:
	        echo ' - Unexpected control character found';
	    break;
	    case JSON_ERROR_SYNTAX:
	        echo ' - Syntax error, malformed JSON';
	    break;
	    case JSON_ERROR_UTF8:
	        echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
	    break;
	    default:
	        echo ' - Unknown error';
	    break;
	}
	*/
	die($json);
}

/*
global $_PUT = array();

if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
    parse_str(file_get_contents('php://input'), $_PUT);
}
*/