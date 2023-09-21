<?php 
require_once "../model/playerModel.php"; 
require_once "../model/gameModel.php"; 
require_once "../model/contestModel.php"; 
$playerList = Player::playerList();
$gameList = Game::gameList();
$contestList = Contest::contestList();
require_once "inc/header.php"; 
?>
<title>Document</title>
<?php require_once "inc/nav.php"; ?>
    <div class="tab">
        <div class="player">
            <table>
                <thead>
                    <tr>
                        <th>player nickname</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($playerList as $player){ ?>
                        <tr>
                            <td><?= $player['nickname']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="gamePlay">
            <table>
                <thead>
                    <tr>
                        <th>title</th>
                        <th>min players</th>
                        <th>max player</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($gameList as $game){ ?>
                        <tr>
                            <td><?= $game['title']; ?></td>
                            <td><?= $game['min_players']; ?></td>
                            <td><?= $game['max_player']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="match">
        <table>
            <thead>
                        <tr>
                            <td>Nom du jeu</td>
                            <td>Nombre de joueurs enregistrés</td>
                            <td>Date de démarrage</td>
                            <td>Pseudonyme du gagnant du match</td>
                            <td>affichant le détail d’un match</td>
                        </tr>
            </thead>
            <tbody>
                <?php foreach ($contestList as $contes){ ?>
                        <tr>
                            <td><?= $contes['title']; ?></td>
                            <td><?= $contes['nombre_de_joueurs']; ?>/<?= $contes['max_player']; ?></td>
                            <td><?= $contes['start_date']; ?></td>
                            <td><?= $contes['nickname']; ?></td>
                            <td><a href="match.php?match_id=<?= $contes['id_contest']; ?>">détail du match</a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
<?php require_once "inc/footer.php"; ?>