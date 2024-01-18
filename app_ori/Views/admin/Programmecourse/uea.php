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
              <input type="hidden" name="unit_count" id="unit_count" value="<?php //echo count($quadData) 
                                                                            ?>">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <!-- <th data-orderable="false">Action</th> -->

                    <th>Unit Name</th>
                    <th>Position</th>
                    <th>Unit End Assessment</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                  $cnt = 1;
                  foreach ($allUnits as $unit) {
                  ?>
                    <tr id="unitrow_<?php echo $unit['id'] ?>">
                      <td><?php echo $cnt; ?></td>


                      <td><?php echo $unit['name']; ?></td>
                      <td><?php echo $unit['position']; ?></td>
                      <td id="uea<?php echo $unit['id'] ?>" style="text-align: center;">
                        <?php
                        if (isset($unit['uea']) && $unit['uea_uploaded_by'] != 0) {
                        ?>
                          <a href="<?php echo base_url('dish2o_admin/Programmecourse/showueafile') . '?programme_course_unit_id=' . $unit['programme_course_unit_id'] . '&filename=' . $unit['uea'] ?>" target='_blank'><i class='fa fa-eye'></i></a>

                          <button class='btn btn-danger' onclick="deleteuea(<?php echo $unit['programme_course_unit_id'] ?>,<?php echo $unit['id'] ?>)"><i class='fa fa-trash'></i></button>
                        <?php
                        } else {
                        ?>
                          <button class="btn btn-success ueamodal" data-toggle="modal" data-target=".addUEA" data-unit_id="<?php echo $unit['id']; ?>" data-pcu_id="<?php echo $unit['programme_course_unit_id']; ?>"><i class="fa fa-plus"></i></button>
                        <?php
                        }
                        ?>
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

  <!-- Upload UEA modal -->
  <div class="modal fade addUEA" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Upload Unit End Assessment</h4>
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
                    <form id="uploaduea" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Upload File<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" type="file" id="formFile" name="ueafile" required>
                          </div>
                        </div>
                        <input type="text" id="unit_id" name="unit_id" value="">
                        <input type="text" id="pcu_id" name="pcu_id" value="">
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
      $(".ueamodal").click(function() {
        $("#unit_id").val($(this).data('unit_id'));
        $("#pcu_id").val($(this).data('pcu_id'));
        $('#formFile').val('');
        
        //var formData = new FormData(this);
      });

      $("#uploaduea").submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        if ($('input[type=file]')[0].files[0] == undefined) {
          return false;
        } else {
          var formData = new FormData();
          formData.append('unit_id', $("#unit_id").val());
          formData.append('filename', $('input[type=file]')[0].files[0]);
          formData.append('programme_course_unit_id', $("#pcu_id").val());
          var programme_course_unit_id=$("#pcu_id").val();
          var unit_id=$("#unit_id").val();
          $.ajax({
            url: basePath + "/Programmecourse/uploaduea",
            type: "POST",
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            success: function(response) {
              // Handle successful response
              console.log(response);
              var parsedResponse = JSON.parse(response);
              var button=' <a href="'+basePath+'/Programmecourse/showueafile'+'?programme_course_unit_id='+programme_course_unit_id+'&filename='+parsedResponse.file+'" target="_blank" >View File</a>'+
                        '<button class="btn btn-danger" onclick="deleteuea('+programme_course_unit_id+','+unit_id+')"><i class="fa fa-trash"></i></button>';
              $('#uea' + $("#unit_id").val()).html(button)      
            //  $('#uea' + $("#unit_id").val()).html(parsedResponse.transcript)
              //$('#transcript_' + $("#module_id").val()).html(parsedResponse.transcript)
              new PNotify({
                title: 'success',
                text: parsedResponse.successMsg,
                type: 'success',
                styling: 'bootstrap3'
              });
              $('.addUEA').modal('hide');
              $('#unit_id').val('');
              $('#pcu_id').val('');
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

    function deleteuea(programme_course_unit_id,unit_id) {

      var result = confirm("Unit End Assessment, Unit End Assessment will be deleted, Are you sure you want to delete this?");
      if (result) {
        var fd = new FormData();
        fd.append('programme_course_unit_id', programme_course_unit_id);
        $.ajax({
          url: basePath + "/Programmecourse/deleteuea",
          type: "POST",
          data: fd,
          contentType: false, // Important for FormData
          processData: false, // Important for FormData
          success: function(response) {
            // Handle successful response
            console.log(response);
            var parsedResponse = JSON.parse(response);
            var button='<button class="btn btn-success ueamodal" data-toggle="modal" data-target=".addUEA" data-unit_id="'+unit_id+'" data-pcu_id="'+programme_course_unit_id+'"><i class="fa fa-plus"></i></button>';
            $('#unit_id').val(unit_id);
            $('#pcu_id').val(programme_course_unit_id);
            $('#formFile').val('');
           //alert(button);
            $('#uea' + unit_id).html(button)
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