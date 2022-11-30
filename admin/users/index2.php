<?php
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
    
    use Seip\Users;
    
    $_user = new Users();
    $_users = $_user->index2();    
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
                    <?php
                        if($_SESSION['message']!=""):
                            ?>
                            <div class="alert alert-warning">
                                <?php
                                    echo $_SESSION['message'];
                                    $_SESSION['message'] = "";
                                ?>
                            </div>
                        <?php
                        endif;
                        ?>
                    <h1 class="text-center">Lists</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(count($_users)>0):
                            foreach($_users as $user):
                        ?>
                            <tr>
                              <td><?= $user['name'];?></td>
                              <td><a href="show.php?id=<?= $user['id']; ?>">Show</a>
                              | <a href="edit.php?id=<?= $user['id']; ?>">Edit</a>
                              | <a href="accept.php?id=<?= $user['id']; ?>">Accept</a>
                              | <a href="delete.php?id=<?= $user['id']; ?>"
                              onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                            </tr>
                        <?php
                            endforeach;
                            else:
                        ?>
                        <tr>
                            <td class="text-center" colspan="2">No user is available.</td>
                        </tr>
                        <?php
                            endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  </body>
</html>