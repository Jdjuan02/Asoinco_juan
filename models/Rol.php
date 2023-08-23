<?php
    class Rol{
        // 1er Parte. Programación Orientada a Objetos
        # Atributos
        private $dbh;
        private $idRol;
        private $Nombre;
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
        public function __construct2($idRol, $Nombre){
            $this->idRol = $idRol;
            $this->Nombre = $Nombre;
        }
        # Métodos: idrol
        public function setidRol($idRol){
            $this->idRol = $idRol;
        } 
        public function getidRol(){
            return $this->idRol;
        } 
        # Métodos: nombre
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        } 
        public function getNombre(){
            return $this->Nombre;
        }

        // 2da Parte. Persistencia a la Bases de Datos
        
        # CU09 - Registrar Rol
        public function registrarRol(){
            try {                
                $sql = 'INSERT INTO rol VALUES (:idRol,:Nombre)';  
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('idRol', $this->getidRol());
                $stmt->bindValue('Nombre', $this->getNombre());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU10 - Consultar ROL
        public function consultarROL(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM rol';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {
                    $rolList[] = new Rol(
                        $rol['idRol'],
                        $rol['Nombre']
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
                $sql = 'UPDATE rol SET
                            idRol = :idRol,
                            Nombre = :Nombre
                        WHERE idRol = :idRol';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('idRol', $this->getidRol());
                $stmt->bindValue('Nombre', $this->getNombre());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU12 - Obtener Rol por Id
        public function obtenerRolPorId($idRol){
            try {
                $sql = "SELECT * FROM rol WHERE idRol=:idRol";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('idRol', $idRol);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new Rol(
                    $rolDb['idRol'],
                    $rolDb['Nombre']
                );
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU12 - Eliminar Rol
        public function eliminarRol($idRol){
            try {
                $sql = 'DELETE FROM rol WHERE idRol = :idRol';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('idRol', $idRol);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
    }

?>