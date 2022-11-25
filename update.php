<?php

if(isset($_GET["id"])){
    include "classCrud.php";
    $new = new Users();
    $all = $new->getUser($_GET['id']);
    foreach($all as $key => $val);

    if(isset($_POST['submit'])){
        $new->setUserName($_POST['userName']);
        $new->setUserAddress($_POST['userAddress']);
        $new->setUserYear($_POST['userYear']);

        
       if($new->update($_GET["id"]) == true){
        echo "<script>alert('Usuário alterado com sucesso!');document.location='index.php'</script>";
       };
       
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap5/css/bootstrap.css">
    <script src="Bootstrap5/js/bootstrap.js" defer></script>
    <title>Update</title>
</head>
<body>
<body>
    <div class="container">
        <p class="text-center text-secondary mt-5 pt-5 pb-3 fs-3">Update User</p>
        <div class="row text-white">
            <div class="col-xl-4 col-sm-2 col-2"></div>
            <div class="col-xl-4 col-sm-8 col-8 bg-dark border border-secondary p-5 rounded-4">
                <form action="" method="POST">
                    <label>Name</label>
                    <input type="text" class="form-control" name="userName" value="<?= $val["userName"]; ?>">
                    <br>

                    <label>Address</label>
                    <input type="text" name="userAddress" class="form-control" value="<?= $val["userAddress"]; ?>" id="">
                    <br>

                    <label>Years</label>
                    <input type="number" name="userYear" class="form-control" value="<?= $val['userYear']; ?>" id="">
                    <br>

                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-success" value="Send" name="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-4 col-sm-2 col-2"></div>
        </div>
    </div>
</body>

  