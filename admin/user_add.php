<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';

if(!empty($_POST['name'])){
	$name  = htmlentities($_POST['name']);
	$pwd   = md5(htmlentities($_POST['pwd']));
	$qpwd  = md5(htmlentities($_POST['qpwd']));
	$email = htmlentities($_POST['email']);
	$tel   = htmlentities($_POST['tel']);
	$sql = "INSERT INTO user(name,password,email,tel)
			VALUES ('$name','$pwd','$email','$tel')";
	$res = $pdo->exec($sql);

	if($res){
		echo "<script>alert('添加成功')</script>";
	}else{
		echo "<script>alert('添加失败(用户名、联系电话、邮箱重复)')</script>";
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
						<h4 class="card-title">添加用户</h4>
						<p class="card-category">添加一个用户</p>
					</div>
					<div class="card-body">
						<form action="user_add.php" method="post">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">用户名</label>
										<input type="text" name="name" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">密码</label>
										<input type="password" name="pwd" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="bmd-label-floating">确认密码</label>
										<input type="password" name="qpwd" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">联系电话</label>
										<input type="text" name="tel" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">电子邮箱</label>
										<input type="email" name="email" class="form-control">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">添加用户</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		require 'footer.php';
		?>