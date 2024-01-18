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
              <input type="hidden" name="unit_count" id="unit_count" value="<?php echo count($quadData) ?>">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <!-- <th data-orderable="false">Action</th> -->

                    <th>Unit Name</th>
                    <th>Modules</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                  $cnt = 1;
                  foreach ($quadData as $unit) {
                  ?>
                    <tr id="unitrow_<?php echo $unit['id'] ?>">
                      <td><?php echo $cnt; ?></td>


                      <td><?php echo $unit['name']; ?></td>
                      <td>
                        <div class="col-md-12 col-sm-12 ">
                          <div class="x_panel">
                            <div class="x_title">
                              <?php //echo "There are <b>" . $unit['modules_count'] . "</b> module(s) under this unit."; 
                              ?>
                              <ul class="nav navbar-right panel_toolbox">

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
                                      <th data-orderable="false">Faculty Name</th>
                                      <th>Module Name</th>
                                      <th>Q-II-Notes</th>
                                      <th>Q-II-Transcript</th>
                                      <th>Q-II-Transcript
                                        (Generated)</th>
                                      <th>Q-II-Glossary</th>
                                      <th>Q-III-Self-learning</th>
                                      <th>Q-IV-In Module Assessment</th>
                                    </tr>
                                  </thead>
                                  <?php
                                  $moduleCount = 1;
                                  foreach ($unit['modules'] as $eachModule) {
                                  ?>

                                    <tbody>
                                      <tr id="modulerow_<?php echo $eachModule['id'] ?>">
                                        <td><?php echo $moduleCount; ?></td>
                                        <td id="quad<?php echo $eachModule['umid'] ?>">
                                          <?php
                                          if (isset($eachModule['user_id']) && $eachModule['user_id'] != 0) {
                                            echo $eachModule['salutation'] . " " . $eachModule['firstname'] . " " . $eachModule['lastname'];
                                          ?>
                                            <button class='btn btn-danger' onclick="detachfacultymodule(<?php echo $eachModule['umid'] ?>,<?php echo $eachModule['id'] ?>)"><i class='fa fa-trash'></i></button>
                                          <?php
                                          } else {
                                          ?>
                                            <button class="btn btn-success facultymodal" data-toggle="modal" data-target=".addFaculty" data-moduleid="<?php echo $eachModule['id']; ?>" data-pcumid="<?php echo $eachModule['umid']; ?>"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
                                        </td>

                                        <td><?php echo $eachModule['name']; ?></td>
                                        <td id="notes_<?php echo $eachModule['id'] ?>" style="text-align: center;">
                                          <?php
                                          if (isset($eachModule['notes']) && ($eachModule['notes'] != "")) {
                                            echo  "<a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $eachModule['id'] . "&filename=" . $eachModule['notes'] . "' target='_blank' >Transcript</a>";
                                          } else {
                                          ?>
                                            <button type="button" class="btn btn-success qtranscriptmodal" data-toggle="modal" data-target=".qTranscript" data-module_id="<?php echo $eachModule['id']; ?>" data-type="notes"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
                                        </td>
                                        <td id="transcript_<?php echo $eachModule['id'] ?>" style="text-align: center;">
                                          <?php
                                          if (isset($eachModule['transcript']) && ($eachModule['transcript'] != "")) {
                                            echo  "<a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $eachModule['id'] . "&filename=" . $eachModule['transcript'] . "' target='_blank' >Transcript</a>";
                                          } else {
                                          ?>
                                            <button type="button" class="btn btn-success qtranscriptmodal" data-toggle="modal" data-target=".qTranscript" data-module_id="<?php echo $eachModule['id']; ?>" data-type="transcript"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
                                        </td>
                                        <td id="generated_transcript_<?php echo $eachModule['id'] ?>" style="text-align: center;">
                                          <?php
                                          if (isset($eachModule['generated_transcript']) && ($eachModule['generated_transcript'] != "")) {
                                            echo  "<a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $eachModule['id'] . "&filename=" . $eachModule['generated_transcript'] . "' target='_blank' >Transcript</a>";
                                          } else {
                                          ?>
                                            <button type="button" class="btn btn-success qtranscriptmodal" data-toggle="modal" data-target=".qTranscript" data-module_id="<?php echo $eachModule['id']; ?>" data-type="generated_transcript"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
                                        </td>
                                        <td id="glossary_<?php echo $eachModule['id'] ?>" style="text-align: center;">
                                          <?php
                                          if (isset($eachModule['glossary']) && ($eachModule['glossary'] != "")) {
                                            echo  "<a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $eachModule['id'] . "&filename=" . $eachModule['glossary'] . "' target='_blank' >Transcript</a>";
                                          } else {
                                          ?>
                                            <button type="button" class="btn btn-success qtranscriptmodal" data-toggle="modal" data-target=".qTranscript" data-module_id="<?php echo $eachModule['id']; ?>" data-type="glossary"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
                                        </td>
                                        <td id="self_learning_<?php echo $eachModule['id'] ?>" style="text-align: center;">
                                          <?php
                                          if (isset($eachModule['self_learning']) && ($eachModule['self_learning'] != "")) {
                                            echo  "<a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $eachModule['id'] . "&filename=" . $eachModule['self_learning'] . "' target='_blank' >Transcript</a>";
                                          } else {
                                          ?>
                                            <button type="button" class="btn btn-success qtranscriptmodal" data-toggle="modal" data-target=".qTranscript" data-module_id="<?php echo $eachModule['id']; ?>" data-type="self_learning"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
                                        </td>
                                        <td id="module_assessment_<?php echo $eachModule['id'] ?>" style="text-align: center;">
                                          <?php
                                          if (isset($eachModule['module_assessment']) && ($eachModule['module_assessment'] != "")) {
                                            echo  "<a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $eachModule['id'] . "&filename=" . $eachModule['module_assessment'] . "' target='_blank' >Transcript</a>";
                                          } else {
                                          ?>
                                            <button type="button" class="btn btn-success qtranscriptmodal" data-toggle="modal" data-target=".qTranscript" data-module_id="<?php echo $eachModule['id']; ?>" data-type="module_assessment"><i class="fa fa-plus"></i></button>
                                          <?php
                                          }
                                          ?>
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

<!-- Add Module modal -->
<div class="modal fade addFaculty" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Assign Faculty to Module</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- start accordion -->
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_content">


              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="existingmodule" role="tabpanel" aria-labelledby="existingmodule-tab">
                  <!-- Tab 1 module content start -->
                  <form id="assignfacultytomodule" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <div class="modal-body">


                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select Faculty<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="faculty_id" id="faculty_id" class="form-control ">
                            <option value="">Select Faculty</option>
                            <?php
                            foreach ($faculty as $eachFaculty) {
                            ?>
                              <option value="<?php echo $eachFaculty['id'] ?>"><?php echo $eachFaculty['salutation'] . " " . $eachFaculty['firstname'] . $eachFaculty['lastname'] ?></option>
                            <?php
                            }
                            ?>

                          </select>
                        </div>
                      </div>

                      <input type="text" id="moduleid" name="moduleid">
                      <input type="text" id="pcumid" name="pcumid">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </form>
                  <!-- Tab 1 module content end -->
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



<!-- Add Q-II-Transcript modal -->
<div class="modal fade qTranscript" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Upload file for Q-II-Transcript</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- start accordion -->
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_content">


              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="existingmodule" role="tabpanel" aria-labelledby="existingmodule-tab">
                  <!-- Tab 1 module content start -->
                  <form id="uploadqtranscript" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Upload File<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="file" id="formFile" name="qtranscriptfile" required>
                        </div>
                      </div>
                      <input type="text" id="module_id" name="module_id" value="">
                      <input type="text" id="type" name="type" value="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                  </form>
                  <!-- Tab 1 module content end -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END Q-II-Transcript modal modal -->

<script>
  $(document).ready(function() {
    $(".facultymodal").click(function() {
      //alert($(this).data('moduleid') + '' + $(this).data('pcumid'));
      $("#moduleid").val($(this).data('moduleid'));
      $("#pcumid").val($(this).data('pcumid'));
      //var formData = new FormData(this);
    });

    $("#assignfacultytomodule").submit(function(e) {

      e.preventDefault(); // Prevent default form submission
      var formData = new FormData();
      formData.append('user_id', $("#faculty_id").val());
      formData.append('module_id', $("#moduleid").val());
      formData.append('programme_course_unit_module_id', $("#pcumid").val());
      $.ajax({
        url: basePath + "/Programmecourse/assignfacultytomodule",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          var parsedResponse = JSON.parse(response);
          var moduleid = $("#moduleid").val();
          var programme_course_unit_module_id = $("#pcumid").val();
          var user = parsedResponse.user.salutation + " " + parsedResponse.user.firstname + " " + parsedResponse.user.lastname;
          var button = '<br>' + '<button class="btn btn-danger" onclick="detachfacultymodule(' + programme_course_unit_module_id + ',' + moduleid + ')"><i class="fa fa-trash"></i></button>';
          $('#quad' + $("#pcumid").val()).html(user + button)
          new PNotify({
            title: 'success',
            text: parsedResponse.successMsg,
            type: 'success',
            styling: 'bootstrap3'
          });
          $('.addFaculty').modal('hide');
          $("#moduleid").val('');
          $("#pcumid").val('');
          //window.location = window.location;
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(error);
          new PNotify({
            title: 'Error',
            text: parsedResponse.errorMsg,
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
    });


    $(".qtranscriptmodal").click(function() {
      $("#module_id").val($(this).data('module_id'));
      $("#type").val($(this).data('type'));
      $('#formFile').val('');
      //var formData = new FormData(this);
    });

    $("#uploadqtranscript").submit(function(e) {
      e.preventDefault(); // Prevent default form submission
      if ($('input[type=file]')[0].files[0] == undefined) {
        return false;
      } else {
        var formData = new FormData();
        formData.append('module_id', $("#module_id").val());
        formData.append('filename', $('input[type=file]')[0].files[0]);
        formData.append('datafile', $("#type").val());
        $.ajax({
          url: basePath + "/Programmecourse/uploadquaddata",
          type: "POST",
          data: formData,
          contentType: false, // Important for FormData
          processData: false, // Important for FormData
          success: function(response) {
            // Handle successful response
            console.log(response);
            var parsedResponse = JSON.parse(response);
            let type = $("#type").val()
            $('#' + type + '_' + $("#module_id").val()).html(parsedResponse.transcript)
            //$('#transcript_' + $("#module_id").val()).html(parsedResponse.transcript)
            new PNotify({
              title: 'success',
              text: parsedResponse.successMsg,
              type: 'success',
              styling: 'bootstrap3'
            });
            $('.qTranscript').modal('hide');
            //window.location = window.location;
          },
          error: function(xhr, status, error) {
            // Handle errors
            console.error(error);
            new PNotify({
              title: 'Error',
              text: parsedResponse.errorMsg,
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        });
      }
    });

  });

  function detachfacultymodule(programme_course_unit_module_id, module_id) {

    var result = confirm("Deatch Faculty from Module, , Are you sure you want to proceed?");
    if (result) {
      var fd = new FormData();
      fd.append('programme_course_unit_module_id', programme_course_unit_module_id);
      $.ajax({
        url: basePath + "/Programmecourse/detachfacultytomodule",
        type: "POST",
        data: fd,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          var parsedResponse = JSON.parse(response);
          var button = '<button class="btn btn-success facultymodal" data-toggle="modal" data-target=".addFaculty" data-moduleid="' + module_id + '" data-pcumid="' + programme_course_unit_module_id + '"><i class="fa fa-plus"></i></button>';
          //alert(button);
          $("#moduleid").val(module_id);
          $("#pcumid").val(programme_course_unit_module_id);
          $('#quad' + programme_course_unit_module_id).html(button)
          new PNotify({
            title: 'success',
            text: parsedResponse.successMsg,
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
            text: parsedResponse.errorMsg,
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
    }
  }
</script>