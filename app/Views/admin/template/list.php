<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
  .ui-autocomplete {
    background-color: #fff;
    /* Adjust as needed */
    border: 1px solid #ccc;
    /* Adjust as needed */
    border-radius: 5px;
    /* Adjust as needed */
    padding: 5px;
    /* Adjust as needed */
    font-family: Arial, sans-serif;
    /* Adjust as needed */
  }

  .ui-autocomplete .ui-menu-item {
    cursor: pointer;
    /* Make items clickable */
  }

  .ui-autocomplete .ui-menu-item:hover {
    background-color: #ddd;
    /* Highlight effect on hover */
  }
</style>
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
                  <td><?php echo '<b>Semester:</b> ' . $courseDetails['semester']; ?></td>
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
                                                $recordingStatus = ($eachVideo['recording_status'] == 1) ? "<b>Date: </b>" . $eachVideo['recording_date'] . '<BR/><b>Studio: </b>' . $eachVideo['studio_name'] . '<BR/><b>Status: </b>Done' : '<button type="button" class="btn btn-success recording" data-toggle="modal" data-target=".recordingmodal" data-videoid="' . $eachVideo['video_id'] . '" data-recordingscheduleid="' . $eachVideo['recording_schedule_id'] . '"><i class="fa fa-plus"></i></button>';

                                                $editingStatus = ($eachVideo['editor_status'] != 'Not Alloted' && $eachVideo['editor_status'] != '') ? "<b>Date: </b>" . $eachVideo['editor_fname'] . ' ' . $eachVideo['editor_lname'] . '<BR/><b>Remarks: </b>' . $eachVideo['editor_remark'] . '<BR/><b>Status: </b>' . $eachVideo['editor_status'] : '<button type="button" class="btn btn-success editing" data-toggle="modal" data-target=".editingmodal" data-videoid="' . $eachVideo['video_id'] . '" data-editingscheduleid="' . $eachVideo['editing_schedule_id'] . '"><i class="fa fa-plus"></i></button>';

                                                $vettingStatus = ($eachVideo['vetting_status']) ? "<b>Date: </b>" . $eachVideo['vetter_fname'] . ' ' . $eachVideo['vetter_lname'] . '<BR/><b>Remarks: </b>' . $eachVideo['vet_remarks'] . '<BR/><b>Status: </b>' . $eachVideo['vetting_status'] : '<button type="button" class="btn btn-success vetting" data-toggle="modal" data-target=".vettingmodal" data-videoid="' . $eachVideo['video_id'] . '" data-vettingScheduleid="' . $eachVideo['vetting_schedule_id'] . '"><i class="fa fa-plus"></i></button>';
                                              ?>

                                                <tbody>
                                                  <tr id="videorow_<?php echo $eachVideo['id'] ?>">
                                                    <td><?php echo $videoCount; ?></td>
                                                    <td><button class="btn btn-success" onclick="deleteVideo(<?php echo $eachVideo['id'] ?>)"><i class="fa fa-trash"></i></button></td>
                                                    <td><?php echo $eachVideo['language_code']; ?></td>
                                                    <td><?php echo $eachVideo['video_url']; ?></td>
                                                    <td>
                                                      <?php echo $eachVideo['firstname'] . ' ' . $eachVideo['lastname']; ?>
                                                      <?php if ($eachVideo['video_coordinator_id']) { ?>
                                                        <button type="button" class="btn btn-success videocoord" data-toggle="modal" data-target=".videocoordmodal" data-videoid="<?php echo $eachVideo['video_id']; ?>" data-videocordid="<?php echo $eachVideo['video_coordinator_id']; ?>"><i class="fa fa-edit"></i></button>
                                                      <?php } else {
                                                      ?>
                                                        <button type="button" class="btn btn-success videocoord" data-toggle="modal" data-target=".videocoordmodal" data-videoid="<?php echo $eachVideo['video_id']; ?>" data-videocordid="<?php echo $eachVideo['video_coordinator_id']; ?>"><i class="fa fa-plus"></i></button>
                                                      <?php
                                                      } ?>
                                                    </td>
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
                        <input id="form1_unit_position" class="form-control" type="number" name="form1_unit_position" min="1" required>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="unit_id">Select existing unit <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <?php
                        /*
                        <select name="form1_unit_id" id="form1_unit_id" class="form-control ">
                          <option value="">Select Unit</option>
                          <?php
                          foreach ($units as $eachUnit) {
                          ?>
                            <option value="<?php echo $eachUnit['id'] ?>"><?php echo $eachUnit['name'] ?></option>
                          <?php
                          }
                          ?>
                        </select>*/
                        ?>
                        <input type="text" id="search_unit" placeholder="Type to search..." class="form-control ">
                        <div id="unit_suggestion"></div>
                        <input type="text" name="form1_unit_id" id="form1_unit_id">
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
                        <input id="form2_unit_position" class="form-control" type="number" name="form2_unit_position" min="1" required>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Enter new unit name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="form2_unitname" name="form2_unitname" class="form-control " required>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Learning objective
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
                          <input id="form1_module_position" class="form-control" type="number" name="form1_module_position" min="1" required>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select existing modules<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <?php /*
                          <select name="module_id" id="module_id" class="form-control ">
                            <option value="">Select Module</option>
                            <?php
                            foreach ($modules as $eachModule) {
                            ?>
                              <option value="<?php echo $eachModule['id'] ?>"><?php echo $eachModule['name'] ?></option>
                            <?php
                            }
                            ?>
                          </select> */ ?>
                          <input type="text" id="search_module" placeholder="Type to search..." class="form-control ">
                          <div id="module_suggestion"></div>
                          <input type="text" name="module_id" id="module_id">
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
                          <input id="form2_module_position" class="form-control" type="number" name="form2_module_position" min="1" required>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="modulename">Enter new module name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="modulename" name="modulename" class="form-control " required>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="learning_outcomes">Learning Outcomes 
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

                        <?php /*<select name="video_id" id="video_id" class="form-control ">
                          <option value="">Select Video</option>
                          <?php
                          foreach ($videos as $eachVideo) {
                          ?>
                            <option value="<?php echo $eachVideo['id'] ?>"><?php echo $eachVideo['name'] . '(' . $eachVideo['video_url'] . ')' ?></option>
                          <?php
                          }
                          ?>
                        </select>*/ ?>
                        <input type="text" id="search_video" placeholder="Type to search..." class="form-control " required>
                        <div id="video_suggestion"></div>
                        <input type="text" name="video_id" id="video_id">
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

                        <select name="language_id" id="language_id" class="form-control "  required>
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
                        <input type="text" id="videoname" name="videoname" class="form-control " required>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="videourl">URL <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="videourl" name="videourl" class="form-control "  required>
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

