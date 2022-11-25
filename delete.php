<?php

if (isset($_GET["id"])) {
    include "./classCrud.php";
    $new = new Users();

    if ($new->delete($_GET["id"]) == true) {
        echo "<script>alert('Usuário deletado com sucesso!');document.location='index.php'</script>";
    }

}

?>