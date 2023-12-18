<?php
$htitle = "Ajout d'un livre";
require_once 'partials/nav.php';
require_once 'details.php'
?>

<h1><?= $htitle ?></h1>


<form action="" method="POST" class="w-50 ms-5">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" id="title" value="<?= !empty($title) ? $title : "" ?>">
    </div>
    <div class=" mb-3">
        <label for="lastName" class="form-label">Nom de l'auteur</label>
        <input type="text" name="lastName" class="form-control" id="lastName" value="<?= !empty($lastName) ? $lastName : "" ?>">
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">Prenom de l'auteur</label>
        <input type="text" name="firstName" class="form-control" id="firstName" value="<?= !empty($firstName) ? $firstName : "" ?>">
    </div>

    <div class="d-flex my-3 ">
        <div class="ms-3 form-check">
            <input type="checkbox" class="form-check-input" id="f" name="sexe[]" value="f">
            <label class="form-check-label" for="sexe">Mme</label>
        </div>
        <div class="ms-3 form-check">
            <input type="checkbox" class="form-check-input" id="m" name="sexe[]" value="m">
            <label class="form-check-label" for="sexe">M</label>
        </div>
        <div class="ms-3 form-check">
            <input type="checkbox" class="form-check-input" id="n" name="sexe[]" value="n">
            <label class="form-check-label" for="sexe">Autre</label>
        </div>

    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Année de publication</label>
        <input type="text" name="year" class="form-control" id="year" value="<?= !empty($year) ? $year : "" ?>">
    </div>
    <div class="mb-3">
        <label for="nbPage" class="form-label">Nombre de page</label>
        <input type="number" name="nbPage" class="form-control" id="nbPage" value="<?= !empty($nbPage) ? $nbPage : "" ?>">
    </div>
    <div class="mb-3">
        <label for="nbPage" class="form-label">Prix</label>
        <input type="number" name="price" class="form-control" id="price" value="<?= !empty($price) ? $price : "" ?>">
    </div>

    <label for="category" class="form-label">Catégorie</label>
    <select class="form-select" name="category" value="<?= !empty($category) ? $category : "" ?>" aria-label="Default select example">
        <option selected>Selectionner une catégorie</option>
        <option value='roman'>Roman</option>
        <option value='poesie'>Poésie</option>
        <option value='theatre'>Théâtre</option>
        <option value='essai'>Essai</option>
        <option value='bd'>BD</option>
        <option value='jeunesse'>Jeunesse</option>
    </select>

    <div class="my-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?= !empty($description) ? $description : ""  ?></textarea>
    </div>

    <div class="mb-3">
        <label for="link" class="form-label">Lien</label>
        <input text="text" name="link" class="form-control" id="link" value="<?= !empty($link) ? $link : "" ?>">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<?php
require_once 'partials/footer.php'
?>