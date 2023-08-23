<?php
    require_once "Models/User.php";
    class Login{
        public function __construct(){}
        public function index(){            
            $mensaje = '';
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/business/header.php";
                require_once "views/business/iniciar_sesion.view.php";
                require_once "views/business/links.php";
                require_once "views/roles/business/footer.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User($_POST['email'], $_POST['pass']);
                $user = $user->login();                
                if ($user) {
                    header("Location: ?c=Dashboard");
                } else {    
                    require_once "views/roles/business/header.php";
                    require_once "views/business/iniciar_sesion.view.php";
                    require_once "views/business/links.php";
                    require_once "views/roles/business/footer.php";
                    // echo "<script>alert('Usuario Incorrecto')</script>";
                }
            }
        }
    }
?>
