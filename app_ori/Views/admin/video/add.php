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
                        <h2>Add Video <small></small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        $session = session();
                        if ($session->has('success')) {
                            echo '<div class="alert alert-success">' . $session->getFlashdata('success') . '</div>';
                        }
                        ?>
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('/dish2o_admin/videos/save') ?>">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="faculty">Faculty <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="faculty" name="faculty" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach ($allFacultyNames as $faculty) { ?>
                                            <option value="<?php echo $faculty['id']; ?>"><?php echo $faculty['firstname']; ?></option>"
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Video Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="title" required="required" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="url" class="col-form-label col-md-3 col-sm-3 label-align">URL<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="url" name="url" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Language<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="language" name="language" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach ($languages as $language) { ?>
                                            <option value="<?php echo $language['id']; ?>"><?php echo $language['name']; ?></option>"
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

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