<?php
class Database{
    public static function dbConnect(){
        $conn = null;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=wf3_poo_final_alexis", "root", "");
        }catch(PDOException $e){
            $e->getMessage();
        }
        return $conn;
    }
}