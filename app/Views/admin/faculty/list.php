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
                <h2><?php echo $subMenu ?> <small>All Faculties</small></h2>

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

                            </p>
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    foreach ($allFacultyDetails as $faculty) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt ?></td>
                                            <td><?php echo $faculty['salutation'] . " " . $faculty['firstname'] . " " . $faculty['lastname']; ?></td>
                                            <td><?php echo $faculty['mobile']; ?></td>
                                            <td><?php echo $faculty['email']; ?></td>
                                            <td><?php echo $faculty['role']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success editpersonaldetails" data-toggle="modal" data-target=".editdetails" data-userid="<?php echo $faculty['id']; ?>"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger" onclick="deleteprofile(<?php echo $faculty['id'] ?>)"><i class="fa fa-trash"></i></button>
                                            <td>
                                                <!-- Inner Table Start -->
                                                <div class="col-md-12 col-sm-12 ">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <?php echo "<b>College Details</b>"; ?>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <table class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. No.</th>
                                                                        <th>College Name</th>
                                                                        <th>Appointment Type</th>
                                                                        <th>From Date</th>
                                                                        <th>To Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $key = 1;
                                                                    foreach ($faculty['collegedetails'] as $college) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $key ?></td>
                                                                            <td><?php echo $college['college_name']; ?></td>
                                                                            <td><?php echo $college['current_appointment_type']; ?></td>
                                                                            <td><?php echo $college['from_date']; ?></td>
                                                                            <td><?php echo $college['to_date']; ?></td>
                                                                        </tr>

                                                                </tbody>
                                                            <?php
                                                                        $key++;
                                                                    }
                                                            ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Inner Table End -->
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
                                <option value="Prof.">Prof.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Mrs.">Mrs.</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="firstname">Firstname
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="firstname" required="required" class="form-control" name="firstname">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lastname">Lastname
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lastname" required="required" class="form-control" name="lastname">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Mobile
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="mobile" class="form-control col" type="text" required="required" name="mobile">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Email
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="email" class="form-control col" type="text" required="required" name="email">
                        </div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" value="">

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


<!-- Add Delete Modal -->
<div class="modal fade deletedetails" tabindex="-1" role="dialog" aria-hidden="true" id="facultyprofile">
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
                                <option value="Prof.">Prof.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Mrs.">Mrs.</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="firstname">Firstname
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="firstname" required="required" class="form-control" name="firstname">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lastname">Lastname
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lastname" required="required" class="form-control" name="lastname">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Mobile
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="mobile" class="form-control col" type="text" required="required" name="mobile">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Email
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="email" class="form-control col" type="text" required="required" name="email">
                        </div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Delete Modal -->
<script>
    $(document).ready(function() {
        $(".editpersonaldetails").click(function() { // Click to only happen on announce links
            $("#user_id").val($(this).data('userid'));


            var fd = new FormData();
            fd.append('user_id', $(this).data('userid'));

            $.ajax({
                url: basePath + "/faculties/facultypersonaldetails",
                type: "POST",
                data: fd,
                contentType: false, // Important for FormData
                processData: false, // Important for FormData
                success: function(response) {
                    // Handle successful response
                    console.log(response);
                    var parsedResponse = JSON.parse(response);
                    $("#firstname").val(parsedResponse[0].firstname);
                    $("#lastname").val(parsedResponse[0].lastname);
                    $("#mobile").val(parsedResponse[0].mobile);
                    $("#email").val(parsedResponse[0].email);
                    $('#salutation option[value="' + parsedResponse[0].salutation + '"]').attr("selected", "selected");

                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
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
                new PNotify({
                    title: 'success',
                    text: parsedResponse.successMsg,
                    type: 'success',
                    styling: 'bootstrap3'
                });
                $('#facultyprofile').modal('hide');
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

    function deleteprofile(user_id) {

        var result = confirm("Faculty Profile, Faculty Profile will be deleted, Are you sure you want to delete this profile?");
        if (result) {
            var fd = new FormData();
            fd.append('user_id', user_id);

            $.ajax({
                url: basePath + "/faculties/deleteProfile",
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