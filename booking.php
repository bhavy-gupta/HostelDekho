<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hosteldekho";
// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
    $originalDate = $_POST['datepicker'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    // SQL query 
    $sql = "SELECT * FROM checkdate 
WHERE DATE(createdat) = '$newDate'";
    $result = mysqli_query($conn, $sql);
    $name = $_POST['name'];
    $datepicker = $newDate;
    if (mysqli_num_rows($result) == 0) {
        // output data of each row
        $sql = "INSERT INTO `checkdate` (`id`, `name`, `createdat`) VALUES ('','$name','$datepicker');";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>How to insert date in MySQL using PHP</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>

<body>
    <div style="background-color:#e5bcbc;" align="center">
        <h2>How to insert date in MySQL using PHP</h2>
        <form action="" method="post">
            <p>Name: <input type="text" name="name" id="name" value="" autocomplete="off"></p>
            <p>Date: <input type="text" id="datepicker" name="datepicker" autocomplete="off"></p>
            <input type="submit" value="Submit" name="submit">
        </form>
        <table class="table table-bordered" border="2" align="left" width="50%">
            <tr>
                <td colspan="5">
                    <center>
                        <h3>Output Date Inserted in Database</h3>
                    </center>
                </td>
            </tr>
            <tr>
            <tr>
                <center>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                </center>
            </tr>
            <?php $fetchqry = "SELECT * FROM `checkdate`";
            $result1 = mysqli_query($conn, $fetchqry);
            $num = mysqli_num_rows($result1);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td>
                            <p><?php echo $row['id']; ?></p>
                        </td>
                        <td><?php echo $row['name'] ?> </td>
                        <td><?php echo $row['createdat']; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
            </tr>
        </table>
    </div>
</body>

</html>