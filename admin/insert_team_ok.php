
<?php
include "../db.php";
if(!isset($_SESSION))
{
    session_start();
}

$tname = $_POST['tname']; // Dipokal HHJ: vote
$tname = mysqli_real_escape_string($conn, $tname);

$ttype = $_POST['ttype']; // Dipokal HHJ: vote
$ttype = mysqli_real_escape_string($conn, $ttype);


if (!isset($_SESSION["u_id"])) {
  echo "ERROR!";
}else {
  // Dipokal HHJ: DB insert 구문
  $sql="INSERT INTO votelist(teamname, teamtype) VALUES ('$tname', '$ttype')";
  mysqli_query($conn, $sql);

}
echo "<script type='text/javascript'> history.go(-1);</script>";


?>
