
<?php
include "./db.php";
if(!isset($_SESSION))
{
    session_start();
}

$mes = $_POST['mes']; // Dipokal HHJ: vote
$mes = mysqli_real_escape_string($conn, $mes);

$mes =(int)$mes;

if (!isset($_SESSION["u_id"])) {
  echo "ERROR!";
}else {
  echo $mes;
  // Dipokal HHJ: DB insert 구문
  $sql="UPDATE votelist SET ck = ck+1 WHERE idx = '$mes'";
  mysqli_query($conn, $sql);

  $sql="INSERT INTO votelog(Id, idxq) VALUES ('$_SESSION[u_id]', '$mes')";
  mysqli_query($conn, $sql);}

  echo "<script type='text/javascript'> history.go(-1);</script>";

?>
