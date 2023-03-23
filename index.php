<?php

# Inclusion of classes

include "./classCrud.php";

$new = new Users("root", "localhost", "", "dbname");
$all = $new->read();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="Bootstrap5/css/bootstrap.css">
    <script src="Bootstrap5/js/bootstrap.js" defer></script>
    <title>CrudPHP - OOP - PDO</title>
</head>

<body>
    <div class="container-fluid">
        <div class="button text-center mt-4 mb-3">
            <a href="addData.php" class="btn btn-success text-white">Add Item</a>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col-10 text-center">
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Years</th>
                            <th scope="col">Actions</th>
                        </tr>
                        
                    </thead>

                    <tbody>

                        <?php
            foreach ($all as $key => $val) { ?>
                        <tr>
                            <td>
                                <?php echo $val["userName"]; ?>
                            </td>
                            <td>
                                <?php echo $val["userAddress"]; ?>
                            </td>
                            <td>
                                <?php echo $val["userYear"]; ?>
                            </td>
                            <td><a href="delete.php?id=<?php echo $val['id'] ?>"
                                    class="btn btn-danger text-white">Delete</a> <a
                                    href="update.php?id=<?php echo $val['id'] ?>"
                                    class="btn btn-primary text-white">Update</a></td>
                        </tr>
                        <?php ; } ?>

                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>


</body>

</html>