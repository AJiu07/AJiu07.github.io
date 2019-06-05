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
            <div class="row">
              <div class="col-10">
                <h4 class="card-title ">所有文章</h4>
                <p class="card-category"> 所有文章列表</p>
              </div>
              <div class="col-2">
                <a href="product_add.php" class="btn btn-round btn-info" style="margin-left: 20px;">添加文章</a>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    标题
                  </th>
                  <th>
                    简介
                  </th>
                  <th>
                    分类
                  </th>
                  <th>
                    内容
                  </th>
                  <th>
                    图片
                  </th>
                  <th>
                    上传时间
                  </th>
                  <th>
                    编辑
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      2019120201928837
                    </td>
                    <td>
                      Macbook Pro
                    </td>
                    <td>
                      苹果笔记本电脑
                    </td>
                    <td>
                      12
                    </td>
                    <td>
                      13500.00
                    </td>
                    <td>
                      2019-01-02 20:00:00
                    </td>
                    <td>
                      <a href="product_edit.php?id=<?php echo $pro['id'];?>">编辑</a>
                      |
                      <a href="product_del.php?id=<?php echo $pro['id'];?>">删除</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    require 'footer.php';
    ?>