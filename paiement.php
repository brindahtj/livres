<?php
$htitle = "Paiement";
require_once 'partials/nav.php' ?>
<h1> <?= $htitle ?></h1>

<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty($_GET)) {
        header('Location: livre.php');
    }
}

?>




<?php require_once 'partials/footer.php' ?>