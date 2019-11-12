<?php
include "../db.php";
if(!isset($_SESSION))
{
    session_start();
}
 ?>
<!doctype html>
<html class="no-js" lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Dipokal HHJ">
    <!-- Dipokal HHJ: 웹사이트 설명 입니다. -->
    <meta name="description" content="영종중 백운제 투표시스템">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Dipokal HHJ: 모바일 화면과 관련된 설정 입니다. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dipokal HHJ: 웹사이트 제목 입니다.-->
    <title>영종중 투표시스템</title>

    <!-- Dipokal HHJ: 헤더파일 -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="../images/favicon.ico" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body data-spy="scroll" data-target="#primary-menu">


  <!-- Dipokal HHJ: 상단바. -->

    <div class="mainmenu-area" data-spy="affix" data-offset-top="100">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand logo">
                    <h2>Vote</h2>
                </a>
            </div>
            <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#home-page">Home</a></li>

                </ul>
            </nav>
        </div>
    </div>


    <!-- Dipokal HHJ: 웹사이트에 직접적으로 보여지는 화면 입니다. -->
    <header class="overlay full-height relative v-center" id="home-page">
        <div class="absolute anlge-bg"></div>
        <div class="container">
            <div class="row v-center">
                <div class="col-xs-12 col-md-7 header-text text-center">
                    <h1>영종중 백운제 관리시스템</h1>
                    <p></p>
                    <?php
                     if (isset($_SESSION["u_id"])) {
                       echo $_SESSION["u_id"]."님 환영합니다!";
                  ?>
                  <br>
                  <a href="./logout.php" class="button dark">로그아웃</a>


                  <?php
                     }else {
                       ?>
                       <a data-toggle="modal" href="#myModal1" class="button white">가입</a>
                       <a data-toggle="modal" href="#myModal" class="button white">로그인</a>
                       <?php
                     }

                    ?>

                </div>
                <div class="col-xs-12 col-md-5 header-text text-center">
                  <?php
                  $query1 = sprintf("SELECT * FROM stu WHERE Id='%s'", mysqli_real_escape_string($conn, $_SESSION['u_id']));
                  $result1 = mysqli_query($conn, $query1);
                  $row1 = mysqli_fetch_array($result1);

                  $level = $row1['level'];

                  if ($level == 1) {
                    // Dipokal HHJ: 관리자일 경우
                    ?>

<?php
$query = sprintf("SELECT * FROM votelog");
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
?>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
     var data = google.visualization.arrayToDataTable([
       ['City', '2010 Population'],
       <?php
       $query3 = sprintf("SELECT * FROM votelist");
       $result3 = mysqli_query($conn, $query3);
       while ($row3 = mysqli_fetch_array($result3)) {
       ?>
       ['<?=$row3['teamname']?>', <?=$row3['ck']?>],
       <?php
     } ?>
     ]);

     var options = {
       title: 'Population of Largest U.S. Cities',
       chartArea: {width: '50%'},
       hAxis: {
         title: 'Total Population',
         minValue: 0
       },
       vAxis: {
         title: 'City'
       }
     };

     var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
     chart.draw(data, options);
   }
  </script>
  <div id="chart_div"></div>





<?php }

 ?>
 <hr>

 <form action="insert_team_ok.php" method="post">
   <div class="form-group">
     <label for="exampleInputEmail1">Team Name</label>
     <input type="text" class="form-control" name="tname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="팀이름">
   </div>
   <div class="form-group">
     <label for="exampleInputPassword1">Team Type</label>
     <input type="text" class="form-control" name="ttype" id="exampleInputPassword1" placeholder="팀 종류 예) 댄스... 등등">
   </div>
   <button type="submit" class="btn btn-primary">Submit</button>
 </form>


                    <?php
                  } else {
                    // code...
                  }


                   ?>

                </div>
            </div>
        </div>
    </header>



        <!-- Dipokal HHJ: 필요한 자바스크립트를 임포트 합니다. 상황에따 라 접속 지연이 발생할 수 있으나 큰 문제는 아닙니다. -->
    <script src='//unpkg.com/jquery@3/dist/jquery.min.js'></script>
    <script src='//unpkg.com/popper.js@1/dist/umd/popper.min.js'></script>
    <script src='//unpkg.com/bootstrap@4/dist/js/bootstrap.min.js'></script>

    <!-- Dipokal HHJ: 내부 자바스크립트 파일 임포트. -->

    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/contact-form.js"></script>
    <script src="../js/jquery.parallax-1.1.3.js"></script>
    <script src="../js/scrollUp.min.js"></script>
    <script src="../js/magnific-popup.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
