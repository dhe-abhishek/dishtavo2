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
                        <h2>Personal Details <small></small></h2>
                       
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('/dish2o_admin/faculties/save') ?>">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="salutation">Salutation <span class="required">*</span>
                                </label>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="firstname">Firstname <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="firstname" required="required" class="form-control" name="firstname">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Lastname<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="lastname" name="lastname" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mobile<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="mobile" class="form-control col" type="text" required="required" name="mobile">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="email" class="form-control col" type="email" required="required" name="email">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="username" class="col-form-label col-md-3 col-sm-3 label-align">Username<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="username" required="required" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="password" required="required" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="cpassword" class="col-form-label col-md-3 col-sm-3 label-align">Confirm Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cpassword" required="required" class="form-control" name="cpassword">
                                </div>
                            </div>
                            <div class="x_title">
                        <h2>Professional Details <small></small></h2>
                        
                        <div class="clearfix"></div>
                    </div>
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
                                    <select id="designation" name="current_designation_id" class="form-control">
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
                                    <input id="to_date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  name="to_date" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
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
        </div>
    </div>
</div>
<!-- page content -->