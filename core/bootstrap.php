<?php

use App\Core\App;
App::bind('config', require 'config.php');

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));

function view($name,$data = [])
{
    extract($data);
    if (apc_exists(session_id())) {
    	if (apc_fetch(session_id())['role'] == '1') {
            if (!file_exists("app/views/admin/{$name}.view.php")) {
                echo "404";
            } else {
                return require "app/views/admin/{$name}.view.php";
            }
        } elseif (apc_fetch(session_id())['role'] == '2') {
            if(!file_exists("app/views/seller/{$name}.view.php")) {
                echo "404";
            } else {
                return require "app/views/seller/{$name}.view.php";
            }
        }
    } else {
        if (!file_exists("app/views/{$name}.view.php")) {
            echo "404";
        } else {
            return require "app/views/{$name}.view.php";
        }
    }
}

function redirect($path)
{
    header("Location: /{$path}");
}