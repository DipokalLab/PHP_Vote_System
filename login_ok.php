
<?php
include "./db.php";

$id = $_POST['Id']; // 아이디
$pw = $_POST['Password']; // 패스워드
if ( ($id=='') || ($pw=='') ) {
  echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.');history.back();</script>";
  exit;
}
$pw = mysqli_real_escape_string($conn, $pw);


$query1 = sprintf("SELECT * FROM stu WHERE Id='%s'", mysqli_real_escape_string($conn, $id));
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);
if ( password_verify($pw, $row1['pw'])){

  session_start();
  $_SESSION["u_id"] = $id;
  echo "<script type='text/javascript'> history.go(-1);</script>";

}else{
  echo "<script>alert('아이디 또는 패스워드를 확인해 주세요');history.back();</script>";

}




?>
