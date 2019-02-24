<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["admin"]))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "login_details";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if(mysqli_connect_error())
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
            $t = $_POST["time"];
           
            $d = $_POST["description"];
            
            $m = $_POST["marks"];
            

            $INSERT = "INSERT INTO description VALUES ('$d','$t','$m')";
                if (mysqli_query($conn, $INSERT)) {
                    header('location: admin.html');
                } 
                else
                {
                    echo "Error: " . $INSERT . "<br>" . mysqli_error($conn);
                }

//      mysqli_close($conn);
    }
}
else
{
    echo "<script>alert('first login as admin')</script>";
    echo "<script>location.href = 'front.php'</script>";
}
?>