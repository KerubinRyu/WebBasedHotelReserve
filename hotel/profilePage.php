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
        <link rel="stylesheet" type=text/css href="css/aboutStyle.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
        <link rel="manifest" href="images/site.webmanifest">
        <title>Profile</title>
    </head>
    <body>
        <?php
            include_once "header.php";
        ?>
        <main class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-white active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-booking" role="tab" aria-controls="pills-contact" aria-selected="false">Bookings</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="jumbotron">
                        <h1 class="display-4">Hello, <?php echo $_SESSION["user"] ?>!</h1>
                        <p class="lead">In this page, you will be able to view your booking and update your details</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">
                        <div class="card-header">
                            <h2>Profile of <?php echo $_SESSION["user"]; ?></h2>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Email address</h3>
                            <div class="row">
                                <div class="col-lg mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $current_user_id = $_SESSION["userID"];
                                                $conn = mysqli_connect("localhost", "root", "", "hotel");
    
                                                if($conn){
                                                    $sql = "SELECT USER_EMAIL, ACC_STAT FROM USER WHERE USER_ID = '$current_user_id'";
                                                    $result = $conn->query($sql);
    
                                                    while($row = $result->fetch_assoc()){
                                                        $user_email = $row["USER_EMAIL"];
                                                        
                                                        echo $user_email;
                                                    }
                                                }else{
                                                    die("FATAL ERROR");
                                                }
                                                $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="card-title">Account status</h3>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $current_user_id = $_SESSION["userID"];
                                                $conn = mysqli_connect("localhost", "root", "", "hotel");
    
                                                if($conn){
                                                    $sql2 = "SELECT ACC_STAT FROM USER WHERE USER_ID = '$current_user_id'";
                                                    $sql3 = "SELECT ADMIN_EMAIL FROM ADMIN WHERE ADMIN_ID = 2";
                                                    $result2 = $conn->query($sql2);
                                                    $result3 = $conn->query($sql3);
    
                                                    while($row_2 = $result2->fetch_assoc()){
                                                        $user_stat = $row_2["ACC_STAT"];
                                                        
                                                        while($row_3 = $result3->fetch_assoc()){
                                                            $admin_email = $row_3["ADMIN_EMAIL"];
                                                            
                                                            if($user_stat == 0){
                                                                echo "Normal, enjoy your stay";
                                                            }else{
                                                                echo "Blacklisted, please contact the admin</br>";
                                                                echo "Admin email: ";?>
                                                                <b><?php echo $admin_email ?></b><?php
                                                            }
                                                        }
                                                    }
                                                }else{
                                                    die("FATAL ERROR");
                                                }
                                                $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-booking" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Your bookings</h3>
                        </div>
                        <div class="card-body">
                            <?php 
                                $current_user_id = $_SESSION["userID"];
                                $conn = mysqli_connect("localhost", "root", "", "hotel");

                                if($conn){
                                    $sql4 = "SELECT * FROM HOTEL_USER_BOOK WHERE USER_ID = '$current_user_id'";
                                    $result4 = $conn->query($sql4);

                                    while($row_4 = $result4->fetch_assoc()){
                                        $book_id = $row_4["BOOK_ID"];
                                        $room_id = $row_4["ROOM_ID"];
                                        $hotel_name = $row_4["HOTEL_NAME"];
                                        $hotel_loc = $row_4["HOTEL_LOC"];
                                        $hotel_address = $row_4["ADDRESS"];
                                        $hotel_contact = $row_4["CONTACT"];
                                        $room_type = $row_4["ROOM_TYPE"];
                                        $room_num = $row_4["ROOM_NUMBER"];
                                        $room_price = $row_4["ROOM_PRICE"];
                                        $room_img = $row_4["ROOM_IMG"];
                                        $book_date = $row_4["BOOK_DATE"];
                                        $check_in = $row_4["CHECK_IN"];
                                        $check_out = $row_4["CHECK_OUT"];
                                        $payment_meth = $row_4["PAYMENT_TYPE"];
                                        $status = $row_4["STATUS"];
                                        $hotel_id = $row_4["HOTEL_ID"];?>

                                        <div class="row mb-3">               
                                            <div class="col-lg">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text">Booking ID: <b><?php echo $book_id; ?></b></p>
                                                        <p class="card-text">Hotel name: <b><?php echo $hotel_name; ?></b></p>
                                                        <p class="card-text">Hotel location: <b><?php echo $hotel_loc; ?></b></p>
                                                        <p class="card-text">Hotel address: <b><?php echo $hotel_address; ?></b></p>
                                                        <p class="card-text">Hotel contact: <b><?php echo $hotel_contact; ?></b></p>
                                                        <p class="card-text">Room type: <b><?php echo $room_type; ?></b></p>
                                                        <p class="card-text">Room number: <b><?php echo $room_num; ?></b></p>
                                                        <p class="card-text">Room price: <b><?php echo $room_price; ?></b></p>
                                                        <p class="card-text">Book date: <b><?php echo $book_date; ?></b></p>
                                                        <p class="card-text">Check-in date: <b><?php echo $check_in; ?></b></p>
                                                        <p class="card-text">Check-out date: <b><?php echo $check_out; ?></b></p>
                                                        <p class="card-text">Payment method: <b><?php echo $payment_meth; ?></b></p>
                                                        <p class="card-text">Status: <b><?php echo $status; ?></b></p>
                                                        <?php
                                                            if($status != "CHECKED_OUT"){?>
                                                                <a href="cancelBookMail.php?book_id=<?=$book_id?>&room_id=<?=$room_id?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" 
                                                                title="Are you sure you want to cancel?">Cancel booking</a><?php
                                                            }else{?>
                                                                <a href="feedback.php?hotel_id=<?=$hotel_id?>" class="btn btn-success">Rate & comment</a><?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    die("FATAL ERROR");
                                }
                                
                                $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Modal -->
        <div class="modal fade" id="cancelBook" tabindex="-1" role="dialog" aria-labelledby="cancelBook" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book cancellation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are ytou sure you want to <b>cancel</b> this booking?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="cancelBookMail.php?book_id=<?=$book_id?>&room_id=<?=$room_id?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" 
                    title="Are you sure you want to cancel?">Cancel booking</a>
                </div>
                </div>
            </div>
        </div>
        <?php
            include_once "footer.php";
        ?>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>