<?php
use App\Table\User;
?>
<html>

<head>
    <meta charset="utf-8">
    <title>421</title>
    <!-- CSS -->
    <link href="public/css/master.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Open Iconic -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js" charset="utf-8"></script>
    <!-- Datatables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <!-- Mustache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark bg-main">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><strong>421</strong></a>
            </div>
            <?php
            if(isset($_SESSION["user"])){
            ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php?r=games&p=mygames" class="nav-link">Mes parties</a>
                </li>
            </ul>

            <span class="navbar-text">
                Bonjour <?= $_SESSION["user"]->name ?>
            </span>
            <?php
            }
            ?>
        </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
</body>

</html>
