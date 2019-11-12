<?php
include "./db.php";
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

    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                    <h1>영종중 백운제 투표시스템</h1>
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
                  <p>백운제에 참여한 팀을 투표해 보세요!
1인당 3회까지 투표할 수 있습니다.
모든 정보는 암호화 됩니다.</p>
                  <hr>
                  <?php
                   if (isset($_SESSION["u_id"])) {
?>
  <p><strong>Radio Button</strong></p>
  <form method="post" action="vote_ok.php">

  <select class="mdb-select form-control" name="mes">
    <option value="" disabled selected>Choose your option</option>
    <?php
    $query1 = sprintf("SELECT * FROM votelist");
    $result1=mysqli_query($conn, $query1);
    while($row = mysqli_fetch_array($result1)) {

     ?>
    <option value="<?=$row["idx"]?>"><?=$row["teamname"]?> (<?=$row["teamtype"]?>)
    </option>
  <?php } ?>
  </select>
  <button type="submit" class="btn btn-primary mb-2">투표</button>

</form>
<br>
<p>© <a href="https://devent.kr">DeVent</a> </p>

<?php                   }else {
                     ?>
<p>© <a href="https://devent.kr">DeVent</a> </p>
                     <?php
                   }

                  ?>

                </div>
            </div>
        </div>
    </header>



    <!-- Dipokal HHJ: 로그인 모달 화면 입니다. -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-7">
                  <div class="card card-signin my-5">
                    <div class="card-body">
                      <h5 class="card-title text-center">로그인</h5>
                      <form class="form-signin" method="post" action="login_ok.php">
                        <div class="form-label-group">
                          <input type="text" name="Id" class="form-control" placeholder="아이디" required autofocus></input>
                        </div>

                        <div class="form-label-group">
                          <input type="password" name="Password" class="form-control" placeholder="비밀번호" required></input>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Dipokal HHJ: 가입 모달 화면 입니다. -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="card card-signin my-5">
                        <div class="card-body">
                          <h5 class="card-title text-center">가입</h5>
                          <form class="form-signin" method="post" action="newup.php">

                            <div class="form-label-group">
                              <input type="text" name="hakbun" class="form-control" placeholder="학번" required autofocus></input>
                            </div>

                            <div class="form-label-group">
                              <input type="text" name="Id" class="form-control" placeholder="아이디" required autofocus></input>
                            </div>

                            <div class="form-label-group">
                              <input type="password" name="Password" class="form-control" placeholder="비밀번호" required></input>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">가입</button>
                            <hr class="my-4">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Dipokal HHJ: 필요한 자바스크립트를 임포트 합니다. 상황에따 라 접속 지연이 발생할 수 있으나 큰 문제는 아닙니다. -->
    <script src='//unpkg.com/jquery@3/dist/jquery.min.js'></script>
    <script src='//unpkg.com/popper.js@1/dist/umd/popper.min.js'></script>
    <script src='//unpkg.com/bootstrap@4/dist/js/bootstrap.min.js'></script>

    <!-- Dipokal HHJ: 내부 자바스크립트 파일 임포트. -->

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/scrollUp.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
