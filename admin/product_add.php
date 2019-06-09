<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';

if(!empty($_POST['title'])){
	$title 	  = htmlentities($_POST['title']);
	$intro 	  = htmlentities($_POST['intro']);
	$classify = htmlentities($_POST['classify']);
	$content  = htmlentities($_POST['content']); 

	$date = date("Y/m/d H:i");
	$sql = "INSERT INTO blog(title,intro,classify,content,registration)
			VALUES ('$title','$intro','$classify','$content','$date')";
	$res = $pdo->exec($sql);
	var_dump($res);
}


?>
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">添加文章</h4>
						<p class="card-category">添加一篇文章</p>
					</div>
					<div class="card-body">
						<form action="product_add.php" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">标题</label>
										<input type="text" class="form-control" name="title">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">简介</label>
										<input type="text" class="form-control" name="intro">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">分类</label>
										<input type="text" class="form-control" name="classify">
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>内容</label>
										<div class="form-group bmd-form-group">
											<textarea class="form-control" rows="5" name="content"></textarea>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">添加文章</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php
	require 'footer.php';
?>