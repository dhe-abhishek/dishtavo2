<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3><?php echo $pageTitle ?></h3>
    </div>


  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo $subMenu ?> <small>All Courses</small></h2>
       
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <?php
              if (isset($successMsg) && $successMsg) {
              ?>
                <div class="alert alert-success" role="alert">
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  <span class="sr-only">Success:</span> <?php echo $successMsg; ?>
                </div>
              <?php
              }

              if (isset($errorMsg) && $errorMsg) {
              ?>
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  <span class="sr-only">Success:</span> <?php echo $errorMsg; ?>
                </div>
              <?php
              }

              $session = session();
              if ($session->has('success')) {
                echo '<div class="alert alert-success">' . $session->getFlashdata('success') . '</div>';
              }
              ?>

              <!--<p class="text-muted font-13 m-b-30">
                          DataTables has most features enabled by default, so all you need to do to use it with your own
                          tables is to call the construction function: <code>$().DataTable();</code>-->
              </p>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Course Name</th>
                    <th>Semester</th>
                    <th>objectives</th>
                    <th>Subject</th>
                    <th>Course Code</th>
                    <th>Action</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                  $cnt = 1;
                  foreach ($programmecourses as $eachprogramCourse) {
                  ?>
                    <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><?php echo $eachprogramCourse['name'];
                          ?></td>
                      <td><?php echo $eachprogramCourse['semester']; ?></td>
                      <td><?php echo $eachprogramCourse['objectives']; ?></td>
                      <td><?php echo $eachprogramCourse['subject_name'];
                          ?></td>
                      <td><?php echo $eachprogramCourse['code']; ?></td>
                      <td>
                        <form method="post" action="<?= base_url('dish2o_admin/template') ?>" style="float:left;">
                          <input type="hidden" name="programmecourse_id" id="programmecourse_id" value="<?php echo $eachprogramCourse['id']; ?>" />
                          <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Template" data-original-title="Tooltip top">T</button>
                        </form>

                        <form method="get" action="<?= base_url('dish2o_admin/Programmecourse/quaddata') ?>" style="float:left;">
                          <input type="hidden" name="programmecourse_id" id="programmecourse_id" value="<?php echo $eachprogramCourse['id']; ?>" />
                          <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Quad-Data" data-original-title="Tooltip top">Q</button>
                        </form>
                        <form method="post" action="<?= base_url('dish2o_admin/courses/edit') ?>" style="float:left;">
                          <input type="hidden" name="programmecourse_id" id="programmecourse_id" value="<?php echo $eachprogramCourse['id']; ?>" />
                          <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="UAE" data-original-title="Tooltip top">U</button>
                        </form>
                        <form method="post" action="<?= base_url('dish2o_admin/courses/edit') ?>">
                          <input type="hidden" name="programmecourse_id" id="programmecourse_id" value="<?php echo $eachprogramCourse['id']; ?>" />
                          <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Vetter Remarks" data-original-title="Tooltip top">V</button>
                        </form>
                      </td>
                    </tr>
                  <?php
                    $cnt++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>