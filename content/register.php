<?php
$message = array();
if(!empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2'])){
    if($_POST['password1']!=$_POST['password2']){
        $m['message'] = "Le mot de passe de confirmation doit étre identique au 1er mot de passe";
        $m['level'] = "danger";
        $message[] = $m;
    } else {
        $email = $_POST['email'];
        $password = $_POST['password1'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = "INSERT INTO demandeurs (email, password) VALUES ('". $email ."' , '". md5($password) ."') ";
            run($sql);
        } else {
            $m['message'] = "E-mail invalide";
            $m['level'] = "danger";
            $message[] = $m;
        }
    }
}

traitementMessage($message);
?>
<form class="form-signin" method="POST" action="./index.php?p=register">
    <h2 class="form-signin-heading">Enregistrez-vous pour accéder au programme FREDI</h2>
    <input type="text" name="email" class="form-control" placeholder="Adresse e-mail" required="" autofocus="">
    <br/>
    <input type="password" name="password1" class="form-control" placeholder="Mot de passe" required="">
    <br/>
    <input type="password" name="password2" class="form-control" placeholder="Confirmation mot de passe" required="">
    <br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion !</button>
    <a class="pull-right" href="#">Mot de passe oublié ?</a>
</form>
