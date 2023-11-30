<?php

require_once "controllers/get.controller.php";

$table = explode("?",$routesArray[1])[0];
$select = $_GET['select'] ?? "*";

$response = new GetController();

/* peticiones con filtro */

if(isset($_GET["linkTo"]) && isset($_GET["equalTo"])) {
    $response->getDataFilter($table, $select, $_GET["linkTo"], $_GET["equalTo"]); 
}else{
   
    /* peticiones sin filtro */
    $response->getData($table, $select);
}









