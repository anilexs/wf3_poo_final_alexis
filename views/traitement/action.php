<?php
require_once "../../model/gameModel.php";
require_once "../../model/playerModel.php";
require_once "../../model/contestModel.php";
if(isset($_POST['addGame'])){
    $title = htmlspecialchars($_POST['title']);
    $min_players = htmlspecialchars($_POST['min_players']);
    $max_player = htmlspecialchars($_POST['max_player']);

    Game::addGame($title, $min_players, $max_player);
}

if(isset($_POST['addPlayer'])){
    $email = htmlspecialchars($_POST['email']);
    $nickname = htmlspecialchars($_POST['nickname']);

    Player::addPlayer($email, $nickname);
}

if(isset($_POST['addContest'])){
    $game = htmlspecialchars($_POST['game']);
    $start_date = htmlspecialchars($_POST['start_date']);

    Contest::addContest($game, $start_date);
}

if(isset($_POST['addMatch'])){
    $member = htmlspecialchars($_POST['member']);
    $match_id = htmlspecialchars($_POST['match_id']);

    Contest::addContest($member, $match_id);
}

if(isset($_POST['delet'])){
    $id_player = htmlspecialchars($_POST['player_id']);
    $match_id = htmlspecialchars($_POST['match_id']);
    Player::deletePlayer($id_player, $match_id);
}

if(isset($_POST['joinMatch'])){
    $id_player = htmlspecialchars($_POST['id_player']);
    $match_id = htmlspecialchars($_POST['match_id']);
    Contest::joinMatch($id_player, $match_id);
}

if(isset($_GET['win_id_player'])){
    $win_id_player = htmlspecialchars($_GET['win_id_player']);
    $id_contest = htmlspecialchars($_GET['contest_id']);
    Contest::win_id_player($win_id_player, $id_contest);
}