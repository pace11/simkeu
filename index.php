<?php 
  if (isset($_COOKIE['user_simkeu'])) {
    date_default_timezone_set('Asia/Jakarta');
    include "config/connection.php";
    include "config/global_vars.php";

    if (isset($_GET['page']) && $_GET['page'] === 'logout') {
      setcookie('user_simkeu', '', time()-(86400 * 30), "/");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Dashboard - SIM-KEU</title>
  <link rel="apple-touch-icon" sizes="57x57" href="./dist/assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="./dist/assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="./dist/assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="./dist/assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="./dist/assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="./dist/assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="./dist/assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="./dist/assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="./dist/assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="./dist/assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./dist/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="./dist/assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./dist/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="./dist/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="./dist/assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Main styles for this application-->
  <link href="./dist/css/style.css" rel="stylesheet">
  <link href="./coreui/chartjs/dist/css/coreui-chartjs.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style>
    .field-icon {
      float: right;
      margin-right: 8px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
      cursor:pointer;
    }
  </style>
</head>

<body class="c-app">
  <?php 
    include "sidebar.php";
  ?>
  <div class="c-wrapper c-fixed-components">
    <?php 
      include "header.php";
    ?>
    <div class="c-body">
      <?php 
        include "routing.php"
      ?>
      <footer class="c-footer">
        <div><a href="https://coreui.io">CoreUI</a> &copy; 2020 creativeLabs.</div>
        <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
      </footer>
    </div>
  </div>
</body>

</html>
<?php 
  }
  else { ?>
    <div class="col-md-12" align="center">
      <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
    </div>

<?php echo"<meta http-equiv='refresh' content='1;url=login.php'>"; } ?>