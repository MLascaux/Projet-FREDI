<?php
$message = array();
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT COUNT(*) FROM demandeurs WHERE email='". $email ."' AND password='". md5($password) ."'";
    $res = run($sql)->fetch_all();
    if(isset($res[0][0]) && $res[0][0]==1){
        $_SESSION['user']['email'] = $email;
        header("Location: index.php");
    } else {
        $m['message'] = "La connexion à échouée. Verifiez vos identifiant de connexion";
        $m['level'] = "danger";
        $message[] = $m;
    }
}

traitementMessage($message);
?>
<form class="form-signin" action="./index.php?p=connect" method="POST">
    <h2 class="form-signin-heading">Connectez-vous pour accéder au programme FREDI</h2>
    <input type="text" name="email" class="form-control" placeholder="Adresse e-mail" required="" autofocus="">
    <br/>
    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="">
    <br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion !</button>
    <a class="pull-right" href="#">Mot de passe oublié ?</a>
</form>
