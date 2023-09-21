<?php
class Player{
    public static function addPlayer($email, $nickname){
        $db = Database::dbConnect();

        $request = $db->prepare("INSERT INTO player (email, nickname) VALUES (?,?)");
        try{
            $request->execute(array($email, $nickname));
            header("Location: http://localhost/wf3_poo_final_alexis/accueil");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function playerList(){
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT * FROM player");
        try{
            $request->execute(array());
            $playerList = $request->fetchAll();
            return $playerList;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}