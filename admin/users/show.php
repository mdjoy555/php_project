<?php
    $webroot = "http://localhost/php_project/";
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
    
    use Seip\Users;

    $_user = new Users();
    $_users = $_user->show();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Show</h1>
                    <dl class="row">
                        <dt class="col-sm-3">Id:</dt>
                        <dd class="col-sm-9"><?= $_users['id'];?></dd>
                        <dt class="col-sm-3">Name:</dt>
                        <dd class="col-sm-9"><?= $_users['name'];?></dd>
                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9"><?= $_users['email'];?></dd>
                        <dt class="col-sm-3">Password:</dt>
                        <dd class="col-sm-9"><?= md5($_users['password']);?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  </body>
</html>