<?php
require '../php/pdo.php';

// 接收前台POST过来的用户名和密码
if(!empty($_POST['name'])){
  $name = htmlentities($_POST['name']);
  $pwd  = md5(htmlentities($_POST['pwd']));

  // 查询前台用户名和密码与数据库用户名密码是否匹配
  $sql = "SELECT id,name,password FROM users
  WHERE name = '$name'
  AND password = '$pwd'";
  $res = $pdo->query($sql);
  $row=$res->fetchAll(PDO::FETCH_BOTH);
  foreach ($row as $k) {
    $id = $k['id'];
  }
  // 用户名和密码匹配的话 $row有值，跳转到index.php
  if($row){
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;
    $date = date("Y/m/d H:i");
    $ip = $_SERVER['REMOTE_ADDR'] == '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $sql = "UPDATE users SET created_at = '$date' ,updated_at = '$ip' 
    WHERE name = '$name'";
    $row = $pdo->exec($sql);
    header('location: index.php');
  }else{
    // 用户名和密码不匹配，$row为false 登录失败
    echo "<script>alert('登录失败')</script>";
  }
}

?>


<!doctype html>
<html>

<head>
  <title>AJiu | Backstage</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/googlefonts.css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div>
      <div>
        <div class="container" style="width: 50%;margin-top: 250px;">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">登录</h4>
                    <p class="card-category">以管理员身份登录后台</p>
                  </div>
                  <div class="card-body">
                    <form action="login.php" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">用户名</label>
                            <input type="text" name="name" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">密码</label>
                            <input type="password" name="pwd" class="form-control">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right">登录</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
</body>

</html>