<?php 

class Dashboard{
    public function __construct(){}
    public function index(){
            require_once "views/roles/business/header1.php";
            require_once "views/modules/dashboard/dashboard.view.php";            
            require_once "views/roles/business/footer.php";
    }
}

?>
