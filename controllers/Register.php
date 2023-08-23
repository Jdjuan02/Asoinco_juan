<?php 

class Register{
    public function __construct(){}
        public function index(){
            header("Location: ?");
        }
        public function register(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {                
                          
                require_once "views/roles/business/header.php";
                require_once "views/modules/registronc/registronc.view.php";            
                require_once "views/roles/business/footer.php";
                
            }
        }
}

?>