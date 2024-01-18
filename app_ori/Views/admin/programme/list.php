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
                <h2><?php echo $subMenu ?> <small>All Programmes</small></h2>
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
                                        <th>Type</th>
                                        <th>Position</th>
                                        <th>Created date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    foreach ($programmes as $eachProgramme) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $eachProgramme['name']; ?></td>
                                            <td><?php echo $eachProgramme['type'] == "1" ? "CURRENT" : "NEP" ?></td>
                                            <td><?php echo $eachProgramme['position']; ?></td>
                                            <td><?php echo $eachProgramme['created_at']; ?></td>
                                            <td>
                                                <form method="post" action="<?= base_url('dish2o_admin/programmes/edit') ?>">
                                                    <input type="hidden" name="programme_id" id="programme_id" value="<?php echo $eachProgramme['id']; ?>" />
                                                    <button class="btn btn-success" type="submit">Edit</button>
                                                </form>
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