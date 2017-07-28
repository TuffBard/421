<html>

<head>
  <meta charset="utf-8">
  <title>421</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/master.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="js/jquery-3.1.0.min.js" charset="utf-8"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js" charset="utf-8"></script>
  <!-- JS -->
  <script src="js/connect.js"></script>
</head>

<body>
  <nav class="navbar navbar-custom">
    <div class="container-fluid">

      <div class="navbar-header">
        <a class="navbar-brand" href="#"><strong>421</strong></a>
      </div>

    </div>
  </nav>

  <div class="panel panel-default col-xs-4 col-xs-offset-4">
    <div class="panel-heading">
      <center>
        <h2>Connexion</h2>
      </center>
    </div>
    <div class="panel-body">
      <form method="POST" action="php/action/connect.php">
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


</body>

</html>