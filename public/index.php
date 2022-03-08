<?php

use mvc\core\App;

define("DS", DIRECTORY_SEPARATOR);

define("ROOT", dirname(__DIR__));

define("APP", ROOT . DS . "app" . DS);

define("RESOURCES", ROOT . DS . "resources" . DS);

define("VIEWS", RESOURCES . "views" . DS);

$directories = ["CORE", "CONFIG", "CONTROLLERS", "MODELS"];

foreach ($directories as $directory) {
    define($directory, APP . strtolower($directory));
}

require_once(ROOT . "/vendor/autoload.php");

session_start();

try {
    new App();
} catch (Exception $e) {
    echo $e->getMessage();
}
