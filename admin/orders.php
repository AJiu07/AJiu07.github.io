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
              <div class="col-12">
                <h4 class="card-title ">所有订单</h4>
                <p class="card-category"> 所有订单列表</p>
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
                    下单用户
                  </th>
                  <th>
                    订单价格
                  </th>
                  <th>
                    下单时间
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      zhangsan
                    </td>
                    <td>
                      20000.00
                    </td>
                    <td>
                      2019-01-02 20:00:00
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