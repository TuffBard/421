

<html>

<head>
    <meta charset="utf-8">
    <title>421</title>
    <!-- CSS -->
    <link href="public/css/master.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery-3.1.0.min.js" charset="utf-8"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js" charset="utf-8"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark bg-main">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><strong>421</strong></a>
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php?r=games&p=mygames" class="nav-link">Mes parties</a>
                </li>
            </ul>
            <span class="navbar-text">
                Bonjour <?= $_SESSION["user"]->name ?>
            </span>
        </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
</body>

</html>
