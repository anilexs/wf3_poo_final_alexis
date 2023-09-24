<?php
class Contest{
    public static function addContest($game_id, $start_date){
        $db = Database::dbConnect();

        $request = $db->prepare("INSERT INTO contest (game_id, start_date) VALUES (?,?)");
        try{
            $request->execute(array($game_id, $start_date));
            header("Location: http://localhost/wf3_poo_final_alexis/accueil");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public static function contestList(){
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT c.*, g.*, p.*, COUNT(cp.player_id) AS nombre_de_joueurs  FROM contest c  LEFT JOIN player p ON c.winner_id = p.id_player  LEFT JOIN game g ON c.game_id = g.id_game  LEFT JOIN player_contest cp ON c.id_contest = cp.contest_id  GROUP BY c.id_contest, g.id_game  ORDER BY c.start_date DESC;");
        try{
            $request->execute(array());
            $contestList = $request->fetchAll(PDO::FETCH_ASSOC);
            return $contestList;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public static function contesMatch($id_match){
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT c.*, g.*, p.*, COUNT(cp.player_id) AS nombre_de_joueurs FROM contest c LEFT JOIN player p ON c.winner_id = p.id_player LEFT JOIN game g ON c.game_id = g.id_game LEFT JOIN player_contest cp ON c.id_contest = cp.contest_id WHERE c.id_contest = ?");
        try{
            $request->execute(array($id_match));
            $contestList = $request->fetch();
            return $contestList;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public static function getMatchPlayers($contest_id) {
    $db = Database::dbConnect();

    $request = $db->prepare("SELECT pc.*, p.email, p.nickname FROM player_contest pc LEFT JOIN player p ON pc.player_id = p.id_player WHERE pc.contest_id = ?");
    try {
        $request->execute(array($contest_id));
        $players = $request->fetchAll(PDO::FETCH_ASSOC);
        return $players;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
    public static function joinMatch($id_player, $match_id) {
    $db = Database::dbConnect();

    $request = $db->prepare("INSERT INTO player_contest (player_id, contest_id) VALUES (?,?)");
    try {
        $request->execute(array($id_player, $match_id));
        header("Location: http://localhost/wf3_poo_final_alexis/accueil");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
    
public static function win_id_player($win_id_player, $id_contest) {
    $db = Database::dbConnect();

    $request = $db->prepare("UPDATE contest SET winner_id = ? WHERE id_contest = ?");
    try {
        $request->execute(array($win_id_player, $id_contest));
        header("Location: http://localhost/wf3_poo_final_alexis/accueil");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

}