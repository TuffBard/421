<?php
  session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>421</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/master.css" rel="stylesheet">
  <!-- Data Table -->
  <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"></link>
  <!-- jQuery -->
  <script src="js/jquery-3.1.0.min.js" charset="utf-8"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js" charset="utf-8"></script>
  <!-- JS -->
  <script src="js/home.js"></script>
  <!-- Data Table -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-custom">
    <div class="container-fluid">

      <div class="navbar-header">
        <a class="navbar-brand" href="#"><strong>421</strong></a>
      </div>

    </div>
  </nav>
  <div class="panel panel-default col-xs-10 col-xs-offset-1">
    <div class="panel-body col-xs-12">
      <table id="ListPlayerTable" class="table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Nombre de joueur</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>

</body>