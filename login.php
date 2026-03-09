<!--<script>
    setTimeout(() => {
        window.location.reload(true);
    }, 2000);
</script>-->

<?php
session_start();
require_once 'libs/pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // On cherche l'utilisateur dans la base
    $query = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = :email");
    $query->execute(['email' => $email]);
    $user = $query->fetch();

    // On vérifie si l'utilisateur existe et si le mot de passe est bon
    // Note : utilise password_verify($password, $user['mot_de_pass']) si haché
    if ($user && password_verify($password, $user['mot_de_pass'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();
    } else {
        echo "Identifiants incorrects";
    }
}

?>
<?php
require_once 'templates/header.php';
?>

<?php
require_once 'templates/footer.php';
?>

<div class="form-signin w-100 m-auto">
    <form action="login.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="nom@exemple.com">
            <label for="floatingInput">email</font>
            </label>
        </div>


        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
        <p class="mt-5 mb-3 text-body-secondary"></p>
    </form>
    


</div>

