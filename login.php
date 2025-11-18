<?php
require_once "templates/header.php";
?>
<div class="form-signin w-100 m-auto">
    <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="nom@exemple.com">
            <label for="floatingInput">Adresse email</font>
            </label>
        </div>


        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
        <p class="mt-5 mb-3 text-body-secondary"></p>
    </form>
</div>

<?php
require_once "templates/footer.php";
?>