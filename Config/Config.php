<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/MoviePass/");
define("VIEWS_PATH", "Views/");
define("CONTROLLERS_PATH", "Controllers/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", VIEWS_PATH . "img/");

//DataBase conf
define("DB_HOST", "localhost");
define("DB_NAME", "Moviepass");
define("DB_USER", "root");
define("DB_PASS", "AO7t8fvC2gMoYca6"); 

//API conf
define("BASE_API_URL", "https://api.themoviedb.org/3/");
define("IMG_API_URL","https://image.tmdb.org/t/p/w500");
?>