<!-- Add module coordinator  -->
<!--
<div class="modal fade modulecoordmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Teacher for a Module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group" id="div_ext_vid" style="display:none">
          <label><b>Select Medium of Instruction</b></label>
          <select id="sel_moi" style="width:100%;">
            <option value="KN" selected=selected>Konkani</option>
            <option value="MR">Marathi</option>
            <option value="HN">Hindi</option>
            <option value="EN">English</option>
          </select>

          <input type="hidden" class="form-control" id="inp_is_main" name="inp_is_main">

        </div>

        <label><b>Select Faculty Name</b></label>
        <br>
        <select id="sel_teacher" style="width:100%;"></select>
        <div class="form-group">

          <input type="hidden" class="form-control" id="inp_teacher_id" name="inp_teacher_id" readonly>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Email</label>
          <input type="email" class="form-control" id="inp_teacher_email" name="inp_email" readonly>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Mobile</label>
          <input type="text" class="form-control" id="inp_teacher_mobile" name="inp_mobile" readonly>
        </div>
        <div class="form-group" id="div_tenuredetails" style="width:100%;">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btn_update_teacher_details" class="btn btn-primary btn_teacher_details_update">Save Changes</button>
        </div>
      </div>
    </div>

  </div>
</div>-->
<!-- END Add module coordinator modal -->

