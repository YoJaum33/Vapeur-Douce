<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Meta pour faciliter le référencement sur les moteurs de recherche -->
    <meta name="robots" content="index, follow" />

<!-- Le lien vers le fichier du CSS -->
    <link rel="stylesheet" href="index.css">

<!-- Open Graph pour la miniature quand on tape le lien-->
    <meta property="og:url" content="https://projet33.go.yj.fr/">
    <meta property="og:title" content="Vapeur Douce, votre référence cuisson vapeur">
    <meta property="og:description" content="Un ingrédient ? une cuisson vapeur ? VAPEUR DOUCE">
    <meta property="og:image" content="https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg">

<!-- twitter Card pour la miniature si on tape le lien dans un tweet -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@VapeurDouce" />
    <meta name="twitter:title" content="Vapeur Douce" />
    <meta name="twitter:description" content="Un ingrédient ? une cuisson vapeur ? VAPEUR DOUCE" />
    <meta name="twitter:image" content="https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg" />

    <title>VAPEUR DOUCE</title>
</head>

<body>
    <h1>VAPEUR DOUCE<h1>
    <main>

<!-- Le formulaire -->
        <form action="" method="POST">
        <label for="search"></label>
        <input type="text" id="search" name="search" placeholder="Nom de l'aliment" style="color:#ffd369";>
        <input type="submit" value="Rechercher" style="color:#ffd369" ;>
        </form>

    <h2>Rentrez le nom d'un aliment afin de connaître la durée de cuisson à la vapeur <h2>
<?php

// Mise en place de la fonction
function douce(){
if (isset($_POST['search'])) {

$curl = curl_init();
$search = $_POST["search"];

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.hmz.tf/?id=$search",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_TIMEOUT => 30,

"cache-control: no-cache"
),
);

$response = curl_exec($curl);

curl_close($curl);

$response = json_decode($response, true);
$result=$response["message"];
$result=$result["vapeur"];
$result=$result["cuisson"];

/*Temps de cuisson des aliments*/
if (isset($response["message"]["vapeur"]["cuisson"])) {
    echo ('<p>Le temps de cuisson est de ' . htmlentities($response["message"]["vapeur"]["cuisson"], ENT_QUOTES) . '</p>');
}

/*Niveau d'eau pour les aliments si présent*/
if (isset($response["message"]["vapeur"]["niveau d'eau"])) {
    echo ("<p>Le niveau d'eau est de " . htmlentities($response["message"]["vapeur"]["niveau d'eau"], ENT_QUOTES) . "</p>");
} else  echo '<p> Niveau d\'eau non renseigné </p>';

/*Trempage pour les aliments si présent*/
if (isset($response["message"]["vapeur"]["trempage"])) {
    echo ('<p>Le temps de trempage est de  ' . htmlentities($response["message"]["vapeur"]["trempage"], ENT_QUOTES) . '</p>');
} else echo('<p> Le temps de trempage n\'est pas renseigné </p>');
}
}


douce();
?>

</main>

        </body>
        
</html>
        