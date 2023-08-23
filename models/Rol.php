<?php
    class Rol{
        // 1er Parte. Programación Orientada a Objetos
        # Atributos
        private $dbh;
        private $rolCode;
        private $rolName;
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
        public function __construct2($rolCode, $rolName){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
            // Validar
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

        // 2da Parte. Persistencia a la Bases de Datos
        
        # CU09 - Registrar Rol
        public function registrarRol(){
            try {                
                $sql = 'INSERT INTO ROLES VALUES (:rolCodigo,:rolNombre)';  
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('rolCodigo', $this->getRolCode());
                $stmt->bindValue('rolNombre', $this->getRolName());
                // Validar
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU10 - Consultar Roles
        public function consultarRoles(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {
                    $rolList[] = new Rol(
                        $rol['rol_codigo'],
                        $rol['rol_nombre']
                    );
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU11 - Actualizar Rol
        public function actualizarRol(){
            try {                
                $sql = 'UPDATE ROLES SET
                            rol_codigo = :rolCodigo,
                            rol_nombre = :rolNombre
                        WHERE rol_codigo = :rolCodigo';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $this->getRolCode());
                $stmt->bindValue('rolNombre', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU12 - Obtener Rol por Id
        public function obtenerRolPorId($rolCodigo){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_codigo=:rolCodigo";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $rolCodigo);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new Rol(
                    $rolDb['rol_codigo'],
                    $rolDb['rol_nombre']
                );
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU12 - Eliminar Rol
        public function eliminarRol($rolCodigo){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_codigo = :rolCodigo';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $rolCodigo);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
    }

?>