<!-- Add video coordinator  -->
<div class="modal fade videocoordmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="videoCoordModalLabel">Assign Faculty To Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="videocordform" data-parsley-validate class="form-horizontal form-label-left" method="post">
          
          <div class="form-group">
            <label><b>Select Faculty Name</b></label>

            <input type="text" id="search_video_faculty" placeholder="Type to search..." class="form-control " required>
            <div id="video_faculty_suggestion"></div>
            <input type="text" name="video_faculty_id" id="video_faculty_id">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Email</label>
            <input type="email" class="form-control" id="video_faculty_email" name="video_faculty_email" readonly>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Mobile</label>
            <input type="text" class="form-control" id="video_faculty_mobile" name="video_faculty_mobile" readonly>
          </div>
          <div class="form-group" id="div_tenuredetails" style="width:100%;">
          </div>

          <div class="modal-footer">
            <input type="text" name="selected_video_id" id="selected_video_id">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="btn_update_teacher_details" class="btn btn-primary btn_teacher_details_update">Save Changes</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- END Add video coordinator modal -->

<!-- Add recording schedule modal -->
<div class="modal fade recordingmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Recording Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <form id="recordingform" data-parsley-validate class="form-horizontal form-label-left" method="post">
        <div class="form-group">
          <label for="recording_date">Recording Date</label>
          <input type="datetime-local" class="form-control" id="recording_date" name="recording_date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Studio Assigned</label>
          <select class="form-control" name="recording_studio_id" id="recording_studio_id">
          <option value="">Select Studio</option>
                          <?php
                          foreach ($studios as $eachStudio) {
                          ?>
                            <option value="<?php echo $eachStudio['id'] ?>"><?php echo $eachStudio['studio_name'] ?></option>
                          <?php
                          }
                          ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Recording Status</label>
          <select class="custom-select" id="recording_status" name="recording_status">
            <option value="0">Not Completed</option>
            <option value="1">Completed</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Remarks</label>
          <input type="text" class="form-control" id="recording_remarks" name="recording_remarks">
        </div>

        <div class="modal-footer">
          <input type="text" name="recording_video_id" id="recording_video_id">
          <input type="text" name="recording_schedule_id" id="recording_schedule_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="btn_update_rec_sch" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- END Add recording modal -->

