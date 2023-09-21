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