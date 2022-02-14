<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    
    // include database and object files
    include_once './config/database.php';
    include_once './class/products.php';

	// get data
	$data = json_decode(file_get_contents("php://input"));

	/** 
	 * We are checking validations for request, else return error msg
	*/

	$validations = array();

	if(!isset($data->id)){
		$validations['id'] = 'Please enter product id';
	}
	
	if(count($validations) > 0){
	    // set response code - 500 Internal Server Error
	    http_response_code(500);
	  
	    // show error data in json format
	    echo json_encode(array("error" => true, "message" => "One or more fields are not entered", 'data' => $validations));
	    exit();
	}

	//Convert the predefined characters 
	$id =  htmlspecialchars(strip_tags($data->id));

    $database = new Database();
    $db = $database->getInstance()->getConnection();
    $item = new Products($db);
    $item->id = ((int)$id > 0) ? $id : die();
  
    $item->getSingleProduct();

    if($item->name != null){
        // product array
        $prd_arr = array(
            "id" => $item->id,
            "name" => $item->name,
            "description" => $item->description     
        );
      
        http_response_code(200);
         echo json_encode(array("error" => false, "message" => "Fetch data for product is successfully done", 'data' => $prd_arr), JSON_PRETTY_PRINT);
    
    }else{
        
        http_response_code(404);
        echo json_encode(array("error" => true, "message" => "The requested product does not exist", 'data' => array()));
    }
?>