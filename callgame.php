<?php
include_once 'dbh-inc.php';

$qeuryGame = "SELECT f_wallet_name FROM wallet_code";
$result = mysqli_query($conn, $qeuryGame);
$num = mysqli_num_rows($result);

if($num > 0){
    while($row = mysqli_fetch_array($result)){
        $wallet_name = $row['f_wallet_name'];
        echo $wallet_name."<br>";
    }
}
?>