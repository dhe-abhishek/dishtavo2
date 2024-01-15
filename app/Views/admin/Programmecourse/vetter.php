<link media="all" rel="stylesheet" type="text/css" href="<?= base_url('public/css/autosuggeststyles.css') ?>" />
<script type="text/javascript" src="<?= base_url('public/js/') ?>jquery.autocomplete.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= base_url('public/vendors') ?>/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?= base_url('public/vendors') ?>/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?= base_url('public/vendors') ?>/google-code-prettify/src/prettify.js"></script>

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
                                                                            <th>Module Name</th>
                                                                            <th>Vetting Status</th>
                                                                            <th>Changes in the content</th>
                                                                            <th>Recommendation</th>
                                                                            <th>Other Reason</th>
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
                                                                                <td style="text-align: center;">
                                                                                    <button class="btn btn-success ueamodal" data-toggle="modal" data-target=".addUEA" data-unit_id="<?php //echo $eachModule['id'];  
                                                                                                                                                                                        ?>" data-pcu_id="<?php // echo $eachModule['programme_course_unit_id'];  
                                                                                                                                                                                                            ?>"><i class="fa fa-eye"></i></button>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <button class="btn btn-success editormodal" data-toggle="modal" data-target=".addEditor" data-unit_id="<?php //echo $eachModule['id'];  
                                                                                                                                                                                            ?>" data-pcu_id="<?php // echo $eachModule['programme_course_unit_id'];  
                                                                                                                                                                                                                ?>"><i class="fa fa-plus"></i></button>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <button class="btn btn-success editormodal" data-toggle="modal" data-target=".addEditor" data-unit_id="<?php //echo $eachModule['id'];  
                                                                                                                                                                                            ?>" data-pcu_id="<?php // echo $eachModule['programme_course_unit_id'];  
                                                                                                                                                                                                                ?>"><i class="fa fa-plus"></i></button>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <button class="btn btn-success editormodal" data-toggle="modal" data-target=".addEditor" data-unit_id="<?php //echo $eachModule['id'];  
                                                                                                                                                                                            ?>" data-pcu_id="<?php // echo $eachModule['programme_course_unit_id'];  
                                                                                                                                                                                                                ?>"><i class="fa fa-plus"></i></button>
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

    <!-- Upload UEA modal -->
    <div class="modal fade addEditor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Changes in the content</h4>
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
                                                    <div class="col-md-12 col-sm-12 ">
                                                        <div class="x_content">
                                                            <div id="alerts"></div>
                                                            <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                    </ul>
                                                                </div>

                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <a data-edit="fontSize 5">
                                                                                <p style="font-size:17px">Huge</p>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a data-edit="fontSize 3">
                                                                                <p style="font-size:14px">Normal</p>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a data-edit="fontSize 1">
                                                                                <p style="font-size:11px">Small</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="btn-group">
                                                                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                                                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                                                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                                                </div>

                                                                <div class="btn-group">
                                                                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                                                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                                                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                                                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                                                </div>

                                                                <div class="btn-group">
                                                                    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                                                    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                                                    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                                                    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                                                </div>

                                                                <div class="btn-group">
                                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                                                    <div class="dropdown-menu input-append">
                                                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                                                        <button class="btn" type="button">Add</button>
                                                                    </div>
                                                                    <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                                                </div>
                                                            </div>

                                                            <div id="editor-one" class="editor-wrapper"></div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <input type="text" id="unit_id" name="unit_id" value="">

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