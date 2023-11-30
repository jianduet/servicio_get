<?php

require_once "connection.php";

class GetModel{

    /* peticiones sin filtro */

    static public function getData($table, $select){
        $sql = "SELECT $select FROM $table";

        $stmt = connection::connect()->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

    /* peticiones con filtro */

    static public function getDataFilter($table, $select, $linkTo, $equalTo){

        $linkToArray = explode(",",$linkTo);
        $equalToArray = explode(",",$equalTo);
        $linkToText = "";

        if(count($linkToArray)>1){
            foreach($linkToArray as $key => $value){
                if($key >0){

                    $linkToText .= "AND ".$value." = :".$value." ";
                }
            }
        }

        $sql = "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToText";
        $stmt = connection::connect()->prepare($sql);

        foreach($linkToArray as $key => $value){
            $stmt -> bindParam(":".$value, $equalToArray[$key], PDO::PARAM_STR);
        }

        
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }
}