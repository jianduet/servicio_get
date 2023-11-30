<?php

$routesArray = explode("/",$_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

if(count($routesArray) == 0){
    $json = array (
        'status' => 404,
        'result' => 'not found'
    );

    echo json_encode($json, http_response_code($json["status"]));
    return;
}

if(count($routesArray) == 1 && isset ($_SERVER['REQUEST_METHOD'])){

    if($_SERVER['REQUEST_METHOD'] == "GET"){

       include "services/get.php";

    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $json = array (
            'status' => 202,
            'result' => 'solicitud POST'
        );
    
        echo json_encode($json, http_response_code($json["status"]));

    }

    if($_SERVER['REQUEST_METHOD'] == "PUT"){

        $json = array (
            'status' => 202,
            'result' => 'solicitud PUT'
        );
    
        echo json_encode($json, http_response_code($json["status"]));

    }

    if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $json = array (
            'status' => 202,
            'result' => 'solicitud DELETE'
        );
    
        echo json_encode($json, http_response_code($json["status"]));

    }

}
