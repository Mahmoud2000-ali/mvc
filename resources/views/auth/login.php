<?php

use mvc\core\Helper;
use mvc\core\Session;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .danger {
            color: red;
        }
    </style>
</head>

<body style="background-color:#ddd">
    <div class="app mt-5">
        <div class="container">
            <div class="user-info bg-white p-5">
                <h1 class="text-center">Login to our website</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="\blog">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>

                <!-- Login  -->
                <form class='mt-4' action="\auth\check_login" method="POST">
                    <!-- email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control <?= Helper::is_invalid('email') ?>" placeholder="Email" value="<?= Helper::old('email') ?>">
                        <small class="danger"><?= Helper::error('email') ?></small>
                    </div>

                    <!-- password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control <?= Helper::is_invalid('password') ?>" placeholder="Password" value="<?= Helper::old('password') ?>">
                        <small class="danger"> <?= Helper::error('password') ?> </small>
                    </div>

                    <button type="submit" class="btn btn-primary d-flex w-100 justify-content-center">Create</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>