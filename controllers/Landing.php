<?php
    class Landing {
        public function __construct(){}
        // controladores pagina principal
        
        //Página principal
        // index.view.php
        public function index(){  
           require_once "views/roles/business/header.php";
           require_once "views/business/index.view.php";
           require_once "views/business/links.php";  
           require_once "views/roles/business/footer.php";          
        }

        // Misión Index
        public function mision(){            
            require_once "views/roles/business/header.php";
            require_once "views/modules/mision_vision/mision.view.php";
            require_once "views/business/links.php";            
            require_once "views/roles/business/footer.php";
        }

        // Visión Index
        public function vision(){            
            require_once "views/roles/business/header.php";
            require_once "views/modules/mision_vision/vision.view.php";
            require_once "views/business/links.php";            
            require_once "views/roles/business/footer.php";
        }

        // Historia Index
        public function historia(){            
            require_once "views/roles/business/header.php";
            require_once "views/modules/mision_vision/historia.view.php";
            require_once "views/business/links.php";            
            require_once "views/roles/business/footer.php";
        }

        // Proyectos Index
        public function proyecto(){            
            require_once "views/roles/business/header.php";
            require_once "views/modules/mision_vision/proyecto.view.php";
            require_once "views/business/links.php";            
            require_once "views/roles/business/footer.php";
        }

        // contactanos Index
        public function contactanos(){            
            require_once "views/roles/business/header.php";
            require_once "views/modules/contactanos/contactanos.view.php";
            require_once "views/business/links.php";             
            require_once "views/roles/business/footer.php";
        }
    
        // Olvido contraseña Index
        public function olvido_contraseña(){            
            require_once "views/roles/business/header.php";
            require_once "views/business/olvidocontra.view.php";            
            require_once "views/roles/business/footer.php";
        }

        // Vistas de sesión iniciada

        // Calidad humana: Empleados, Beneficiarios, Crear rol y Tabla aspirantes.
        // Empleados
        public function empleados(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/empleados/empleados.view.php";            
            require_once "views/roles/business/footer.php";
        }

        // Beneficiarios
        public function beneficiarios(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/beneficiarios/beneficiarios.view.php";            
            require_once "views/roles/business/footer.php";
        }

        // Crear rol
        public function crear_rol(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/crear_rol/crear_rol.view.php";            
            require_once "views/roles/business/footer.php";
        }

        //Tabla de aspirantes
        public function tablaaspirantes(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/aspirantes/aspirantes.php";            
            require_once "views/roles/business/footer.php";
        }

        // Módulo Inventario

        // Activos No Fijos o Alimentos
        public function alimentos(){
            require_once "views/roles/business/header1.php";
            require_once "views/modules/activosnofijos_alimentos/alimentos.view.php";
            require_once "views/roles/business/footer.php";
        }

        //Salida del Kardex diario en Activos No fijos o Alimentos
        //Kardex
        public function kardex(){
            require_once "views/roles/business/header1.php";
            require_once "views/modules/kardex/kardex.view.php";
            require_once "views/roles/business/footer.php";
        }

        // Dotación
        public function dotacion(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/dotacion/dotacion.view.php";            
            require_once "views/roles/business/footer.php";
        }


        //Salida de dotación en dotación
        //salidadotación
        public function salidadotacion(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/salidadotacion/salidadotacion.php";            
            require_once "views/roles/business/footer.php";
        }

        //Activos Fijos o elementos fisicos
        //elementosfisicos
        public function elementosfisicos(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/activosfijos_elementosfisicos/elementosfisicos.php";            
            require_once "views/roles/business/footer.php";
        }

        //Salida de Activos Fijos o elemtnos fisicos
        //egresoelementosfisicos
        public function egresoelementosfisicos(){            
            require_once "views/roles/business/header1.php";
            require_once "views/modules/salida_activos_fijos/salidaelementosfisicos.php";            
            require_once "views/roles/business/footer.php";
        }


        // REGISTRAR PRODUCTO
        public function registrar_producto(){
            require_once "views/roles/business/header1.php";
            require_once "views/modules/registrar_prod/Registrar_Producto.php";
            require_once "views/roles/business/footer.php";
        }
    
    
        public function link(){            
            require_once "views/business/links.php";            
        }

    }
?>