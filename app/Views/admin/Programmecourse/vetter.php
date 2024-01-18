<link media="all" rel="stylesheet" type="text/css" href="<?= base_url('public/css/autosuggeststyles.css') ?>" />

<script type="text/javascript" src="<?= base_url('public/js/') ?>jquery.autocomplete.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= base_url('public/vendors') ?>/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?= base_url('public/vendors') ?>/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?= base_url('public/vendors') ?>/google-code-prettify/src/prettify.js"></script>
<script src="<?= base_url('public') ?>/ckeditor/ckeditor.js"></script>



<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $pageTitle ?></h3>
        </div>
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
          <li><button type="button" class="btn btn-success unitmodal" data-toggle="modal" data-target=".addunitmodal" data-courseid="<?php //echo $courseDetails['id']; ?>" data-unitcount="<?php //echo count($template) ?>">Back</button></li>
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
              <input type="text" name="unit_count" id="unit_count" value="<?php  echo count($template) ?>">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
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
                     
                      <td><?php echo $unit['name']; ?></td>
                      <td>
                        <div class="col-md-12 col-sm-12 ">
                          <div class="x_panel">
                            <div class="x_title">
                              <?php echo "There are <b>" . $unit['modules_count'] . "</b> module(s) under this unit."; ?>
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
                                        <td><?php echo $eachModule['name']; ?></td>
                                        <td>
                                          <?php if ($eachModule['videos']) { ?>
                                            <table class="table table-striped table-bordered" style="width:100%">
                                              <thead>
                                                <tr>
                                                  <th>Sr. No.</th>
                                                  <th>Language</th>
                                                  <th>URL</th>
                                                  <th>Faculty</th>
                                                  <th>Changes in the content</th>
                                                  <th>Recommendation</th>
                                                  <th>Other Reason</th>
                                                </tr>
                                              </thead>
                                              <?php
                                              $videoCount = 1;
                                              foreach ($eachModule['videos'] as $eachVideo) {
                                              ?>
                                                <tbody>
                                                  <tr id="videorow_<?php echo $eachVideo['id'] ?>">
                                                    <td><?php echo $videoCount; ?></td>
                                                    <td><?php echo $eachVideo['language_code']; ?></td>
                                                    <td><?php echo $eachVideo['video_url']; ?></td>
                                                    <td>
                                                      <?php echo $eachVideo['firstname'] . ' ' . $eachVideo['lastname']; ?>
                                                    </td>
                                                    <td><?php if($eachVideo['content_changes']) { echo $eachVideo['content_changes'];} else{ echo "No Remarks";}?></td>
                                                    <td><?php if($eachVideo['rec_remarks']) { echo $eachVideo['rec_remarks'];} else{ echo "No Remarks";}?></td>
                                                    <td><?php if($eachVideo['other_rec_reason']) { echo $eachVideo['other_rec_reason'];} else{ echo "No Remarks";}?></td>
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
    <!-- Upload UEA modal -->
    <div class="modal fade addEditor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Content</h4>
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
                                        <form id="contentmodal" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                               
                                                <div class="item form-group">

                                                        <textarea name="my_content" id="my_content" rows="10"></textarea>
                                            
                                                </div>
                                                <input type="text" id="video_id" name="video_id" value="">
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
    <!-- END UEA modal -->

    <script>
        
        $(document).ready(function() {

            CKEDITOR.replace('my_content');
         
                                                      
            $(".editormodal").click(function() {
                var content=CKEDITOR.instances.my_content.document.getBody().getText();
                $("#type").val($(this).data('type'));
               // $("#pcu_id").val($(this).data('pcu_id'));
            });

            $("#contentmodal").submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = new FormData();
               
                formData.append('content', content);
                formData.append('type', type);
                formData.append('vetting_schedule_id', 1);
                $.ajax({
                    url: basePath + "/Programmecourse/vetteruploadcontentType",
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for FormData
                    processData: false, // Important for FormData
                    success: function(response) {
                        // Handle successful response
                        console.log(response);
                        //var parsedResponse = JSON.parse(response);
                        var button = ' <a href="' + basePath + '/Programmecourse/showueafile' + '?programme_course_unit_id=' + programme_course_unit_id + '&filename=' + parsedResponse.file + '" target="_blank" >View File</a>' +
                            '<button class="btn btn-danger" onclick="deleteuea(' + programme_course_unit_id + ',' + unit_id + ')"><i class="fa fa-trash"></i></button>';
                        $('#uea' + $("#unit_id").val()).html(button)

                        new PNotify({
                            title: 'success',
                            text: parsedResponse.successMsg,
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        $('.addUEA').modal('hide');
                        $('#unit_id').val('');
                        $('#type').val('');
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

        });
    </script>