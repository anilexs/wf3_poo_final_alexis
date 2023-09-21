<?php 
require_once "../model/gameModel.php";
$gameList = Game::gameList(); 
// var_dump($gameList);
require_once "inc/header.php"; 
?>
<title>Document</title>
<?php require_once "inc/nav.php"; ?>
    <form action="traitement/action.php" method="post">
        <select name="game">
            <?php foreach($gameList as $game){ ?>
                <option value="<?= $game['id_game']; ?>"><?= $game['title']; ?></option>
            <?php } ?>
        </select>
        <div>
            <label for="">date de demarage :</label>
            <input type="date" name="start_date">
        </div>
        <button name="addContest">add contest</button>
    </form>
<?php require_once "inc/footer.php"; ?>