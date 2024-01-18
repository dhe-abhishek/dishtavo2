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
                        <h2><?php echo $subMenu ?> <small></small></h2>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/programmes/save') ?>">


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="type" , name="type" class="form-control">
                                    <option value="">Select Type</option>
                                        <option value="1">Current</option>
                                        <option value="2">NEP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Position </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="position" class="form-control" type="text" name="position">
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