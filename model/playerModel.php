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
    
    public static function deletePlayer($player_id, $match_id){
        $db = Database::dbConnect();

        $request = $db->prepare("DELETE FROM `player_contest` WHERE `player_id` = ? AND `id_player_contest` = ?");
        try{
            $request->execute(array($player_id, $match_id));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}