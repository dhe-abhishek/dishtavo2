<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $pageTitle ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>View Incomplete Modules<small></small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if (isset($successMsg) && $successMsg) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                <span class="sr-only">Success:</span> <?php echo $successMsg; ?>
                            </div>
                        <?php
                        }
                        if (isset($errors) && $errors) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                <span class="sr-only">Errors:</span> <?php foreach ($errors as $eachError) {
                                                                            print $eachError . '<BR>';
                                                                        } ?>
                            </div>
                        <?php
                        }
                        ?>
                        <br />
                        <form id="incompletemodules" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/report/incompletemodules') ?>">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Programme">Programme <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="programme" name="programme" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach ($programmes as $programme) { ?>
                                            <option value=<?php echo $programme['id']; ?>><?php echo $programme['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Subject">Subject <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="subject" name="subject" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="course">Course <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="course" name="course" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Incomplete Modules</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%">
                                        <?php if (!empty($incompletemodules)) {
                                            $firstModule = $incompletemodules[0];
                                            $subject_name=$firstModule['subject_name'];
                                            $course_name=$firstModule['course_name'];
                                            $program_name=$firstModule['program_name'];
                                         ?>
                                        <tr>
                                            <td><?php echo '<b>Programme:</b> ' . $program_name ?></td>
                                            <td><?php echo '<b>Subject :</b> ' .  $subject_name ?></td>
                                            <td><?php echo '<b>Course name:</b> ' . $course_name ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Unit Name</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($incompletemodules)) { ?>
                                                <?php foreach ($incompletemodules as $imodule) {  ?>
                                                    <tr>
                                                        <td><?php echo $imodule['unit_name'] ?></td>
                                                        <td>
                                                            <table class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. No.</th>
                                                                        <th>Module Name</th>
                                                                        <th>Language</th>
                                                                    </tr>
                                                                </thead>                                        
                                                                <tbody>
                                                                    <?php foreach ($imodule['modules'] as $key=>$module) {  ?>
                                                                        <tr>
                                                                            <td><?php echo $key+1 ?></td>
                                                                            <td><?php echo $module['module_name'] ?></td>
                                                                            <td><?php echo $module['missing_language'] === 'EN' ?  "English" : "Konkani" ?></td>
                                                                        </tr>
                                                                    <?php  } ?>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php  } ?>
                                            <?php  } else { ?>
                                                <tr>
                                                    <td><?php echo "No Data"; ?></td>
                                                    <td><?php echo "No Data"; ?></td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page content -->



<script>
    $('#programme').change(function() {
        var programmeId = $(this).val();
        var formData = new FormData();
        formData.append('program_id', programmeId);
        $.ajax({
            url: basePath + "/report/getsubject",
            type: 'POST',
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            success: function(response) {
                var parsedResponse = JSON.parse(response);
                // Process the response and populate the dropdown
                populateSubject(parsedResponse); // Call populateSubject dropdown
            }
        });
    });


    function populateSubject(response) {
        var subjectdropdown = $('#subject');
        $.each(response, function(index, item) {
            var option = $('<option></option>')
                .val(item.subject_id)
                .text(item.subject_name);
            subjectdropdown.append(option);
        });
    }

    $('#subject').change(function() {
        var selectedSubjectId = $(this).val();
        var selectedprogramId = $("#programme").val()
        //alert(selectedSubjectId+" "+programId);
        var formData = new FormData();
        formData.append('subject_id', selectedSubjectId);
        formData.append('program_id', selectedprogramId);
        $.ajax({
            url: basePath + '/report/getcourse', // Replace with your URL
            type: 'POST',
            data: formData,
            contentType: false, // Important for FormData
            processData: false, // Important for FormData
            success: function(response) {

                var parsedResponse = JSON.parse(response);
                populateCourse(parsedResponse);
            }
        });
    });


    function populateCourse(response) {
        var coursedropdown = $('#course');
        $.each(response, function(index, item) {
            var option = $('<option></option>')
                .val(item.course_id)
                .text(item.course_name);
            coursedropdown.append(option);
        });
    }
</script>