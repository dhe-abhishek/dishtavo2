<link media="all" rel="stylesheet" type="text/css" href="<?= base_url('public/css/autosuggeststyles.css') ?>" />
<script type="text/javascript" src="<?= base_url('public/js/') ?>jquery.autocomplete.js"></script>

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
          <li><button type="button" class="btn btn-success unitmodal" data-toggle="modal" data-target=".addunitmodal" data-courseid="<?php echo $courseDetails['id']; ?>" data-unitcount="<?php echo count($template) ?>">Add Unit</button></li>
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
                          tables is to call the construction function: <code>$().DataTable();</code>
              </p>-->
              <input type="text" name="unit_count" id="unit_count" value="<?php echo count($template) ?>">
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
                    <tr id="unitrow_<?php echo $unit['id'] ?>">
                      <td><?php echo $cnt; ?></td>
                      <td><button class="btn btn-success" onclick="deleteUnit(<?php echo $unit['id'] ?>)"><i class="fa fa-trash"></i></button></td>
                      <td><input type="number" value="<?php echo $unit['position']; ?>" onChange="updateUnitPosition(<?php echo $unit['id'] ?>, this.value)" class="form-control" /></td>
                      <td><?php echo $unit['name']; ?></td>
                      <td>
                        <div class="col-md-12 col-sm-12 ">
                          <div class="x_panel">
                            <div class="x_title">
                              <?php echo "There are <b>" . $unit['modules_count'] . "</b> module(s) under this unit."; ?>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><button type="button" class="btn btn-success modulemodal" data-toggle="modal" data-target=".addModule" data-unitid="<?php echo $unit['id']; ?>" data-modulecount="<?php echo $unit['modules_count']; ?>">Add Module</button></li>
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
                                      <tr id="modulerow_<?php echo $eachModule['id'] ?>">
                                        <td><?php echo $moduleCount; ?></td>
                                        <td><button class="btn btn-success" onclick="deleteModule(<?php echo $eachModule['id'] ?>)"><i class="fa fa-trash"></i></button></td>
                                        <td><input type="number" value="<?php echo $eachModule['position']; ?>" onChange="updateModulePosition(<?php echo $eachModule['id'] ?>, this.value)" class="form-control" /></td>
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
                                                  <tr id="videorow_<?php echo $eachVideo['id'] ?>">
                                                    <td><?php echo $videoCount; ?></td>
                                                    <td><button class="btn btn-success" onclick="deleteVideo(<?php echo $eachVideo['id'] ?>)"><i class="fa fa-trash"></i></button></td>
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

      <div class="modal-body">
        <!-- start accordion -->
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">

            <div class="x_content">

              <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Add Exiting Unit</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add New Unit</a>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Tab 1 content start -->
                  <form id="existingunitform" class="form-horizontal form-label-left" method="post">
                    <div class="item form-group">
                      <label for="form1_unit_position" class="col-form-label col-md-3 col-sm-3 label-align">Unit position <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="form1_unit_position" class="form-control" type="number" name="form1_unit_position" min="0">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="unit_id">Select existing unit <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="form1_unit_id" id="form1_unit_id" class="form-control ">
                          <option value="">Select Unit</option>
                          <?php
                          foreach ($units as $eachUnit) {
                          ?>
                            <option value="<?php echo $eachUnit['id'] ?>"><?php echo $eachUnit['name'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <!--<div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Learning objective</label>
                      <div class="col-md-6 col-sm-6 ">
                        <textarea type="text" id="learning_objective" name="learning_objective" class="form-control " disabled></textarea>
                      </div>
                    </div>-->

                    <div class="modal-footer">
                      <input type="text" id="form1_course_id" name="form1_course_id">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </form>
                  <!-- Tab 1 content end -->
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <!-- Tab 2 content start -->
                  <form id="newunitform" class="form-horizontal form-label-left" method="post">
                    <div class="item form-group">
                      <label for="unit_position" class="col-form-label col-md-3 col-sm-3 label-align">Unit position <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="form2_unit_position" class="form-control" type="number" name="form2_unit_position" min="0">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Enter new unit name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="form2_unitname" name="form2_unitname" class="form-control ">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Learning objective <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <textarea type="text" id="form2_learning_objective" name="form2_learning_objective" class="form-control "></textarea>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <input type="text" id="form2_course_id" name="form2_course_id">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </form>
                  <!-- Tab 2 content end -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of accordion -->
      </div>
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
        <!-- start accordion -->
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_content">

              <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="existingmodule-tab" data-toggle="tab" href="#existingmodule" role="tab" aria-controls="existingmodule" aria-selected="true">Existing Module</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="newmodule-tab" data-toggle="tab" href="#newmodule" role="tab" aria-controls="newmodule" aria-selected="false">New Module</a>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="existingmodule" role="tabpanel" aria-labelledby="existingmodule-tab">
                  <!-- Tab 1 module content start -->
                  <form id="existingmoduleform" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <div class="modal-body">

                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Module position <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="form1_module_position" class="form-control" type="number" name="form1_module_position" min="0">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select existing modules<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="module_id" id="module_id" class="form-control ">
                            <option value="">Select Module</option>
                            <?php
                            foreach ($modules as $eachModule) {
                            ?>
                              <option value="<?php echo $eachModule['id'] ?>"><?php echo $eachModule['name'] ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <input type="text" id="form1_selected_unit_id" name="form1_selected_unit_id" value="">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </form>
                  <!-- Tab 1 module content end -->
                </div>
                <div class="tab-pane fade" id="newmodule" role="tabpanel" aria-labelledby="newmodule-tab">
                  <!-- Tab 2 module content start -->
                  <form id="newmoduleform" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <div class="modal-body">

                      <div class="item form-group">
                        <label for="form2_module_position" class="col-form-label col-md-3 col-sm-3 label-align">Module position <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="form2_module_position" class="form-control" type="number" name="form2_module_position" min="0">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="modulename">Enter new Module name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="modulename" name="modulename" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="learning_outcomes">Learning Outcomes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea type="text" id="learning_outcomes" name="learning_outcomes" class="form-control "></textarea>
                        </div>
                      </div>


                    </div>
                    <div class="modal-footer">
                      <input type="text" id="form2_selected_unit_id" name="form2_selected_unit_id" value="">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </form>
                  <!-- Tab 2 module content end -->
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END Add module modal -->

<!-- Add Video modal -->
<div class="modal fade addVideo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Video</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">

          <div class="x_content">

            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="existingvideo-tab" data-toggle="tab" href="#existingvideo" role="tab" aria-controls="existingvideo" aria-selected="true">Add Existing Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="newvideo-tab" data-toggle="tab" href="#newvideo" role="tab" aria-controls="newvideo" aria-selected="false">Add New Video</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="existingvideo" role="tabpanel" aria-labelledby="existingvideo-tab">
                <form id="existingvideoform" data-parsley-validate class="form-horizontal form-label-left" method="post">
                  <div class="modal-body">
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select existing video <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="video_id" id="video_id" class="form-control ">
                          <option value="">Select Video</option>
                          <?php
                          foreach ($videos as $eachVideo) {
                          ?>
                            <option value="<?php echo $eachVideo['id'] ?>"><?php echo $eachVideo['name'] . '(' . $eachVideo['video_url'] . ')' ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="text" id="form1_selected_programme_course_unit_module_id" name="form1_selected_programme_course_unit_module_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="newvideo" role="tabpanel" aria-labelledby="newvideo-tab">
                <form id="newvideoform" data-parsley-validate class="form-horizontal form-label-left" method="post">
                  <div class="modal-body">

                    <div class="item form-group">
                      <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Lanaguage </label>
                      <div class="col-md-6 col-sm-6 ">

                        <select name="language_id" id="language_id" class="form-control ">
                          <option value="">Select Language</option>
                          <?php
                          foreach ($languages as $eachLanguage) {
                          ?>
                            <option value="<?php echo $eachLanguage['id'] ?>"><?php echo $eachLanguage['name'] . '(' . $eachLanguage['code'] . ')' ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="videoname">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="videoname" name="videoname" class="form-control ">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="videourl">URL <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="videourl" name="videourl" class="form-control ">
                      </div>
                    </div>
                    <input type="text" id="form2_selected_programme_course_unit_module_id" name="form2_selected_programme_course_unit_module_id" value="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>




    </div>
  </div>
</div>
<!-- END Add video modal -->
<script>
  $(document).ready(function() {

    $(".unitmodal").click(function() { // Click to only happen on announce links
      $("#form1_course_id").val($(this).data('courseid'));
      $("#form2_course_id").val($(this).data('courseid'));

      let unitCount = $(this).data('unitcount');
      $("#form1_unit_position").val(parseInt(unitCount) + 1);
      $("#form2_unit_position").val(parseInt(unitCount) + 1);
      // $('#createFormId').modal('show');
    });

    $(".modulemodal").click(function() { // Click to only happen on announce links
      $("#form1_selected_unit_id").val($(this).data('unitid'));
      $("#form2_selected_unit_id").val($(this).data('unitid'));

      let moduleCount = $(this).data('modulecount');
      $("#form1_module_position").val(parseInt(moduleCount) + 1);
      $("#form2_module_position").val(parseInt(moduleCount) + 1);
      // $('#createFormId').modal('show');
    });

    $(".videomodal").click(function() { // Click to only happen on announce links
      $("#form1_selected_programme_course_unit_module_id").val($(this).data('moduleid'));
      $("#form2_selected_programme_course_unit_module_id").val($(this).data('moduleid'));
      // $('#createFormId').modal('show');

      //get pending languages list

      //get missing language videos

      var formData = new FormData();
      formData.append('programme_course_unit_module_id', $(this).data('moduleid'));

      $.ajax({
        url: basePath + "/template/getNonAddedLanguageVideos",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          $('#video_id').html(response);

        },
        error: function(xhr, status, error) {

        }
      });

      $.ajax({
        url: basePath + "/template/getNonAddedLanguages",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          $('#language_id').html(response);

        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot save unit, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });

    });



  });

  // Initialize autocomplete with local lookup:
  /*$('#unitname').devbridgeAutocomplete({
    lookup: <?php //echo json_encode($unitList); 
            ?>,
    minChars: 1,
    onSelect: function(suggestion) {
      // $('#selection').html('You selected: ' + suggestion.value + ', ' + suggestion.data.id);
      // alert('You selected: ' + suggestion.value + ', ' + suggestion.data.id);
      //set unit fields
      let unitCount = $('#unit_count').val();
      $('#unit_position').val(parseInt(unitCount) + 1);
      $('#unit_id').val(suggestion.data.id);
      $('#learning_objective').val(suggestion.data.learning_objective);
    },
    showNoSuggestionNotice: true,
    noSuggestionNotice: 'Sorry, no matching results',
    groupBy: 'category'
  });*/


  //START Manage Units ---------------------------------------------------------------
  $("#existingunitform").submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    //var formData = new FormData(this);
    var formData = new FormData();
    formData.append('course_id', $("#form1_course_id").val());
    formData.append('unit_id', $("#form1_unit_id").val());
    formData.append('unit_position', $("#form1_unit_position").val());

    $.ajax({
      url: basePath + "/template/saveUnit",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Unit Added',
          text: 'New unit added successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot save unit, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  });

  $("#newunitform").submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    //var formData = new FormData(this);
    var formData = new FormData();
    formData.append('course_id', $("#form2_course_id").val());
    formData.append('unit_position', $("#form2_unit_position").val());
    formData.append('unitname', $("#form2_unitname").val());
    formData.append('learning_objective', $("#form2_learning_objective").val());

    $.ajax({
      url: basePath + "/template/saveUnit",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Unit Added',
          text: 'New unit added successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot save unit, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  });

  function deleteUnit(courseProgUnitId) {

    var result = confirm("Unit, modules and all videos under it will be deleted, Are you sure you want to delete this unit?");
    if (result) {
      var fd = new FormData();
      fd.append('unit_id', courseProgUnitId);

      $.ajax({
        url: basePath + "/template/deleteUnit",
        type: "POST",
        data: fd,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          $('#unitrow_' + courseProgUnitId).remove();

          new PNotify({
            title: 'Unit Deleted',
            text: 'Unit added successfully!',
            type: 'success',
            styling: 'bootstrap3'
          });
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot delete unit, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
    }

  }


  function updateUnitPosition(courseProgUnitId, position) {

    var fd = new FormData();
    fd.append('unit_id', courseProgUnitId);
    fd.append('position', position);

    $.ajax({
      url: basePath + "/template/updateUnitPosition",
      type: "POST",
      data: fd,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Unit position updated',
          text: 'Unit position updated successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot update postion, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  }
  //END Manage Units ---------------------------------------------------------------

  //START Manage Modules ---------------------------------------------------------------
  $("#existingmoduleform").submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    //var formData = new FormData(this);
    var formData = new FormData();
    formData.append('selected_unit_id', $("#form1_selected_unit_id").val());
    formData.append('position', $("#form1_module_position").val());
    formData.append('module_id', $("#module_id").val());

    $.ajax({
      url: basePath + "/template/saveModule",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Module Added',
          text: 'New module added successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot save module, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  });

  $("#newmoduleform").submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    //var formData = new FormData(this);
    var formData = new FormData();
    formData.append('selected_unit_id', $("#form1_selected_unit_id").val());
    formData.append('position', $("#form1_module_position").val());
    formData.append('module_id', $("#module_id").val());
    formData.append('modulename', $("#modulename").val());
    formData.append('learning_outcomes', $("#learning_outcomes").val());

    $.ajax({
      url: basePath + "/template/saveModule",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Module Added',
          text: 'New module added successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot save module, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  });

  function deleteModule(moduleId) {

    var result = confirm("Are you sure you want to delete this module?");
    if (result) {
      var fd = new FormData();
      fd.append('module_id', moduleId);

      $.ajax({
        url: basePath + "/template/deleteModule",
        type: "POST",
        data: fd,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          $('#modulerow_' + moduleId).remove();
          new PNotify({
            title: 'Module Deleted',
            text: 'Module deleted successfully!',
            type: 'success',
            styling: 'bootstrap3'
          });
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot delete module, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
    }


  }


  function updateModulePosition(moduleId, position) {
    var fd = new FormData();
    fd.append('module_id', moduleId);
    fd.append('position', position);

    $.ajax({
      url: basePath + "/template/updateModulePosition",
      type: "POST",
      data: fd,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Module updated',
          text: 'Module position updated successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot update position, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  }
  //END Manage Modules ---------------------------------------------------------------

  //START Manage Videos ---------------------------------------------------------------
  $("#existingvideoform").submit(function(e) {

    e.preventDefault(); // Prevent default form submission

    var formData = new FormData();
    formData.append('selected_programme_course_unit_module_id', $("#form1_selected_programme_course_unit_module_id").val());
    formData.append('video_id', $("#video_id").val());

    $.ajax({
      url: basePath + "/template/saveVideo",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Video Added',
          text: 'Video added successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot save video, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  });

  $("#newvideoform").submit(function(e) {

    e.preventDefault(); // Prevent default form submission

    var formData = new FormData();
    formData.append('selected_programme_course_unit_module_id', $("#form1_selected_programme_course_unit_module_id").val());
    formData.append('videoname', $("#videoname").val());
    formData.append('video_url', $("#videourl").val());

    $.ajax({
      url: basePath + "/template/saveVideo",
      type: "POST",
      data: formData,
      contentType: false, // Important for FormData
      processData: false, // Important for FormData
      success: function(response) {
        // Handle successful response
        console.log(response);
        new PNotify({
          title: 'Video Added',
          text: 'Video added successfully!',
          type: 'success',
          styling: 'bootstrap3'
        });
        window.location = window.location;
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
        new PNotify({
          title: 'Error',
          text: 'Cannot save video, try again later!',
          type: 'error',
          styling: 'bootstrap3'
        });
      }
    });
  });

  function deleteVideo(videoId) {
    var result = confirm("Are you sure you want to delete this video?");
    if (result) {
      var fd = new FormData();
      fd.append('video_id', videoId);

      $.ajax({
        url: basePath + "/template/deleteVideo",
        type: "POST",
        data: fd,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          $('#videorow_' + videoId).remove();
          new PNotify({
            title: 'Video Deleted',
            text: 'Video deleted successfully!',
            type: 'success',
            styling: 'bootstrap3'
          });
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot delete video, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
    }
  }

  /*
    function updateVideoPosition(courseProgVideoId, position) {
      
      var fd = new FormData();    
      fd.append('video_id',  courseProgVideoId);
      fd.append('position',  position);
      
      $.ajax({
        url: basePath+"/template/updateVideoPosition",
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
    }*/

  /*
     $("#videoname").autocomplete({
         source: function(request, response) {
           alert(request.term)
           $.ajax({
             url: basePath+"/template/getVideoSuggestion",
             type: "POST",
             dataType: "json",
             data: {
               search: request.term
             },
             success: function(data) {
               response(data);
             }
           });
         },
         select: function(event, ui) {
           // Do something with the selected suggestion
           // You can access the image URL using ui.item.image
         }
       });
   });
   */

  //END Manage Videos ---------------------------------------------------------------
</script>