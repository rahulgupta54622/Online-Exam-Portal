
<?php

    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["admin"]))
{
   
    $count = count($_POST)/6;

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "ExamPortalDb";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if(mysqli_connect_error())
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $query = "SELECT * FROM Questions";

        $result = mysqli_query($conn, $query);

        $total_question = mysqli_num_rows($result);

        echo $total_question;
        
        for($i = 0; $i<$count; $i++)
        {   

            $q = $_POST["q".$i];
           
            $a = $_POST["a".$i];
            
            $b = $_POST["b".$i];
            
            $c = $_POST["c".$i];
           
            $d = $_POST["d".$i];
            
            $ans = $_POST["ans".$i];

            $q_no = $total_question + 1 + $i;
            

$INSERT = "INSERT INTO Questions VALUES ('$q_no', '$q','$a','$b','$c','$d','$ans')";

                if (mysqli_query($conn, $INSERT)) {
                    header('location: admin_console.php');
                } 
                else
                {
                    echo "Error: " . $INSERT . "<br>" . mysqli_error($conn);
                }
        }

//      mysqli_close($conn);
    }
}
else
{
    echo "first login as admin";
}


?>