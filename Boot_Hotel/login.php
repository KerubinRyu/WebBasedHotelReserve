<?php
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $tempUser = "";
    $tempPass = "";


    $conn = mysqli_connect("localhost", "root", "", "hotel");

    if($conn){
        $sql = "SELECT USER_NAME, USER_PASS FROM USER";
        $result = $conn->query($sql);

        $sql_2 = "SELECT HOTELIER_NAME, HOTELIER_PASS FROM HOTELIER";
        $result_2 = $conn->query($sql_2);

        $sql_3 = "SELECT ADMIN_NAME, ADMIN_PASS FROM ADMIN";
        $result_3 = $conn->query($sql_3);

        //Display results
        /*
        //User
        if(mysqli_query($conn, $sql)){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo "USER: " . $row["USER_NAME"]. " - PASS: " . $row["USER_PASS"]. "<br>";
                  }
            }else{
                echo "no results";
            }
        }else{
            echo "ERROR";
        }
        //Hotelier
        if(mysqli_query($conn, $sql_2)){
            if($result_2->num_rows > 0){
                while($row = $result_2->fetch_assoc()) {
                    echo "HOTELIER: " . $row["HOTELIER_NAME"]. " - PASS: " . $row["HOTELIER_PASS"]. "<br>";
                  }
            }else{
                echo "no results";
            }
        }else{
            echo "ERROR";
        }
        //Admin
        if(mysqli_query($conn, $sql_3)){
            if($result_3->num_rows > 0){
                while($row = $result_3->fetch_assoc()) {
                    echo "ADMIN: " . $row["ADMIN_NAME"]. " - PASS: " . $row["ADMIN_PASS"]. "<br>";
                  }
            }else{
                echo "no results";
            }
        }else{
            echo "ERROR";
        }
        */
        //until here

        //--//

        //begin check criteria
        if(mysqli_query($conn, $sql)){
            while($row = $result->fetch_assoc()) {
                $tempUser = $row["USER_NAME"];
                $tempPass = $row["USER_PASS"];
                if ($user == $tempUser && $pass == $tempPass){
                    echo "yes User". "</br>";
                    //header("Location: redirect.html");
                    exit();
                }else{
                    echo "no". "</br>";
                }
            }        
        }

        if(mysqli_query($conn, $sql_2)){
            while($row = $result_2->fetch_assoc()) {
                $tempUser = $row["HOTELIER_NAME"];
                $tempPass = $row["HOTELIER_PASS"];
                if ($user == $tempUser && $pass == $tempPass){
                    echo "yes Hotelier". "</br>";
                    header("Location: redirect.html");
                    exit();
                }else{
                    echo "no". "</br>";
                }
            }        
        }

        if(mysqli_query($conn, $sql_3)){
            while($row = $result_3->fetch_assoc()) {
                $tempUser = $row["ADMIN_NAME"];
                $tempPass = $row["ADMIN_PASS"];
                if ($user == $tempUser && $pass == $tempPass){
                    echo "yes Admin". "</br>";
                    header("Location: redirect.html");
                    exit();
                }else{
                    echo "no". "</br>";
                }
            }        
        }
        //until here
    }else{
        die("FATAL ERROR");
    }

    $conn->close();
?>