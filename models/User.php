<?php
    class User{
        # Atributos
        private $dbh;
        protected $rolCode;
        protected $rolName;
        protected $userCode;
        protected $userName;
        protected $userLastName;
        protected $userEmail;
        protected $userPass;
        protected $userStatus;

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
        public function __construct2($userEmail, $userPass){
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;
        }
        public function __construct7($rolCode,$userCode,$userName,$userLastName,$userEmail,$userPass,$userStatus){
            $this->rolCode = $rolCode;
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;
            $this->userStatus = $userStatus;
        }
        public function __construct8($rolCode,$rolName,$userCode,$userName,$userLastName,$userEmail,$userPass,$userStatus){
            unset($this->dbh);
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->userPass = $userPass;
            $this->userStatus = $userStatus;
        }

        # Métodos: RolCode
        public function setRolCode($rolCode){
            $this->rolCode = $rolCode;
        } 
        public function getRolCode(){
            return $this->rolCode;
        } 
        # Métodos: RolName
        public function setRolName($rolName){
            $this->rolName = $rolName;
        } 
        public function getRolName(){
            return $this->rolName;
        } 
        # Métodos: userCode
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        } 
        public function getUserCode(){
            return $this->userCode;
        } 
        # Métodos: userName
        public function setUserName($userName){
            $this->userName = $userName;
        } 
        public function getUserName(){
            return $this->userName;
        } 
        # Métodos: userLastName
        public function setUserLastName($userLastName){
            $this->userLastName = $userLastName;
        } 
        public function getUserLastName(){
            return $this->userLastName;
        } 
        # Métodos: userEmail
        public function setUserEmail($userEmail){
            $this->userEmail = $userEmail;
        } 
        public function getUserEmail(){
            return $this->userEmail;
        } 
        # Métodos: userPass
        public function setUserPass($userPass){
            $this->userPass = $userPass;
        } 
        public function getUserPass(){
            return $this->userPass;
        } 
        # Métodos: userStatus
        public function setUserStatus($userStatus){
            $this->userStatus = $userStatus;
        } 
        public function getUserStatus(){
            return $this->userStatus;
        }
        
        // 2da Parte. Persistencia a la Bases de Datos

        # CU01 - Iniciar Sesión
        public function login(){
            
            $sql = 'SELECT * FROM ROLES                     
                    INNER JOIN USUARIOS 
                    ON roles.rol_codigo = usuarios.rol_codigo
                    WHERE usuario_correo = :usuario_correo AND usuario_pass = :usuario_pass';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('usuario_correo', $this->getUserEmail());
            $stmt->bindValue('usuario_pass', sha1($this->getUserPass()));
            $stmt->execute();
            $userDb = $stmt->fetch();
            if ($userDb) {
                $user = new User(
                    $userDb['rol_codigo'],
                    $userDb['rol_nombre'],
                    $userDb['usuario_codigo'],
                    $userDb['usuario_nombre'],
                    $userDb['usuario_apellido'],
                    $userDb['usuario_correo'],
                    $userDb['usuario_pass'],
                    $userDb['usuario_estado']
                );
                return $user;
            } else {
                return false;
            }
        }
        # CU03 - Recuperar Contraseña
        # CU04 - Registro de Usuario
        public function registrarUsuario() {
            try {
                $sql = 'INSERT INTO USUARIOS VALUES (
                            :rolCode,
                            :userCode,
                            :userName,
                            :userLastName,
                            :userEmail,
                            :userPass,
                            :userStatus
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastName', $this->getUserLastName());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->bindValue('userStatus', $this->getUserStatus());            
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU05 - Consultar Usuarios
        public function consultarUsuarios() {
            try {
                $userList = [];
                $sql = 'SELECT * FROM USUARIOS';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userList[] = new User(
                        $user['rol_codigo'],
                        $user['usuario_codigo'],
                        $user['usuario_nombre'],
                        $user['usuario_apellido'],
                        $user['usuario_correo'],
                        $user['usuario_pass'],
                        $user['usuario_estado']
                    );
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU06 - Actualizar Usuario
        public function actualizarUsuario() {
            try {
                $sql = 'UPDATE USUARIOS SET
                            rol_codigo = :rolCode,
                            usuario_codigo = :userCode,
                            usuario_nombre = :userName,
                            usuario_apellido = :userLastName,
                            usuario_correo = :userEmail,
                            usuario_pass = :userPass,
                            usuario_estado = :userStatus
                        WHERE usuario_codigo = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode',$this->getUserCode());
                $stmt->bindValue('userName',$this->getUserName());
                $stmt->bindValue('userLastName',$this->getUserLastName());
                $stmt->bindValue('userEmail',$this->getUserEmail());
                $stmt->bindValue('userPass',sha1($this->getUserPass()));
                $stmt->bindValue('userStatus',$this->getUserStatus());
                $stmt->execute();
                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU07 - Obtener Usuario por Id
        public function obtenerUserPorId($userCode) {
            try {
                $sql = "SELECT * FROM USUARIOS WHERE usuario_codigo=:userCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDB = $stmt->fetch();
                $user = new User(
                    $userDB['rol_codigo'],
                    $userDB['usuario_codigo'],
                    $userDB['usuario_nombre'],
                    $userDB['usuario_apellido'],
                    $userDB['usuario_correo'],
                    $userDB['usuario_pass'],
                    $userDB['usuario_estado']
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU08 - Eliminar Usuario
        public function eliminarUsuario($userCode) {
            try {
                $sql = 'DELETE FROM USUARIOS WHERE usuario_codigo = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>