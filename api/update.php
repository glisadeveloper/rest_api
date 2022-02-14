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

    if(!isset($data->name)){
        $validations['name'] = 'Please enter product name';
    }

    if(!isset($data->description)){
        $validations['description'] = 'Please enter product description';
    }

    if(!isset($data->price)){
        $validations['price'] = 'Please enter product price';
    }

    if(count($validations) > 0){
        // set response code - 500 Internal Server Error
        http_response_code(500);
      
        // show error data in json format
        echo json_encode(array("error" => true, "message" => "One or more fields are not entered", 'data' => $validations));
        exit();
    }
    
    $database = new Database();
    $db = $database->getInstance()->getConnection();
    
    $item = new Products($db);
       
    $item->id = $data->id;
    
    // product values
    $item->name = $data->name;
    $item->description = $data->description;
    $item->price = $data->price;
    
    if($item->updateProduct()){
        http_response_code(200);
        echo json_encode(array("error" => false, "message" => "Product data updated.", 'data' => array()), JSON_PRETTY_PRINT);
    } else{
        http_response_code(500);
        echo json_encode(array("error" => true, "message" => "Product data could not be updated.", 'data' => array()), JSON_PRETTY_PRINT);
    }
?>