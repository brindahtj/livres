<?php
echo '<div class="card" style="width: 18rem;">';
echo '<ul class="list-group list-group-flush">';



$pdo = new PDO('mysql:host=localhost;dbname=livres;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);

    if (!empty($_POST['title'])) {
        if (strlen($_POST['title']) > 2 && strlen($_POST['title']) < 150) {
            $title = htmlspecialchars(addslashes($_POST['title']));
            echo "<li class='list-group-item '> Titre: $title </li><br>";
        } else {
            echo "<li class='list-group-item'>Le titre doit contenir au moins deux caractères et 150 maximum!</li><br>";
        }
    } else {
        echo "<li class='list-group-item'>'Veuillez remplir le champ.</li><br>";
    }
    if (!empty($_POST['lastName'])) {
        if (strlen($_POST['lastName']) > 2 && strlen($_POST['lastName']) < 150) {
            $lastName = htmlspecialchars(addslashes($_POST['lastName']));
            echo "<li class='list-group-item'> Nom de l'auteur: $lastName </li><br>";
        } else {
            echo "<li class='list-group-item'>Le nom doit contenir au moins deux caractères et 150 maximum!</li><br>";
        }
    } else {
        echo "<li class='list-group-item'>Veuillez remplir le champ.</li><br>";
    }
    if (!empty($_POST['firstName'])) {
        if (strlen($_POST['firstName']) > 2 && strlen($_POST['firstName']) < 150) {
            $firstName = htmlspecialchars(addslashes($_POST['firstName']));
            echo " <li class='list-group-item'>Prenom de l'auteur: $firstName</li> <br>";
        } else {
            echo "<li class='list-group-item'>Le prenom doit contenir au moins deux caractères et 150 maximum!</li><br>";
        }
    } else {
        echo "<li class='list-group-item'>Veuillez remplir le champ.</li><br>";
    }

    if (!empty($_POST['sexe'])) {
        $sexe = $_POST['sexe'][0];
        echo " <li class='list-group-item'>Civilité: $sexe </li><br>";
    } else {
        echo "<li class='list-group-item'>Veuillez cocher au moins une case.</li><br>";
    }

    if (!empty($_POST['year'])) {
        if ($_POST['year'] >= 2000 && $_POST['year'] <= 2022) {
            $year = htmlspecialchars(addslashes($_POST['year']));
            echo " <li class='list-group-item'>Année de sortie: $year <br>";
        } else {
            echo "<li class='list-group-item'>L'année doit être entre 2000 et 2022 </li><br>";
        }
    } else {
        echo 'Veuillez remplir le champ.</li><br>';
    }
    if (!empty($_POST['nbPage'])) {
        if ($_POST['nbPage'] > 1 && $_POST['nbPage'] <= 1000) {
            $nbPage = htmlspecialchars(addslashes($_POST['nbPage']));
            echo " <li class='list-group-item'>Nom de pages: $nbPage pages</li> <br>";
        } else {
            echo "<li class='list-group-item'>Le nombre de page ne peut pas plus petit que 1 ou plus grand que 1000.<br>";
        }
    } else {
        echo "<li class='list-group-item'>Veuillez remplir le champ.</li><br>";
    }

    if (!empty($_POST['price'])) {
        if ($_POST['price'] > 0 && $_POST['price'] <= 299) {
            $price = htmlspecialchars(addslashes($_POST['price']));
            echo " <li class='list-group-item'>Prix: $price € </li><br>";
        } else {
            echo "<li class='list-group-item'>Le prix ne peut pas plus petit que 1 ou plus grand que 299.</li><br>";
        }
    } else {
        echo "<li class='list-group-item'>Veuillez remplir le champ.</li><br>";
    }

    if (!empty($_POST['category'])) $category = $_POST['category'][0];
    else echo "<li class='list-group-item'>Veuillez selectionner un champ.</li><br>";

    if (!empty($_POST['description'])) {

        if (strlen($_POST['description'] < 500)) {
            $description = htmlspecialchars(addslashes($_POST['description']));
            echo " <li class='list-group-item'>La description: $description</li> <br>";
        } else {
            echo "<li class='list-group-item'>La description ne doit pas dépasser 500 caractères!<br>";
        }
    } else {
        echo "<li class='list-group-item'>Veuillez remplir le champ.</li><br>";
    }

    if (!empty($_POST['link'])) $link = htmlspecialchars(addslashes($_POST['link']));
    else echo "<li class='list-group-item'>Veuillez remplir le champ.</li><br>";

    echo '</ul>';
    if (isset($title) || isset($lastName) || isset($firstName) || isset($sexe) || isset($year) || isset($nbPage) || isset($price) || isset($description) || isset($link)) {
        echo "<a type='submit' class='btn btn-outline-warning' href='paiement.php?title=$title&lastName$lastName&firstName=$firstName&sexe=$sexe&year=$year&nbPage=$nbPage&price=$price&description=$description&link=$link'> Paiement </a>";
    }
    echo '</div>';
    $result = $pdo->prepare("INSERT INTO `livre`( `title`, `lastname`, `firstname`, `sexe`, `year`, `nbPage`,`prix`,`category`, `description`,`link` ) VALUES (':title',':lastName',':firstName',':sexe',':year', ':nbPage', ':category', ':description', ':link' )");
    $result->bindParam(':title', $title, PDO::PARAM_STR);
    $result->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $result->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $result->bindParam(':sexe', $sexe, PDO::PARAM_STR);
    $result->bindParam(':year', $year, PDO::PARAM_INT);
    $result->bindParam(':nbPage', $nbPage, PDO::PARAM_INT);
    $result->bindParam(':price', $price, PDO::PARAM_INT);
    $result->bindParam(':category', $category, PDO::PARAM_STR);
    $result->bindParam(':description', $description, PDO::PARAM_STR);
    $result->bindParam(':link', $link, PDO::PARAM_STR);

    $result->execute();
}
