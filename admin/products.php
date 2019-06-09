<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';

$sql = "SELECT id,title,intro,classify,content,registration FROM blog";
$res = $pdo->query($sql);
$row = $res->fetchAll(PDO::FETCH_BOTH);

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
                    上传时间
                  </th>
                  <th>
                    编辑
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($row as $k): ?>
                  <tr>
                    <td>
                      <?php echo $k['id']; ?>
                    </td>
                    <td>
                      <?php echo $k['title']; ?>
                    </td>
                    <td>
                      <?php echo $k['intro']; ?>
                    </td>
                    <td>
                      <?php echo $k['classify']; ?>
                    </td>
                    <td>
                      <?php 
                        if(strlen($k['content'])>=10){
                          echo mb_substr($k['content'],0,6,'UTF-8').'...';
                        }else{
                          echo $k['content'];
                        }
                      ?> 
                    </td>
                    <td>
                      <?php echo $k['registration']; ?>
                    </td>
                    <td>
                      <a href="product_edit.php?id=<?php echo $k['id'];?>">编辑</a>
                      |
                      <a href="product_del.php?id=<?php echo $k['id'];?>">删除</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
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