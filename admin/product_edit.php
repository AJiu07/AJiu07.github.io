<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';

$id = intval($_GET['id']);

$sql = "SELECT id,title,intro,classify,content FROM blog
		WHERE id = '$id'";
$res = $pdo->query($sql);
$row = $res->fetchAll(PDO::FETCH_BOTH);

if(!empty($_POST['title'])){
	$title 	  = htmlentities($_POST['title']);
	$intro    = htmlentities($_POST['intro']);
	$classify = htmlentities($_POST['classify']);
	$content  = htmlentities($_POST['content']);

	$sql = "UPDATE blog SET title = '$title',intro = '$intro',classify = '$classify',content = '$content'
			WHERE id = '$id'";
	$res = $pdo->exec($sql);

	if($res){
		echo "<script>alert('修改成功');location.href = 'products.php'</script>";
	}else {
		echo "<script>alert('修改失败')</script>";
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
						<h4 class="card-title">编辑</h4>
						<p class="card-category">修改一篇文章</p>
					</div>
					<div class="card-body">
						<form action="product_edit.php?id=<?php echo $id; ?>" method="post">
							<?php foreach ($row as $k): ?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">标题</label>
										<input type="text" name="title" value="<?php echo $k['title'] ?>" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">简介</label>
										<input type="text" name="intro" value="<?php echo $k['intro'] ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">分类</label>
										<input type="text" name="classify" value="<?php echo $k['classify'] ?>" class="form-control">
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>内容</label>
										<div class="form-group bmd-form-group">
											<textarea id="description" name="content" class="form-control" rows="5"><?php echo $k['content'] ?></textarea>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">修改文章</button>
							<div class="clearfix"></div>
						<?php endforeach; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
			require 'footer.php';
		?>