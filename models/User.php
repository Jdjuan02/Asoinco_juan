<?php
    class User{
        # Atributos
        private $dbh;
        protected $idRol;
        protected $idUsuarios;
        protected $Nombre;
        protected $Correo;
        protected $Contraseña;
        protected $Celular;
        protected $Direccion;

        # Sobrecarga de Constructores
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function __construct2($Correo, $Contraseña){
            $this->Correo = $Correo;
            $this->Contraseña = $Contraseña;
        }
        public function __construct7($idRol,$idUsuarios,$Nombre,$Correo,$Contraseña,$Celular,$Direccion){
            $this->idRol = $idRol;
            $this->idUsuarios = $idUsuarios;
            $this->Nombre = $Nombre;
            $this->Correo = $Correo;
            $this->Contraseña = $Contraseña;
            $this->Celular = $Celular;
            $this->Direccion = $Direccion;
        }

        # Métodos: RolCode
        public function setidRol($idRol){
            $this->idRol = $idRol;
        } 
        public function getidRol(){
            return $this->idRol;
        } 
        # Métodos: userCode
        public function setidUsuarios($idUsuarios){
            $this->idUsuarios = $idUsuarios;
        } 
        public function getidUsuarios(){
            return $this->idUsuarios;
        } 
        # Métodos: userName
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        } 
        public function getNombre(){
            return $this->Nombre;
        } 
        # Métodos: userLastName
        public function setCorreo($Correo){
            $this->Correo = $Correo;
        } 
        public function getCorreo(){
            return $this->Correo;
        } 
        # Métodos: userEmail
        public function setContraseña($Contraseña){
            $this->Contraseña = $Contraseña;
        } 
        public function getContraseña(){
            return $this->Contraseña;
        } 
        # Métodos: userPass
        public function setCelular($Celular){
            $this->Celular = $Celular;
        } 
        public function getCelular(){
            return $this->Celular;
        } 
        # Métodos: userStatus
        public function setDireccion($Direccion){
            $this->Direccion = $Direccion;
        } 
        public function getDireccion(){
            return $this->Direccion;
        }
        
        // 2da Parte. Persistencia a la Bases de Datos

        # CU01 - Iniciar Sesión
        public function login(){
            $sql = 'SELECT * FROM usuarios
                    WHERE Correo = :correo 
                    AND Contraseña = :pass';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('correo', $this->getCorreo());
            $stmt->bindValue('pass', sha1($this->getContraseña()));            
            $stmt->execute();
            $userDb = $stmt->fetch();
            
            if ($userDb) {
                $user = new User(
                    $userDb['idRol'],
                    $userDb['idUsuarios'],
                    $userDb['Nombre'],
                    $userDb['Correo'],
                    $userDb['Contraseña'],
                    $userDb['Celular'],
                    $userDb['Direccion']
                );
                return $user;
            } else {
                return false;
            }
        }
        # CU02 - Cerrar Sesión
        # CU03 - Recuperar Contraseña
        # CU04 - Registro de Usuario
        # CU05 - Consultar Usuarios
        # CU06 - Actualizar Usuario
        # CU07 - Obtener Usuario por Id
        # CU08 - Eliminar Usuario
    }
?>