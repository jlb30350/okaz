<script>
    setTimeout(() => {
        window.location.reload(true);
    }, 2000);
</script>


<?php
require_once 'templates/header.php';
require_once 'libs/category.php';
$categories = "libs/category.php";





function getCategories(){
    return[
    ["name" => "Jeux vidéos", "icon" => "controller"],
    ['name' => "Meubles", "icon" => "lamp"],
    ["name" => "Vétements", "icon" => "tag"],

];
}

?>


