<?php
include "./db.php";

?>

<?php


// Dipokal HHJ: SQL 인젝션을 방지하는 보안 코드 입니다.
$id = mysqli_real_escape_string($conn, $_POST['Id']);
$pass = mysqli_real_escape_string($conn, $_POST['Password']);
$hakbun = mysqli_real_escape_string($conn, $_POST['hakbun']);

$special_pattern = "/[`~!@#$%^&*|\\\'\";:\/?^=^+_()<>]/";

$hakbun = (int)$hakbun;
// Dipokal HHJ: IP
$ip = $_SERVER['REMOTE_ADDR'];

//  Dipokal HHJ: 클라우드플레어 IP
$cip = $_SERVER["HTTP_CF_CONNECTING_IP"];

// Dipokal HHJ: ID 에 특수문자를 사전에 걸러내는 코드.
if( preg_match($special_pattern, $id) ){
  $msg = "ID에 특수문자는 사용할 수 없습니다.";
  echo("<script>alert('$msg');history.back();</script>");
  exit;
}else {

  // Dipokal HHJ: 학번이 정수가 아닐경우
  if(!is_int($hakbun)){
    $msg = "학번 에러";
    echo("<script>alert('$msg');history.back();</script>");
    exit;
  } else {
    // Dipokal HHJ: 올바른 학번
    // Dipokal HHJ: 중복 ID 탐색
    $query = sprintf("SELECT * FROM stu WHERE Id='%s'", $id);
    $result=mysqli_query($conn, $query);
    $count=mysqli_num_rows($result);

    // Dipokal HHJ: 올바른 학번
    // Dipokal HHJ: 중복 IP 탐색
    $query1 = sprintf("SELECT * FROM stu WHERE ip='%s'", $cip);
    $result1=mysqli_query($conn, $query1);
    $count1=mysqli_num_rows($result1);


    // Dipokal HHJ: 중복 체크
    if($count==0 and $count1==0)
    {

          // Dipokal HHJ: 비밀번호 암호화
          $encrypted_password = password_hash($pass, PASSWORD_DEFAULT);

          // Dipokal HHJ: DB insert 구문
          $sql="INSERT INTO stu(Id, pw, hakbun, ip) VALUES('$id','$encrypted_password','$hakbun','$cip')";
          mysqli_query($conn, $sql);

          if(!isset($_SESSION))
          {
              session_start();
          }
          echo "<script type='text/javascript'> history.back();</script>";

    }elseif ($count==1)
    {
      echo "<script>alert('존재하는 아이디 입니다. 아이디를 변경해 주세요.');history.back();</script>";
    }elseif ($count1==1) {
      echo "<script>alert('존재하는 IP 입니다. 스마트폰 데이터를 사용해 주세요');history.back();</script>";
    }else {
      echo "<script>alert('존재하는 아이디또는 User 입니다.');history.back();</script>";
    }
  }
}



?>
