<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--Local CSS-->
        <link rel="stylesheet" type=text/css href="css/loginStyle.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
        <link rel="manifest" href="images/site.webmanifest">
        <title>Reset password</title>
    </head>
    <body>
        <?php
            include_once "header.php";
        ?>
        <main class="container text-center">
            <div class="sign-in">
                <!--Logo-->
                <div class="row">
                    <div class="col-lg">
                        <img src="images/logo.png" class="mw-100" alt="logo">
                        <h1 class="h3 mb-3 font-weight-normal text-white">Please enter your username and email</h1>
                        <!--
                            <img src="images/logo.png" class="mw-100" alt="logo">  
                        -->
                    </div>
                </div>
                <!--Form box-->
                <!--Username and password-->
                <form action="resetPass.php" method="POST">
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="searchForm" name="user" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="searchForm" name="mail" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <!--Comfirm button-->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <button type="submit" class="btn btn-light btn-lg btn-block">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <?php
            include_once "footer.php";
        ?>
    </body>
</html>