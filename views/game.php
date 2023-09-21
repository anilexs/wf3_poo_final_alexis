<?php require_once "inc/header.php"; ?>
<title>Document</title>
<?php require_once "inc/nav.php"; ?>
    <form action="traitement/action.php" method="post">
        <div>
            <label for="">title :</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="">min_players :</label>
            <input type="number" name="min_players">
        </div>
        <div>
            <label for="">max_player :</label>
            <input type="number" name="max_player">
        </div>
        <button name="addGame">add game</button>
    </form>
<?php require_once "inc/footer.php"; ?>