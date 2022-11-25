<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap5/css/bootstrap.css">
    <script src="Bootstrap5/js/bootstrap.js" defer></script>
    <title>Add</title>
</head>

<body>
    <div class="container">
        <p class="text-center text-secondary mt-5 pt-5 pb-3 fs-3">Insert New User</p>
        <div class="row text-white">
            <div class="col-xl-4 col-sm-2 col-2"></div>
            <div class="col-xl-4 col-sm-8 col-8 bg-dark border border-secondary p-5 rounded-4">
                <form action="addDataProcessor.php" method="POST">
                    <label>Name</label>
                    <input type="text" class="form-control" name="nameUser">
                    <br>

                    <label>Address</label>
                    <input type="text" name="userAddress" class="form-control" id="">
                    <br>

                    <label>Years</label>
                    <input type="number" name="userYears" class="form-control" id="">
                    <br>

                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-success" value="Send">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-4 col-sm-2 col-2"></div>
        </div>
    </div>
</body>

</html>