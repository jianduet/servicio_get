<?php

class connection{

    static public function infoBD(){
        $infoBD = array(

            "database" => "apirest_project",
            "user" => "root",
            "pass" => ""
        );
        return $infoBD;
    }

    static public function connect(){
        try{
            $link = new PDO(
                "mysql:host=localhost;dbname=".connection::infoBD()['database'],
                connection::infoBD()['user'],
                connection::infoBD()['pass'],
            );

            $link->exec ("set names utf8");
        }catch(PDOException $e){
            die("Error: ".$e->getMessage());
        }

        return $link;
    }
}