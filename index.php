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
  <form class="fb-form" action="signup.php" method="POST">
    <div>
      <h1 class="txt-head">S'inscrire</h1>
      <p class="txt-sub">C'est rapide et facile.</p>
    </div>
    <div class="hr"></div>
    <div class="fl-col">
      <div class="fl-row inputs-gap">
        <input required placeholder="Prénom" class="input" required name="name" type="text" />
        <input required placeholder="Nom de famille" class="input" required name="surname" type="text" />
      </div>
      <input name="contact" required placeholder="Numéro de mobile ou e-mail" class="input" required name="contact" type="text" />
      <input name="pwd" required placeholder="Nouveau mot de passe" class="input" required name="pwd" type="password" />
    </div>
    <p class="txt-head--sm">Date de naissance <img class="head-icon" src="./assets/quest_mark.png"></p>
    <div class="fl-row">
      <select class="input-select" name="day">
        <?php
        $days = 31;
        for ($i = 1; $i <= $days; $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
      <select required class="input-select" name="month">
        <?php
        $months = array("jan", "fév", "mar", "avr", "mai", "jun", "juil", "août", "sept", "oct", "nov", "déc");
        for ($i = 0; $i < count($months); $i++) {
          $month = $months[$i];
          echo "<option value='$month'>$month</option>";
        }
        ?>
      </select>
      <select required class="input-select" name="year">
        <?php
        $maxYear = date("Y");
        $minYear = 1905;

        for ($i = $maxYear; $i >= $minYear; $i--) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
    </div>
    <p class="txt-head--sm">Genre <img class="head-icon" src="./assets/quest_mark.png"></p>
    <div class="fl-row inputs-gap">
      <label class="input-radio">Femme <input value="f" required name="genre" type="radio"></label>
      <label class="input-radio">Homme <input value="m" required name="genre" type="radio"></label>
      <label class="input-radio">Personnalisé <input required value="o" name="genre" type="radio"></label>
    </div>
    <p class="txt-foot">En cliquant sur S’inscrire, vous acceptez nos
      <a class="foot-link" href="https://fr-fr.facebook.com/legal/terms/update" target="_blank">Conditions générales</a>.
      Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre
      <a class="foot-link" href="https://fr-fr.facebook.com/about/privacy/update" target="_blank">Politique d'utilisation des données</a>
      et comment nous utilisons les cookies et autres technologies similaires en consultant notre
      <a class="foot-link" href="https://fr-fr.facebook.com/policies/cookies/">Politique d'utilisation des cookies.</a>
      Vous recevrez peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner.
    </p>
    <button class="btn-submit" type="submit">S'inscrire</button>
  </form>
</body>

</html>