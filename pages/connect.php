<?php
    use App\Table\User;

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $user = User::connect($_POST["username"],$_POST["password"]);
        if($user != NULL){
            $_SESSION["user"] = $user;
            header("Location: index.php");
        }
    }
 ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <center>
            <h2>Connexion</h2>
        </center>
    </div>
    <div class="panel-body">
        <form method="POST">
            <div class="form-group">
                <div class="col-xs-4 col-xs-offset-4">
                    <label>Nom d'utilisateur</label>
                    <input class="form-control input-sm" type="text" name="username" placeholder="Nom d'utilisateur">
                </div>
                <div class="col-xs-4 col-xs-offset-4 margin-top-sm">
                    <label>Mot de passe</label>
                    <input class="form-control input-sm" type="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="col-xs-4 col-xs-offset-4 margin-top-lg">
                    <button class="btn btn-primary col-xs-12">Connexion</button>
                </div>
            </div>
        </form>
    </div>
</div>
