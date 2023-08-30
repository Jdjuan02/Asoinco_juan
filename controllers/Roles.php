<?php
    require_once "models/Rol.php";
    class Roles{
        public function __construct(){}
        public function index(){
            header("Location: ?c=Dashboard");
        }
        // Crear Rol
        public function registrarRoles(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/business/header1.php";
                require_once "views/modules/crear_rol/crear_rol.view.php";
                require_once "views/roles/business/footer.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    null,
                    $_POST['nombreRol']
                );
                // Validación
                $rol->registrarRol();
                header("Location: ?c=Roles&a=consultarRoles");
            }
        }
        public function crear_rol(){
            echo "aqui estoy";
        }
        // Consultar Roles
        public function consultarRoles(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $roles = new Rol;
                $roles = $roles->consultarRoles();               
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/01_users/read_rol.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
        }
        // Actualizar Rol
        public function actualizarRoles(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rol = new Rol;
                $rol = $rol->obtenerRolPorId($_GET['codigoRol']);
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/01_users/update_rol.view.php";
                require_once "views/roles/admin/footer.view.php";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    $_POST['codigoRol'],
                    $_POST['nombreRol']
                );                
                $rol->actualizarRol();
                header("Location: ?c=Roles&a=consultarRoles");
            }
        }
        // Eliminar Rol
        public function eliminarRoles(){
            $rol = new Rol;
            $rol->eliminarRol($_GET['codigoRol']);
            header("Location: ?c=Roles&a=consultarRoles");
        }

    }

?>