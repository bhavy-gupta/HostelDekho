<?php
include('db.php');
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVATION SUNRISE HOTEL</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script>
        $(function() {
            $("#cin").datepicker();
            $("#cout").datepicker();
        });
    </script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>

                </ul>

            </div>

        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Make a Booking <small></small>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PERSONAL INFORMATION
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="name" class="form-control" readonly placeholder="<?php
                                                                                                        echo $_SESSION['name'];
                                                                                                        ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" class="form-control" readonly placeholder="<?php
                                                                                                        echo $_SESSION['phone'];
                                                                                                        ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" readonly placeholder="<?php
                                                                                                                    echo $_SESSION['email'];
                                                                                                                    ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>Hostel</label>
                                        <input name="hostel" class="form-control" readonly placeholder="<?php
                                                                                                        echo $_SESSION['hostel'];
                                                                                                        ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>Course</label>
                                        <input name="course" type="text" class="form-control" required>

                                    </div>

                                    <div class="form-group">
                                        <label>Home Town</label>
                                        <input name="hometown" type="text" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Alternate Phone Number</label>
                                        <input name="aphone" type="text" class="form-control" required>

                                    </div>




                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    RESERVATION INFORMATION
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Type Of Room *</label>
                                        <select name="troom" class="form-control" required>
                                            <option value selected></option>
                                            <option value="SINGLE NON-AC ROOM">SINGLE NON-AC ROOM</option>
                                            <option value="SINGLE AC ROOM">SINGLE AC ROOM</option>
                                            <option value="DOUBLE NON-AC ROOM">DOUBLE NON-AC ROOM</option>
                                            <option value="DOUBLE AC ROOM">DOUBLE AC ROOM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Meal Plan</label>
                                        <select name="meal" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Room Only">Room Only</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Breakfast + Dinner">Breakfast + Dinner</option>
                                            <option value="Breakfast + Lunch + Dinner">Breakfast + Lunch + Dinner</option>
                                            <option value="None">None</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Wi-fi Service</label>
                                        <select name="wifi" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Laundry Service</label>
                                        <select name="laundry" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Check-In</label>
                                        <input name="cin" id="cin" type="date" class="form-control" required>

                                    </div>

                                    <div class="form-group">
                                        <label>Check-Out</label>
                                        <input name="cout" id="cout" type="date" class="form-control" required>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Type Below this code <?php $Random_code = rand();
                                                        echo $Random_code; ?> </p><br />
                                <p>Enter the random code<br /></p>
                                <input type="text" name="code1" title="random code" />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" name="submit" class="btn btn-primary">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $code1 = $_POST['code1'];
                                    $code = $_POST['code'];
                                    if ($code1 != "$code") {
                                        $msg = "Invalide code";
                                    } else {
                                        $new = "Under Waiting";
                                        $newUser = "INSERT INTO `booking`(`name`, `phone`, `email`, `course`, `hometown`, `alt_phone`, `type_room`, `meal`, `wifi`, `laundry`, `check_in`, `check_out`,`stat`,`nodays`,`hostel`) VALUES ('$_SESSION[name]','$_SESSION[phone]','$_SESSION[email]','$_POST[course]','$_POST[hometown]','$_POST[aphone]','$_POST[troom]','$_POST[meal]','$_POST[wifi]','$_POST[laundry]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'),'$_SESSION[hostel]')";
                                        if (mysqli_query($conn, $newUser)) {
                                            echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
                                        } else {
                                            echo mysqli_error($conn);
                                            echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
                                        }
                                    }

                                    $msg = "Your code is correct";
                                }

                                ?>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>