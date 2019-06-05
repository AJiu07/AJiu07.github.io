<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';

$sql = "SELECT id,name,email,tel,registration FROM user";
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
                <h4 class="card-title ">所有用户</h4>
                <p class="card-category"> 用户列表</p>
              </div>
              <div class="col-2">
                <a href="user_add.php" class="btn btn-round btn-info" style="margin-left: 20px;">添加用户</a>
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
                    用户名
                  </th>
                  <th>
                    邮箱
                  </th>
                  <th>
                    联系电话
                  </th>
                  <th>
                    注册时间
                  </th>
                  <th>
                    操作
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($row as $k): ?>
                  <tr>
                    <td>
                      <?php echo $k['id']; ?>
                    </td>
                    <td>
                      <?php echo $k['name']; ?>
                    </td>
                    <td>
                      <?php echo $k['email']; ?>
                    </td>
                    <td>
                      <?php echo $k['tel']; ?>
                    </td>
                    <td>
                      <?php echo $k['registration']; ?>
                    </td>
                    <td>
                      <a href="user_edit.php?id=<?php echo $k['id']; ?>">编辑</a>
                      |
                      <a href="user_del.php?id=<?php echo $k['id']; ?>">删除</a>
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