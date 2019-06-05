<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';


if(!empty($_POST['name'])){
	$name = htmlentities($_POST['name']);
	$opwd = md5(htmlentities($_POST['opwd']));
	$npwd = md5(htmlentities($_POST['npwd']));
	$qpwd = md5(htmlentities($_POST['qpwd']));
	$id   = $_SESSION['id'];
	$sql = "SELECT id,name,password FROM users
			WHERE name = '$name' 
			AND password = '$opwd'";
	$res = $pdo->query($sql);
	$row = $res->fetchAll(PDO::FETCH_BOTH);
	if($row){
		if($npwd === $qpwd){
			$sql = "UPDATE users SET password = '$npwd' WHERE id = '$id'";
			$row = $pdo->exec($sql);
		}else{
			echo "<script>alert('两次密码输入不一致')</script>";
		}
	}else{
		echo "<script>alert('用户名或密码错误')</script>";
	}
}


?>
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">修改用户</h4>
						<p class="card-category">修改一个用户</p>
					</div>
					<div class="card-body">
						<form action="admin_edit.php" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">用户名</label>
										<input type="text" class="form-control" name="name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">旧密码</label>
										<input type="password" class="form-control" name="opwd">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">新密码</label>
										<input type="password" class="form-control" name="npwd">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">确认密码</label>
										<input type="password" class="form-control" name="qpwd">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">修改</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		require 'footer.php';
		?>