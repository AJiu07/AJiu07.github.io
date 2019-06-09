<?php
require 'forbid.php';
require 'header.php';
require '../php/pdo.php';

$sql = "SELECT id,name,email,content,registration FROM lword";
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
              <div class="col-12">
                <h4 class="card-title ">所有留言</h4>
                <p class="card-category"> 所有留言列表</p>
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
                    用户
                  </th>
                  <th>
                    邮箱
                  </th>
                  <th>
                    留言内容
                  </th>
                  <th>
                    留言时间
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
                      <?php echo $k['content']; ?>
                    </td>
                    <td>
                      <?php echo $k['registration']; ?>
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