<?php
$username = $_POST['email'];
$password = $_POST['pass'];
if(!empty($username)|| !empty($pass))
{ 


    
    $servername = "localhost";
    $dbUsername ="root";
    $dbPassword = "";
    $dbname = "Website";
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
    $SELECT = "SELECT email From register Where email = ? Limit = 1";
    $INSERT = "INSERT Into register (username, pass) values( ?,?)";
    $stmt= $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if (rnum==0){
        $stmt->close();
        $stmt= $conn->prepare($INSERT);
        $stmt->bind_param("ss", $username, $pass);
        $stmt->execute();
        echo "New Record inserted correctly";

    } else{
        echo "already used email";

    }
    
    $stmt->close();
    $conn->close();
}

}
else {
    echo "All fields required";
    die();
}

?>