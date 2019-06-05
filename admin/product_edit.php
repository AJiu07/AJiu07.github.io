<?php
require 'forbid.php';
require 'header.php';
?>
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">添加商品</h4>
						<p class="card-category">添加一个商品</p>
					</div>
					<div class="card-body">
						<form>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">商品名称</label>
										<input type="text" value="Macbook Pro" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">商品单价</label>
										<input type="number" value="13500.00" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">商品库存</label>
										<input type="number" value="99" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">商品编号</label>
										<input type="text" value="2019283745732821" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>商品描述</label>
										<div class="form-group bmd-form-group">
											<textarea id="description" class="form-control" rows="5">苹果笔记本电脑</textarea>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">修改商品</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
			require 'footer.php';
		?>