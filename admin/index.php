<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';


$sql = "SELECT id,name,email,created_at,updated_at FROM users";
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
            <h4 class="card-title ">所有管理员</h4>
            <p class="card-category"> 控制台所有管理员列表</p>
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
                    最后登录时间
                  </th>
                  <th>
                    最后登录IP
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
                      <?php echo $k['created_at']; ?>
                    </td>
                    <td>
                      <?php echo $k['updated_at']; ?>
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
