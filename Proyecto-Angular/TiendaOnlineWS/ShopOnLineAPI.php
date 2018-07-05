<?php


require_once "ShopOnLineDB.php";



class ShopOnLineAPI {
    public function API(){
        header('Content-Type: application/JSON');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
        case 'GET': //consulta
            $this->getDatos();
            break;
        case 'POST'://inserta
            $this->saveUsuario();
            break;
        case 'PUT'://actualiza
            $this->updateUsuario();
            break;
        case 'DELETE'://elimina
              $this->deleteUsuario();
            break;
        default://metodo NO soportado
            echo 'METODO NO SOPORTADO';
            break;
        }
    }



/* Dependiendo la accion es donde consulta los datos

 *(Consulta Usuarios) : http://localhost/pruebas/TiendaWS/usuarios
 *(Consulta Productos) : http://localhost/pruebas/TiendaWS/productos
*/
 
  function getDatos(){
   switch ($_GET['action']) {
        case 'usuarios': 
            $this->getUsuarios();
            break;
        case 'productos':
            $this->getProductos();
            break;
			default:
                  $this->response(400);
        }
}		
 

 
 
 /**
  * función que segun el valor de "action" e "id":
  *  - mostrara una array con todos los registros de personas
  *  - mostrara un solo registro
  *  - mostrara un array vacio
 */
 
 
 
  function getUsuarios(){
      if($_GET['action']=='usuarios'){
          $db = new ShopOnLineDB();
         if(isset($_GET['id'])){
           //muestra 1 solo registro si es que existiera ID
             $response = $db->getUsuario($_GET['id']);
            echo json_encode($response,JSON_PRETTY_PRINT);
         }else{ //muestra todos los registros
             $response = $db->getUsuarios();
             echo json_encode($response,JSON_PRETTY_PRINT);
         }
     }else{
            $this->response(400);
     }
 }
 
 
 
 
 /**
  * Obtenemos los datos de los productos":
 */
 
 
 
  function getProductos(){
      if($_GET['action']=='productos'){
          $db = new ShopOnLineDB();
         if(isset($_GET['id'])){
           //muestra 1 solo registro si es que existiera ID
             $response = $db->getProducto($_GET['id']);
            echo json_encode($response,JSON_PRETTY_PRINT);
         }else{ //muestra todos los registros
             $response = $db->getProductos();
             echo json_encode($response,JSON_PRETTY_PRINT);
         }
     }else{
            $this->response(400);
     }
 }
 

 /*
   * metodo para guardar un nuevo registro de persona en la base de datos*/
  function saveUsuario(){
      if($_GET['action']=='usuarios'){
          //Decodifica un string de JSON
          $obj = json_decode( file_get_contents('php://input') );
          $objArr = (array)$obj;
          if (empty($objArr)){
             $this->response(422,"error","Nothing to add. Check json");
         }else if(isset($obj->nombre)){
             $usuario = new ShopOnLineDB();
             $usuario->insert( $obj->nombre, $obj->passw );
             $this->response(200,"success","new recordadded");
         }else{
             $this->response(422,"error","The property is not defined");
         }
     } else{
         $this->response(400);
     }
 }



/**
 * Actualiza un recurso
 */
function updateUsuario() {
    if( isset($_GET['action']) && isset($_GET['id']) ){
        if($_GET['action']=='usuarios'){
            $obj = json_decode( file_get_contents('php://input') );
            $objArr = (array)$obj;
            if (empty($objArr)){
                $this->response(422,"error","Nothing to add. Check json");
            }else if(isset($obj->nombre)){
                $db = new ShopOnLineDB();
                $db->update($_GET['id'], $obj->nombre, $obj->passw);
                $this->response(200,"success","Record updated");
            }else{
                $this->response(422,"error","The property is not defined");
            }
            exit;
       }
    }
    $this->response(400);
}



/**
     * elimina persona
     */
    function deleteUsuario(){
        if( isset($_GET['action']) && isset($_GET['id']) ){
            if($_GET['action']=='usuarios'){
                $db = new ShopOnLineDB();
                $db->delete($_GET['id']);
                $this->response(204);
                exit;
            }
        }
        $this->response(400);
    }


    /**
 * Respuesta al cliente
 * @param int $code Codigo de respuesta HTTP
 * @param String $status indica el estado de la respuesta puede ser "success" o "error"
 * @param String $message Descripcion de lo ocurrido
 */
 function response($code=200, $status="", $message="") {
    http_response_code($code);
    if( !empty($status) && !empty($message) ){
        $response = array("status" => $status ,"message"=>$message);
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
 }

}//end class

?>
