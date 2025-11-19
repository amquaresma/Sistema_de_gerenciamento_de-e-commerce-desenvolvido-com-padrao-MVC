<?php
session_start();

require_once 'config/database.php';

$database = new Database();
$db = $database->connect();

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'categoria':
        require_once 'Controller/CategoriaController.php';
        $controllerObj = new CategoriaController($db);
        break;
    
    case 'produto':
        require_once 'Controller/ProdutoController.php';
        $controllerObj = new ProdutoController($db);
        break;
    
    case 'cliente':
        require_once 'Controller/ClienteController.php';
        $controllerObj = new ClienteController($db);
        break;
    
    case 'home':
    default:
        require_once 'View/home.php';
        exit;
}

if (method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    header('Location: index.php');
    exit;
}
