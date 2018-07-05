<?php
/**
 * @web http://www.jc-mouse.net/
 * @author jc mouse
 */
class ShopOnLineDB {

    protected $mysqli;
    const LOCALHOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'shoponline';

    /**
     * Constructor de clase
     */
    public function __construct() {
        try{
            //conexión a base de datos
            $this->mysqli = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
        }catch (mysqli_sql_exception $e){
            //Si no se puede realizar la conexión
            http_response_code(500);
            exit;
        }
    }

    /**
     * obtiene un solo registro dado su ID
     * @param int $id identificador unico de registro
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getUsuario($id=0){
        $stmt = $this->mysqli->prepare("SELECT * FROM usuario WHERE id=? ; ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $peoples = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $peoples;
    }

    /**
     * obtiene todos los registros de la tabla "people"
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getUsuarios(){
        $result = $this->mysqli->query('SELECT * FROM usuario');
        $peoples = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
        return $peoples;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	/**
     * obtiene todos los productos
     */
    public function getProductos(){
        $result = $this->mysqli->query('SELECT * FROM producto');
        $productos = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
        return $productos;
    }
	
	 public function getProducto($id=0){
        $stmt = $this->mysqli->prepare("SELECT * FROM producto WHERE id=? ; ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $productos = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $productos;
    }
	
	
	
	
	
	
    /**
     * añade un nuevo registro en la tabla persona
     * @param String $name nombre completo de persona
     * @return bool TRUE|FALSE
     */

	 /*
	    USANDO: bind_param
			Especificación del tipo de caracteres
		Carácter	Descripción
		i	la variable correspondiente es de tipo entero
		d	la variable correspondiente es de tipo double
		s	la variable correspondiente es de tipo string
		b	la variable correspondiente es un blob y se envía en paquetes
		
		EJEMPLO CUANDO SE ENVIAN Varios Parametros:  $stmt->bind_param('sssd', $code, $language, $official, $percent);
	 */
	 
	
	 
	public function insert($nombre='', $passw=''){
        $stmt = $this->mysqli->prepare("INSERT INTO usuario(nombre, passw) VALUES (?,?);");
        $stmt->bind_param('ss', $nombre, $passw);
        $r = $stmt->execute();
        $stmt->close();
        return $r;
    }

    /**
     * elimina un registro dado el ID
     * @param int $id Identificador unico de registro
     * @return Bool TRUE|FALSE
     */
    public function delete($id=0) {
        $stmt = $this->mysqli->prepare("DELETE FROM usuario WHERE id = ? ; ");
        $stmt->bind_param('s', $id);
        $r = $stmt->execute();
        $stmt->close();
        return $r;
    }

    /**
     * Actualiza registro dado su ID
     * @param int $id Description
     */
    public function update($id, $nombre, $passw) {
        if($this->checkID($id)){
            $stmt = $this->mysqli->prepare("UPDATE usuario SET nombre = ?, passw = ? WHERE id = ? ; ");
            $stmt->bind_param('ssi', $nombre, $passw, $id);
            $r = $stmt->execute();
            $stmt->close();
            return $r;
        }
        return false;
    }

    /**
     * verifica si un ID existe
     * @param int $id Identificador unico de registro
     * @return Bool TRUE|FALSE
     */
    public function checkID($id){
        $stmt = $this->mysqli->prepare("SELECT * FROM usuario WHERE id=?");
        $stmt->bind_param("s", $id);
        if($stmt->execute()){
            $stmt->store_result();
            if ($stmt->num_rows == 1){
                return true;
            }
        }
        return false;
    }

}
