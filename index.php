<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once './app/controllers/TableController.php';
require_once './app/controllers/HelpController.php';
require_once './app/helpers/TableLoader.php';
require_once './app/helpers/Differ.php';
require_once './app/helpers/functions.php';
require_once './app/models/Table.php';
$controllerClass = ucfirst(isset($_GET['controller']) ? $_GET['controller'] : 'table') . 'Controller';
$action = 'action_' . (isset($_GET['action']) ? $_GET['action'] : 'list');
$controller = new $controllerClass;
$controller->$action();

