<?php
    session_start();
    if(!isset($_SESSION["logged"])){
        $_SESSION["logged"] = "";
    }else{}

    date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<header class="container">
    <div class="container">
        <!--Navigation-->
        <nav class="navbar navbar-expand-md navbar-dark bg-transparent">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="100" height="100" alt="logo" loading="lazy"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php
                        //echo $_SESSION["logged"];
                        //echo $_SESSION["user"];
                        //echo $_SESSION["userID"];
                        if($_SESSION["logged"] == TRUE && $_SESSION["accType"] == 1){?>
                            <li class="nav-item active">
                                <a class="nav-link" href="profilePage.php">Hi, <?php echo $_SESSION["user"]; ?> <span class="sr-only">(current)</span></a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li><?php
                        }else if($_SESSION["logged"] == TRUE && $_SESSION["accType"] == 2){?>
                            <li class="nav-item active">
                                <a class="nav-link" href="profilePageHotelier.php">Hi, <?php echo $_SESSION["user"]; ?> <span class="sr-only">(current)</span></a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li><?php                            
                        }else if($_SESSION["logged"] == TRUE && $_SESSION["accType"] == 0){?>
                            <li class="nav-item active">
                                <a class="nav-link" href="profilePageAdmin.php">Hi, <?php echo $_SESSION["user"]; ?> <span class="sr-only">(current)</span></a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li><?php 
                        }
                        else{?>
                            <li class="nav-item active">
                                <a class="nav-link" href="loginPage.php">Login <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registerPage.php">Register</a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li><?php
                        }   
                    ?>
                </ul>
            </div>
        </nav>
        <?php //print_r($_SESSION); ?>
    </div>
</header>