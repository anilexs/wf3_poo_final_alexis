<?php
require_once "database.php";
class Game{
    public static function addGame($title, $min_players, $max_player){
        $db = Database::dbConnect();

        $request = $db->prepare("INSERT INTO game (title, min_players, max_player) VALUES (?,?,?)");
        try{
            $request->execute(array($title, $min_players, $max_player));
            header("Location: http://localhost/wf3_poo_final_alexis/accueil");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function gameList(){
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT game.* FROM game LEFT JOIN contest ON game.id_game = contest.game_id WHERE contest.game_id IS NULL;");
        try{
            $request->execute(array());
            $gameList = $request->fetchAll();
            return $gameList;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
