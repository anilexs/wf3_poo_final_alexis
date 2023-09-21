<?php require_once "inc/header.php"; ?>
<title>Document</title>
<?php require_once "inc/nav.php"; ?>
    <form action="traitement/action.php" method="post">
        <div>
            <label for="">email :</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="">nickname :</label>
            <input type="text" name="nickname">
        </div>
        <button name="addPlayer">add player</button>
    </form>
<?php require_once "inc/footer.php"; ?>