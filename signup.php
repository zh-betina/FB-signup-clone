<?php

use classes\DBconnection\DBconnection;
use classes\Subscription\Subscription;

include './classes/DBconnection.php';
include './classes/Subscription.php';

$response;

if (count($_POST) > 0) {
    $db = new DBconnection('E5');
    $dbConn = $db->connect();

    if (gettype($dbConn) !== 'string') {
        $subscr = new Subscription($_POST);
        if ($subscr->addToDB($dbConn)) {
            $head = "Succès";
            $response = "Merci, " . $_POST['name'].".Ton compte a été crée !";
        } else {
            $head = "Erreur DB";
            $response = "Un erreur est survenu lors de l'ajout de données à la DB.";
        }
    } else {
        $head = "Erreur Connection DB";
        $response = "Un erreur est survenu lors de la connection à la DB.";
    }
    $dbConn->close();
} else {
    $head = "Erreur données";
    $response = "Un erreur par rapport aux données du formulaire !";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook - Connexion ou inscription</title>
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="overlay"></div>
    <form class="fb-response fb-form" action="signup.php" method="POST">
        <div>
            <h1 class="txt-head"><?= $head ?></h1>
        </div>
        <div class="hr"></div>
        <div class="fl-col">
            <p class="txt-response">
                <?php echo $response; ?>
            </p>
        </div>
        <a class="btn-return btn-submit" href="./index.php">Retourner</a>
    </form>
</body>

</html>