<!-- Add editing  modal -->
<div class="modal fade editingmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign& Update Editing Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="editingform" data-parsley-validate class="form-horizontal form-label-left" method="post">
        
        <div class="form-group">
          <label for="editor_id">Editor Name</label>
          <select class="custom-select" id="editor_id" name="editor_id" required>
            <option value="">Select Editor</option>
            <?php
            foreach ($editors as $eachEditor) {
            ?>
              <option value="<?php echo $eachEditor['id'] ?>"><?php echo $eachEditor['name'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="editing_date">Allocation Date</label>
          <input type="date" class="form-control" id="editing_date" name="editing_date">
        </div>
        <div class="form-group">
          <label for="editing_status">Status</label>
          <select class="custom-select" name="editing_status" id="editing_status" onchange="if(this.value == 'Completed') $('#hidden_div').show(); else $('#hidden_div').hide();">
            <option>Not Alloted</option>
            <option>Alloted</option>
            <option>Work in Progress</option>
            <option>Completed</option>
            <option>Rejected</option>
          </select>
        </div>
        <div class="form-group">
          <div id="hidden_div" style="display:none;">
            <label for="editing_cmpl_date">Completion Date</label>
            <input type="date" class="form-control" id="editing_cmpl_date" name="editing_cmpl_date">
          </div>
        </div>
        <div class="form-group">
          <label for="editing_remarks">Remarks</label>
          <input type="text" class="form-control" id="editing_remarks" name="editing_remarks">
        </div>


        <div class="modal-footer">
          <input type="text" name="editing_video_id" id="editing_video_id">
          <input type="text" name="editing_schedule_id" id="editing_schedule_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="btn_update_editing_sch" class="btn btn-primary">Save Changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Add editing modal -->
<!-- Add vetting modal -->
<div class="modal fade vettingmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign & Update Vetting Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="vettingform" data-parsley-validate class="form-horizontal form-label-left" method="post">
        <div class="form-group">
            <label><b>Select Vetter's Name</b></label>

            <input type="text" id="search_vetter_faculty" placeholder="Type to search..." class="form-control ">
            <div id="vetter_faculty_suggestion"></div>
            <input type="text" name="vetter_faculty_id" id="vetter_faculty_id">
        </div>
         <div class="form-group">
            <label for="exampleFormControlTextarea1">Email</label>
            <input type="email" class="form-control" id="vetter_faculty_email" name="vetter_faculty_email" readonly>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Mobile</label>
            <input type="text" class="form-control" id="vetter_faculty_mobile" name="vetter_faculty_mobile" readonly>
          </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Vetting Allocation Date</label>
          <input type="date" class="form-control" id="vetting_date" name="vetting_date">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Vetting Status</label>
          <select class="custom-select" name="vetting_status" id="vetting_status" onchange="if(this.value == 'Completed'){ $('#vetting_cmpl_date_div').show(); $('#vetting_action_div').show(); }else{ $('#vetting_cmpl_date_div').hide();$('#vetting_action_div').hide();}">
            <option >Not Alloted</option>
            <option >Alloted</option>
            <option >Completed</option>
          </select>
        </div>
        <div class="form-group" id="vetting_cmpl_date_div"  style="display:none;">
          <label for="exampleFormControlTextarea1">Completion Date</label>
          <input type="date" class="form-control" id="vetting_cmpl_date" name="vetting_cmpl_date">
        </div>
        <div class="form-group" id="vetting_action_div"  style="display:none;">
            <label for="vet_action">Select Vetting Action</label>
            <select class="custom-select" name="vetting_action" id="vetting_action">
              <option value="">Select the Vetting Action</option>
              <option >To be Uploaded</option>
              <option >Re-recording</option>
              <option >Re-editing</option>
            </select>
        </div>
        <div class="form-group">
          <label for="vetting_url">Vetting URL(Embedded)</label>
          <input type="text" class="form-control" id="vetting_url" name="vetting_url">
        </div>
        <div class="form-group">
          <label for="vetting_remarks">Remarks</label>
          <input type="text" class="form-control" id="vetting_remarks" name="vetting_remarks">
        </div>

        <div class="modal-footer">
          <input type="text" name="vetting_video_id" id="vetting_video_id">
          <input type="text" name="vetting_schedule_id" id="vetting_schedule_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="btn_update_vetting_sch" class="btn btn-primary">Save Changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Add vetting modal -->

<script>
  $(document).ready(function() {
    $("#search_video").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: basePath + "/template/getVideoSuggestion",
          data: {
            query: request.term,
            module_id: $('#form1_selected_programme_course_unit_module_id').val()
          },
          dataType: "json",
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        var selectedId = ui.item.id; // Get the ID

        // Perform actions based on the selected ID
        console.log("Selected ID:", selectedId);
        $('#video_id').val(selectedId);
      },
      appendTo: "#video_suggestion"
    });

    $("#search_unit").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: basePath + "/template/getUnitSuggestion",
          data: {
            query: request.term
          },
          dataType: "json",
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        var selectedId = ui.item.id; // Get the ID

        // Perform actions based on the selected ID
        console.log("Selected ID:", selectedId);
        $('#form1_unit_id').val(selectedId);
      },
      appendTo: "#unit_suggestion"
    });

    $("#search_module").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: basePath + "/template/getModuleSuggestion",
          data: {
            query: request.term
          },
          dataType: "json",
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        var selectedId = ui.item.id; // Get the ID

        // Perform actions based on the selected ID
        console.log("Selected ID:", selectedId);
        $('#module_id').val(selectedId);
      },
      appendTo: "#module_suggestion"
    });

    $("#search_video_faculty").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: basePath + "/template/getfalcultySuggestion",
          data: {
            query: request.term
          },
          dataType: "json",
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        var selectedId = ui.item.id; // Get the ID

        // Perform actions based on the selected ID
        console.log("Selected ID:", selectedId);
        $('#video_faculty_id').val(selectedId);
        $('#video_faculty_email').val(ui.item.email);
        $('#video_faculty_mobile').val(ui.item.mobile);
      },
      appendTo: "#video_faculty_suggestion"
    });

    $("#search_vetter_faculty").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: basePath + "/template/getfalcultySuggestion",
          data: {
            query: request.term
          },
          dataType: "json",
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        var selectedId = ui.item.id; // Get the ID

        // Perform actions based on the selected ID
        console.log("Selected ID:", selectedId);
        $('#vetter_faculty_id').val(selectedId);
        $('#vetter_faculty_email').val(ui.item.email);
        $('#vetter_faculty_mobile').val(ui.item.mobile);
      },
      appendTo: "#vetter_faculty_suggestion"
    });
  });

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

    $(".videocoord").click(function() {
      //for edit

      //change the lable of the modal box
      $('#videoCoordModalLabel').html('Assign Faculty To Video');

      $('#search_video_faculty').val('');
      $('#video_faculty_id').val('');
      $('#video_faculty_email').val('');
      $('#video_faculty_mobile').val('');

      let videoCordId = $(this).data('videocordid');
      $("#video_coordinator_id").val(videoCordId);
      $("#selected_video_id").val($(this).data('videoid'));
      console.log(videoCordId);
      //get faculty details in case of edit
      var formData = new FormData();
      formData.append('video_coordinator_id', videoCordId);

      if(videoCordId){

        $('#videoCoordModalLabel').html('Update Faculty Assigned To Video');

          $.ajax({
          url: basePath + "/template/getVideoCoordinatorDetails",
          type: "POST",
          data: formData,
          contentType: false, // Important for FormData
          processData: false, // Important for FormData
          success: function(response) {
            // Handle successful response
            let facultyDetails =JSON.parse(response);
            $('#search_video_faculty').val(facultyDetails.name);
            $('#video_faculty_id').val(facultyDetails.id);
            $('#video_faculty_email').val(facultyDetails.email);
            $('#video_faculty_mobile').val(facultyDetails.mobile);

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
      }

    });

    $(".videomodal").click(function() { // Click to only happen on announce links
      $("#form1_selected_programme_course_unit_module_id").val($(this).data('moduleid'));
      $("#form2_selected_programme_course_unit_module_id").val($(this).data('moduleid'));
      // $('#createFormId').modal('show');

      //get missing language videos

      /*var formData = new FormData();
      formData.append('programme_course_unit_module_id', $(this).data('moduleid'));

      $.ajax({
        url: basePath + "/template/getNonAddedLanguageVideos",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          $('#video_id').html(response);

        },
        error: function(xhr, status, error) {

        }
      });*/

      //get pending languages list

      var formData = new FormData();
      formData.append('programme_course_unit_module_id', $(this).data('moduleid'));

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

    $(".recording").click(function() { // Click to only happen on announce links
      $("#recording_video_id").val($(this).data('videoid'));
      $("#recording_schedule_id").val($(this).data('recordingscheduleid'));
    });

    $(".editing").click(function() { // Click to only happen on announce links
      $("#editing_video_id").val($(this).data('videoid'));
      $("#editing_schedule_id").val($(this).data('editingscheduleid'));
    });

    $(".vetting").click(function() { // Click to only happen on announce links
      $("#vetting_video_id").val($(this).data('videoid'));
      $("#vetting_schedule_id").val($(this).data('vettingscheduleid'));
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

    var unitId = $("#form1_unit_id").val();
    if(!unitId){
      
      return false;
    }
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
    var unitPosition = $("#form2_unit_position").val();
    var unitName = $("#form2_unitname").val();
    if(!unitPosition || !unitName){
      
      return false;
    }

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

    var videoId = $("#video_id").val();

    if(!videoId){
      //search_video
      return false;
    }

    var formData = new FormData();
    formData.append('selected_programme_course_unit_module_id', $("#form1_selected_programme_course_unit_module_id").val());
    formData.append('video_id', videoId);

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
       // window.location = window.location;
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

    var langId = $("#language_id").val();
    var videoUrl = $("#videourl").val();
    var videoName = $("#videoname").val();

    

    if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(videoUrl)){
    } else {
      return false;
    }

    if(!langId || !videoUrl || !videoName){
      //search_video
      return false;
    }

    var formData = new FormData();
    formData.append('selected_programme_course_unit_module_id', $("#form1_selected_programme_course_unit_module_id").val());
    formData.append('videoname', $("#videoname").val());
    formData.append('video_url', $("#videourl").val());
    formData.append('language_id', $("#language_id").val());

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

  $("#videocordform").submit(function(e) {

      e.preventDefault(); // Prevent default form submission

      var facultyId = $("#video_faculty_id").val();

      if(!facultyId){
        return false;
      }

      var formData = new FormData();
      formData.append('video_faculty_id', $("#video_faculty_id").val());
      formData.append('selected_video_id', $("#selected_video_id").val());

      $.ajax({
        url: basePath + "/template/updateVideoCoordinator",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          new PNotify({
            title: 'Video coordinator added',
            text: 'Video coordinator added successfully!',
            type: 'success',
            styling: 'bootstrap3'
          });
         // window.location = window.location;
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot save video cordinator, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
  });

  
  $("#recordingform").submit(function(e) {

      e.preventDefault(); // Prevent default form submission

      var formData = new FormData();
      formData.append('recording_schedule_id', $("#recording_schedule_id").val());

      var recordingdate = $("#recording_date").val();

      if(!recordingdate){
        return false;
      }
     // alert(recordingdate);

      formData.append('recording_date', $("#recording_date").val());
      formData.append('recording_studio_id', $("#recording_studio_id").val());
      formData.append('recording_status', $("#recording_status").val());
      formData.append('recording_remarks', $("#recording_remarks").val());
      formData.append('recording_video_id', $("#recording_video_id").val());

      $.ajax({
        url: basePath + "/template/addRecordingSchedule",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          new PNotify({
            title: 'Video coordinator added',
            text: 'Video recording schedule added successfully!',
            type: 'success',
            styling: 'bootstrap3'
          });
         // window.location = window.location;
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot save video cordinator, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
  });

  $("#editingform").submit(function(e) {

      e.preventDefault(); // Prevent default form submission

      var editorId = $("#editor_id").val();
      if(!editorId){
          return false;
      }

      var formData = new FormData();
      formData.append('editing_schedule_id', $("#editing_schedule_id").val());

      formData.append('editor_id', $("#editor_id").val());
      formData.append('editing_date', $("#editing_date").val());
      formData.append('editing_status', $("#editing_status").val());
      formData.append('editing_cmpl_date', $("#editing_cmpl_date").val());
      formData.append('editing_remards', $("#editing_remarks").val());
      formData.append('editing_video_id', $("#editing_video_id").val());

      $.ajax({
        url: basePath + "/template/addEditingSchedule",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          new PNotify({
            title: 'Video coordinator added',
            text: 'Video editor added successfully!',
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
            text: 'Cannot save video cordinator, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
  });

  $("#vettingform").submit(function(e) {

      e.preventDefault(); // Prevent default form submission

      var vettingFacultyId = $("#vetter_faculty_id").val();

      if(!vettingFacultyId){
        return false;
      }

      var formData = new FormData();
      formData.append('vetting_schedule_id', $("#vetting_schedule_id").val());
      formData.append('vetting_video_id', $("#vetting_video_id").val());

      formData.append('vetter_faculty_id', $("#vetter_faculty_id").val());
      formData.append('vetting_date', $("#vetting_date").val());
      formData.append('vetting_status', $("#vetting_status").val());
      formData.append('vetting_cmpl_date', $("#vetting_cmpl_date").val());
      formData.append('vetting_action', $("#vetting_action").val());
      formData.append('vetting_url', $("#vetting_url").val());
      formData.append('vetting_remarks', $("#vetting_remarks").val());

      $.ajax({
        url: basePath + "/template/addVettingSchedule",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          new PNotify({
            title: 'Vetting schedule added',
            text: 'Vetting schedule added successfully!',
            type: 'success',
            styling: 'bootstrap3'
          });
          //window.location = window.location;
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: 'Cannot save vetting schedule, try again later!',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
  });

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