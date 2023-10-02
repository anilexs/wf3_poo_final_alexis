<?php 
require_once "../model/database.php"; 
require_once "../model/contestModel.php"; 
require_once "../model/playerModel.php"; 
$contestMatch = Contest::contesMatch($_GET['match_id']);
$playerContest = Contest::getMatchPlayers($_GET['match_id']);
$contestList = Contest::contestList();
$playerList = Player::playerList();
require_once "inc/header.php"; 
$dateActuelle = time();
$timestampDB = strtotime($contestMatch['start_date']);
?>
<title>Document</title>
<?php require_once "inc/nav.php"; ?>
    <?php 
    if(($contestMatch['nombre_de_joueurs'] < $contestMatch['max_player'])){ ?>
        <span>le nombre de joueur n’est pas suffisant</span>
        <?php } else if($contestMatch['min_players'] = $contestMatch['max_player']){ ?>
        <span class="red">le nombre de joueur et trop important</span>
    <?php }
    
    if(!($timestampDB  < $dateActuelle)){ ?>
        <span>le matche commancera le <?= $contestMatch['start_date']?> </span>
        <?php } else if($contestMatch['min_players'] = $contestMatch['max_player']){ ?>
        <span class="red">date deja passer</span>
    <?php }

    if($contestMatch['nombre_de_joueurs'] < $contestMatch['max_player'] && !($timestampDB  < $dateActuelle)){ ?>

        <form action="traitement/action.php" method="post"> 
            <select name="id_player">
                <?php 
                foreach($playerList as $player){?>
                    <option value="<?= $player['id_player']; ?>"><?= $player['nickname']; ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="match_id" value="<?= $contestMatch['id_contest'] ?>" hidden>
            <button name="joinMatch">sincrire au matche</button>
        </form>
                
    <?php } ?>
    <div class="contenaire">
        <table>
            <thead>
                <tr>
                    <th>pseudonyme</th>
                    <th>email</th>
                    <th>supprimer un joueur </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($playerContest as $player){ ?>
                    <tr>
                        <td><?= $player['nickname']; ?></td>
                        <td><?= $player['email']; ?></td>
                        <?php if($contestList[0]['winner_id'] == null && !($timestampDB  > $dateActuelle)){?>
                            <td><a href="./traitement/action.php?win_id_player=<?=$player['player_id']?>&&contest_id=<?= $player['contest_id'];?>">declare winner</a></td>
                        <?php }else{ ?>
                            <td></td>
                        <?php } ?>
                        <td>
                            <form action="traitement/action.php" method="post">
                                <input type="text" name="player_id" value="<?= $player['player_id'] ?>" hidden>    
                                <input type="text" name="match_id" value="<?= $player['id_player_contest'] ?>" hidden>    
                                <button name="delet">delet player</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once "inc/footer.php"; ?>