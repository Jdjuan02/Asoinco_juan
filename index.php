<!-- index para manejar los controladores -->
<?php
require_once "models/Database.php";
//Se crea la variable C con $_REQUEST.
if (!isset($_REQUEST['c'])) {
    //Se llama el controlador Landing con require once.
    require_once "controllers/Login.php";
    //Se crea la variable para el nuevo landing
    $controller = new Login;
    //Se llama al index que tiene la página principal.
    $controller->index();
} else {
    //
    $controller = $_REQUEST['c'];
    //Se concatenan las extensiones
    require_once "controllers/" . $controller . ".php";
    //Se llama al controlador
    $controller = new $controller;
    //Se crea la acción.
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "index";
    //Se llama a la accion y a al controlador.
    call_user_func(array($controller, $action));
}
?>

