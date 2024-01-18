<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Profile</h3>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Faculty Profile<small></small></h2>
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


            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <ul class="nav navbar-right panel_toolbox">
              <li><button type="button" class="btn btn-success collegemodal" data-toggle="modal" data-target=".addCollege">Add College</button></li>
            </ul>
            <div class="clearfix"></div>

          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3  profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src=<?= base_url('dish2o_admin/') . 'faculties/resource?photo='.$sessionUser['photo'] ?> alt="Avatar" title="Change the avatar" id="profilepic">
                </div>
              </div>
              <h3><?php echo $sessionUser['salutation'] . ' ' . $sessionUser['firstname'] . ' ' . $sessionUser['lastname'] ?></h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-envelope"></i><?php echo $sessionUser['email'] ?>
                </li>

                <!-- <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> <?php //echo $sessionUser['role']
                                                                    ?>
                </li> -->

                <!-- <li class="m-top-xs">
                  <i class="fa fa-external-link user-profile-icon"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                </li> -->
              </ul>
              
               <button class="btn btn-success editpersonaldetails" data-toggle="modal" data-target=".editdetails"><i class="fa fa-edit m-right-xs"></i> Edit Profile</button> 
              <br />



            </div>
            <div class="col-md-9 col-sm-9 ">




              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">College Details</a>
                  </li>

                </ul>
                <div id="myTabContent" class="tab-content">


                </div>
                <div role="tabpanel" class="tab-pane active" id="tab_content2" aria-labelledby="profile-tab">

                  <!-- start user projects -->
                  <table class="data table table-striped no-margin">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>College Name</th>
                        <th>Appointment Type</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cnt = 1;
                      foreach ($facultyDetails as $faculty) {
                      ?>
                        <tr>
                          <td><?php echo $cnt; ?></td>
                          <td><?php echo $faculty['college_name']; ?></td>
                          <td><?php echo $faculty['current_appointment_type']; ?></td>
                          <td><?php echo $faculty['from_date']; ?></td>
                          <td>
                            <?php echo $faculty['to_date']; ?>
                          </td>
                          <td> <!--<button class="btn btn-primary"><i class="fa fa-edit"></i></button> --><button class="btn btn-danger" onclick="deletefacultycollege(<?php echo $faculty['faculty_id'] ?>)"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      <?php
                        $cnt++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <!-- end user projects -->

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

<!-- Add College modal -->
<div class="modal fade addCollege" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add College Details</h4>
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
                  <form id="updateCollege" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="item form-group">
                        <label for="college" class="col-form-label col-md-3 col-sm-3 label-align">College<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <select id="college" name="college_id" class="form-control">
                            <option value="">Select</option>
                            <?php foreach ($colleges as $college) { ?>
                              <option value="<?php echo $college['id']; ?>"><?php echo $college['name']; ?></option>"
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label for="appointment_type" class="col-form-label col-md-3 col-sm-3 label-align">Appointment Type<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <select id="appointment_type" name="current_appointment_type" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Regular</option>
                            <option value="2">Contractual</option>
                            <option value="3">Lecture Basis</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="designation" class="col-form-label col-md-3 col-sm-3 label-align">Designation<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <select id="current_designation_id" name="current_designation_id" class="form-control">
                            <option value="">Select</option>
                            <?php foreach ($designations as $designation) { ?>
                              <option value="<?php echo $designation['id']; ?>"><?php echo $designation['name']; ?></option>"
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="from_date" class="col-form-label col-md-3 col-sm-3 label-align">From Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="from_date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" name="from_date" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                          <script>
                            function timeFunctionLong(input) {
                              setTimeout(function() {
                                input.type = 'text';
                              }, 60000);
                            }
                          </script>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="to_date" class="col-form-label col-md-3 col-sm-3 label-align">To Date</label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="to_date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" name="to_date" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                          <script>
                            function timeFunctionLong(input) {
                              setTimeout(function() {
                                input.type = 'text';
                              }, 60000);
                            }
                          </script>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Submit</button>
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
<!-- END Add College modal -->

<!-- Edit Personal Details modal -->


<div class="modal fade editdetails" tabindex="-1" role="dialog" aria-hidden="true" id="facultyprofile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Personal Details</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="edit-personaldetails" data-parsley-validate class="form-horizontal form-label-left" method="post">
                <div class="modal-body">
                    <div class="item form-group">
                        <label for="salutation" class="col-form-label col-md-3 col-sm-3 label-align">Salutation</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="salutation" name="salutation" class="form-control">
                                <option value="">Select</option>
                               
                                <option value="Prof." <?php echo ("Prof."==$sessionUser['salutation'])? 'selected':'' ?>>Prof.</option>
                                <option value="Dr." <?php echo ("Dr."==$sessionUser['salutation'])? 'selected':'' ?>>Dr.</option>
                                <option value="Mr." <?php echo ("Mr."==$sessionUser['salutation'])? 'selected':'' ?>>Mr.</option>
                                <option value="Ms." <?php echo ("Ms."==$sessionUser['salutation'])? 'selected':'' ?>>Ms.</option>
                                <option value="Mrs." <?php echo ("Mrs."==$sessionUser['salutation'])? 'selected':'' ?>>Mrs.</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="firstname">Firstname
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="firstname" required="required" class="form-control" name="firstname" value="<?php echo $sessionUser['firstname']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lastname">Lastname
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lastname" required="required" class="form-control" name="lastname" value="<?php echo $sessionUser['lastname']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Mobile
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="mobile" class="form-control col" type="text" required="required" name="mobile" value="<?php echo $sessionUser['mobile']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Email
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="email" class="form-control col" type="text" required="required" name="email" value="<?php echo $sessionUser['email']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="photo">Photo
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="photo" class="form-control col" type="file" required="required" name="photo" value="<?php echo $sessionUser['photo']; ?>">
                        </div>
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $sessionUser['id']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Personal Details modal -->




<script>
  $(document).ready(function() {


    $("#updateCollege").submit(function(e) {
      e.preventDefault(); // Prevent default form submission
      var formData = new FormData();
      formData.append('college_id', $("#college").val());
      formData.append('appointment_type', $("#appointment_type").val());
      formData.append('current_designation_id', $("#current_designation_id").val());
      formData.append('from_date', $("#from_date").val());
      formData.append('to_date', $("#to_date").val());
      $.ajax({
        url: basePath + "/faculties/addnewcollege",
        type: "POST",
        data: formData,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          var parsedResponse = JSON.parse(response);
          /* var button=' <a href="'+basePath+'/Programmecourse/showueafile'+'?programme_course_unit_id='+programme_course_unit_id+'&filename='+parsedResponse.file+'" target="_blank" >View File</a>'+
                       '<button class="btn btn-danger" onclick="deleteuea('+programme_course_unit_id+','+unit_id+')"><i class="fa fa-trash"></i></button>';
             $('#uea' + $("#unit_id").val()).html(button)    */

          new PNotify({
            title: 'success',
            text: parsedResponse.successMsg,
            type: 'success',
            styling: 'bootstrap3'
          });
          $('.addCollege').modal('hide');

          window.location = window.location;
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

    $("#edit-personaldetails").submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);

        $.ajax({
            url: basePath + "/faculties/update",
            type: "POST",
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            success: function(response) {
                // Handle successful response
                console.log(response);
                var parsedResponse = JSON.parse(response);
                $('#profilepic').attr('src', parsedResponse.photoPath);
               
                new PNotify({
                    title: 'success',
                    text: parsedResponse.successMsg,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                $('#facultyprofile').modal('hide');
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

  function deletefacultycollege(faculty_id) {

    var result = confirm("College Details, Are you sure you want to delete this college?"+faculty_id);
    if (result) {
      var fd = new FormData();
      fd.append('faculty_id', faculty_id);

      $.ajax({
        url: basePath + "/faculties/deletefacultycollege",
        type: "POST",
        data: fd,
        contentType: false, // Important for FormData
        processData: false, // Important for FormData
        success: function(response) {
          // Handle successful response
          console.log(response);
          var parsedResponse = JSON.parse(response);
          new PNotify({
            title: 'success',
            text: parsedResponse.successMsg,
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
            text: parsedResponse.errorMsg,
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
    }
  }
</script>