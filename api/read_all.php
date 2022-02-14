<?php
	// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once './config/database.php';
    include_once './class/products.php';

    $database = new Database();
    $db = $database->getInstance()->getConnection();
    $items = new Products($db);
    $stmt = $items->getProducts();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){        
        $productsArr = array();
        $productsArr["data"] = array();
        $productsArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "description" => $description                
            );
            array_push($productsArr["data"], $e);
        }
        echo json_encode(array("error" => false, "message" => "Welcome to RestFul example by Gligorije", 'data' => $productsArr));
    }
    else{
        http_response_code(404);
        echo json_encode(array("error" => true, "message" => "No products found.", 'data' => array()));
    }
?>