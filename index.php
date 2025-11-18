<script>
    setTimeout(() => {
        window.location.reload(true);
    }, 2000);
</script>
<?php
require_once 'templates/header.php';
require_once 'libs/listing.php';

$listings = getListings();

$categories = [
    ["name" => "Jeux vidéos", "icon" => "controller"],
    ['name' => "Meubles", "icon" => "lamp"],
    ["name" => "Vétements", "icon" => "tag"],

]

?>
<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="./assets/images/logo-okaz.png" class="d-block mx-lg-auto img-fluid" alt="Logo ok" width="400" loading=" lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
            <font dir="auto" style="vertical-align: inherit;">
                <font dir="auto" style="vertical-align: inherit;">Avec Okaze, achetez et vendez vos objets</font>
            </font>
        </h1>
        <p class="lead">
            <font dir="auto" style="vertical-align: inherit;">
                <font dir="auto" style="vertical-align: inherit;">Trouver ce que vous cherchez ou donnez une seconde vie à vos objets en un clic ! Okaz est la plateforme incontournable pour vendre, acheter ou échanger tout ce que vous souhaitez : vetements ,meubles appareils électroniques, voitures et bien d'autres !</font>
            </font>
        </p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start"> <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Primaire</font>
                </font>
            </button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Défaut</font>
                </font>
            </button>
        </div>
    </div>
</div>

<div class="row">

    <h2 class="pb-2 border-bottom">Les dernieres annonces</h2>

    <?php foreach ($listings as $key => $listing) {
        require 'templates/listing_part.php';
    } ?>

</div>
<div class="py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Les categories</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <?php
        foreach ($categories as $key => $category) {
            require 'templates/category_part.php';
        }
        ?>

    </div>
</div>
<?php
require_once 'templates/footer.php';
?>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
</body>

</html>