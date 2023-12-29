<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $pageTitle ?></h3>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?php echo $subMenu ?> <small></small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
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
                                <div class="alert alert-success" role="alert">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    <span class="sr-only">Success:</span> <?php echo $errorMsg; ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
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
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/programmes/update') ?>">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <select id="type" name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="1" <?php if ($programmeDetails['type'] == 1) echo 'selected'; ?>>Current</option>
                                            <option value="2" <?php if ($programmeDetails['type'] == 2) echo 'selected'; ?>>NEP</option>
                                        </select>

                                    </div>

                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" required="required" class="form-control " value="<?php echo $programmeDetails['name']; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Position <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="position" name="position" required="required" class="form-control " value="<?php echo $programmeDetails['position']; ?>">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <input id="programme_id" class="form-control" type="hidden" name="programme_id" value="<?php echo $programmeDetails['id']; ?>">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>