<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3><?php echo $pageTitle ?></h3>
    </div>

    <!--<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>-->
  </div>
  <div class="clearfix"></div>

  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table class="table table-striped table-bordered" style="width:100%">
                <tr>
                  <td><?php echo '<b>Subject:</b> ' . $courseDetails['subject_name']; ?></td>
                  <td><?php echo '<b>Code:</b> ' . $courseDetails['code']; ?></td>
                  <td><?php echo '<b>Course name:</b> ' . $courseDetails['name']; ?></td>
                  <td><?php echo '<b>Semester:</b>' . $courseDetails['semester']; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>All units</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><button type="button" class="btn btn-success unitmodal" data-toggle="modal" data-target=".addunitmodal" data-courseid="<?php echo $courseDetails['id']; ?>">Add Unit</button></li>
        </ul>
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
                    <th data-orderable="false">Action</th>
                    <th>Position</th>
                    <th>Unit Name</th>
                    <th>Modules</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                  $cnt = 1;
                  foreach ($template as $unit) {
                  ?>
                    <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><button class="btn btn-success" onclick="deleteUnit(<?php echo $unit['id'] ?>)"><i class="fa fa-trash"></i></button></td>
                      <td><?php echo $unit['position']; ?></td>
                      <td><?php echo $unit['name']; ?></td>
                      <td>
                        <div class="col-md-12 col-sm-12 ">
                          <div class="x_panel">
                            <div class="x_title">
                              <?php echo "There are <b>" . $unit['modules_count'] . "</b> module(s) under this unit."; ?>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><button type="button" class="btn btn-success modulemodal" data-toggle="modal" data-target=".addModule" data-unitid="<?php echo $unit['id']; ?>">Add Module</button></li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <?php if ($unit['modules']) { ?>
                                <table class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>Sr. No.</th>
                                      <th data-orderable="false">Action</th>
                                      <th>Position</th>
                                      <th>Module Name</th>
                                      <th>Videos</th>
                                    </tr>
                                  </thead>
                                  <?php
                                  $moduleCount = 1;
                                  foreach ($unit['modules'] as $eachModule) {
                                  ?>

                                    <tbody>
                                      <tr>
                                        <td><?php echo $moduleCount; ?></td>
                                        <td><button class="btn btn-success" onclick="deleteModule(<?php echo $eachModule['id'] ?>)"><i class="fa fa-trash"></i></button></td>
                                        <td><?php echo $eachModule['position']; ?></td>
                                        <td><?php echo $eachModule['name']; ?></td>
                                        <td>
                                          <?php if ($eachModule['videos']) { ?>
                                            <table class="table table-striped table-bordered" style="width:100%">
                                              <thead>
                                                <tr>
                                                  <th>Sr. No.</th>
                                                  <th data-orderable="false">Action</th>
                                                  <th>Language</th>
                                                  <th>URL</th>
                                                  <th>Faculty</th>
                                                  <th>Recording Status</th>
                                                  <th>Editing Status</th>
                                                  <th>Vetting Status</th>
                                                </tr>
                                              </thead>
                                              <?php
                                              $videoCount = 1;
                                              foreach ($eachModule['videos'] as $eachVideo) {
                                                $recordingStatus = ($eachVideo['recording_status'] == 1) ? "<b>Date: </b>" . $eachVideo['recording_date'] . '<BR/><b>Studio: </b>' . $eachVideo['studio_name'] . '<BR/><b>Status: </b>Done' : 'Pending';
                                                $editingStatus = ($eachVideo['editor_status'] == 1) ? "<b>Date: </b>" . $eachVideo['editor_fname'] . ' ' . $eachVideo['editor_lname'] . '<BR/><b>Remarks: </b>' . $eachVideo['editor_remark'] . '<BR/><b>Status: </b>' . $eachVideo['editor_status'] : 'Pending';
                                                $vettingStatus = ($eachVideo['vetting_status'] == 1) ? "<b>Date: </b>" . $eachVideo['vetter_lname'] . ' ' . $eachVideo['vetter_lname'] . '<BR/><b>Remarks: </b>' . $eachVideo['vet_remarks'] . '<BR/><b>Status: </b>' . $eachVideo['vetting_status'] : 'Pending';
                                              ?>

                                                <tbody>
                                                  <tr>
                                                    <td><?php echo $videoCount; ?></td>
                                                    <td><button class="btn btn-success"><i class="fa fa-trash"></i></button></td>
                                                    <td><?php echo $eachVideo['language_code']; ?></td>
                                                    <td><?php echo $eachVideo['video_url']; ?></td>
                                                    <td><?php echo $eachVideo['firstname'] . ' ' . $eachVideo['lastname']; ?></td>
                                                    <td><?php echo $recordingStatus; ?></td>
                                                    <td><?php echo $editingStatus; ?></td>
                                                    <td><?php echo $vettingStatus; ?></td>
                                                  </tr>
                                                </tbody>


                                              <?php
                                                $videoCount++;
                                              }
                                              ?>
                                            </table>

                                          <?php } else {
                                            echo "<span>Videos not found!<span>";
                                          }
                                          ?>
                                          <button type="button" class="btn btn-success videomodal" data-toggle="modal" data-target=".addVideo" data-moduleid="<?php echo $eachModule['id']; ?>">Add Video</button>
                                        </td>
                                      </tr>
                                    </tbody>


                                  <?php
                                    $moduleCount++;
                                  }
                                  ?>
                                </table>
                              <?php } else {
                                echo "<span>Modules not found!<span>";
                              } ?>

                              <!--END MODULE TD-->
                            </div>
                          </div>
                        </div>
                      </td>
                      <!--<td><form method="post" action="<? //= base_url('dish2o_admin/colleges/edit') 
                                                          ?>"> <input type="hidden" name="college_id" id="college_id" value="<?php //echo $unit['id']; 
                                                                                                                              ?>"/><button class="btn btn-success" type="submit">Edit</button></form></td>-->
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

<!-- Add unit modal -->


<div class="modal fade addunitmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Unit</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="unitform" data-parsley-validate class="form-horizontal form-label-left" method="post" >
      <div class="modal-body">
        
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Unit position </label>
            <div class="col-md-6 col-sm-6 ">
              <input id="position" class="form-control" type="number" name="position" min="0">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="unit_id">Select existing unit
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select name="unit_id" id="unit_id" class="form-control ">
                <option value="">Select Unit</option>
                <?php
                foreach($units as $eachUnit){
                  ?>
                    <option value="<?php echo $eachUnit['id'] ?>"><?php echo $eachUnit['name'] ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" >OR
            </label>

          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Enter new unit name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="unitname" name="unitname" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Learning objective <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea type="text" id="learning_objective" name="learning_objective" class="form-control "></textarea>
            </div>
          </div>
          <input type="text" id="course_id" name="course_id" value="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Save changes</button>
      </div>
    </form>

    </div>
  </div>
</div>
<!-- END Add unit modal -->

<!-- Add Module modal -->


<div class="modal fade addModule" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Module</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Module position </label>
            <div class="col-md-6 col-sm-6 ">
              <input id="position" class="form-control" type="number" name="position" min="0">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select existing modules
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="modulename" name="modulename" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">OR
            </label>

          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Enter new Module name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="modulename" name="modulename" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Learning Outcomes <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea type="text" id="learning_objective" name="learning_objective" class="form-control "></textarea>
            </div>
          </div>
          <input type="text" id="unit_id" name="unit_id" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>

    </div>
  </div>
</div>
<!-- END Add module modal -->

<!-- Add Module modal -->


<div class="modal fade addVideo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Video</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/colleges/save') ?>">
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Lanaguage </label>
            <div class="col-md-6 col-sm-6 ">
              <input id="position" class="form-control" type="number" name="position" min="0">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="modulename" name="modulename" class="form-control ">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">URL <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="modulename" name="modulename" class="form-control ">
            </div>
          </div>
          <input type="text" id="module_id" name="module_id" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>

    </div>
  </div>
</div>
<!-- END Add module modal -->
<script>
  $(document).ready(function() {

    $(".unitmodal").click(function() { // Click to only happen on announce links
      $("#course_id").val($(this).data('courseid'));
      // $('#createFormId').modal('show');
    });

    $(".modulemodal").click(function() { // Click to only happen on announce links
      $("#unit_id").val($(this).data('unitid'));
      // $('#createFormId').modal('show');
    });

    $(".videomodal").click(function() { // Click to only happen on announce links
      $("#module_id").val($(this).data('moduleid'));
      // $('#createFormId').modal('show');
    });

  });

  $("#unitform").submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    $.ajax({
      url: basePath+"/template/saveUnit",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
      }
    });
  });

  function deleteUnit(unitId) {
    
      var fd = new FormData();    
      fd.append('unitId',  unitId);
      
      $.ajax({
      url: basePath+"/template/deleteUnit",
      type: "POST",
      data: fd,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
      }
    });

  }



  
</script>