<?php
require 'header.php';
require '../php/pdo.php';

// 接收URL中的Id
$id = intval($_GET['id']);
if (empty($id)) {
	header('location: users.php');
}

// 查询信息
$sql = "SELECT id,name,email,tel FROM user
		WHERE id = '$id'";
$res = $pdo->query($sql);
$row = $res->fetchAll(PDO::FETCH_BOTH);

// if(!empty($_POST['id'])){
// 	$name = htmlentities($_POST['name']);
// 	$tel = htmlentities($_POST['tel']);
// 	$email = htmlentities($_POST['email']);
// 	var_dump($name);
// 	$sql = "UPDATE user SET name = '$name',tel = '$tel',email = '$email' 
// 			WHERE id = '$id'";
// 	$res = $pdo->exec($sql);

// 	if($res){
// 		echo "<script>alert('修改成功')</script>";
// 	}else{
// 		echo "<script>alert('修改失败')</script>";
// 	}
	
// }
?>
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">编辑</h4>
						<p class="card-category">编辑一个用户</p>
					</div>
					<div class="card-body">
						<form action="user_edit.php?id=<?php echo $id; ?>" method="post">
							<?php foreach ($row as $k):?>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd -label-floating">用户名</label>
										<input type="text" name="name" value="<?php echo $k['name']; ?>" disabled class="form-control">
									</div>
								</div>
							</div>
						<?php endforeach; ?>
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
							<button type="submit" class="btn btn-primary pull-right">更新信息</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		require 'footer.php';
		?>
