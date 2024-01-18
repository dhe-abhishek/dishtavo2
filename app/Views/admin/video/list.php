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
                <h2><?php echo $subMenu ?> <small>All Videos</small></h2>

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
                          tables is to call the construction function: <code>$().DataTable();</code>-->
                            </p>
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Video Title</th>
                                        <th>Recorded By</th>
                                        <th>URL</th>
                                        <th>Language</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    foreach ($allVideoDetails as $eachVideo) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $eachVideo['title']; ?></td>
                                            <td><?php echo $eachVideo['salutation'] . " " . $eachVideo['firstname'] . " " . $eachVideo['lastname']; ?></td>
                                            <td><?php echo $eachVideo['video_url']; ?></td>
                                            <td><?php echo $eachVideo['language']; ?></td>
                                            <td><?php echo $eachVideo['created_at']; ?></td>
                                            <td>

                                                <input type="hidden" name="videoid" id="videoid" value="<?php echo $eachVideo['id']; ?>" />
                                                <button class="btn btn-success editvideodetails" data-toggle="modal" data-target=".editdetails" data-videoid="<?php echo $eachVideo['id']; ?>" type="submit"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger" onclick="deleteVideo(<?php echo $eachVideo['id'] ?>)"><i class="fa fa-trash"></i></button>

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


<!-- Edit Video Details modal -->


<div class="modal fade editdetails" tabindex="-1" role="dialog" aria-hidden="true" id="videodetails">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Video Details</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="edit-videodetails" data-parsley-validate class="form-horizontal form-label-left" method="post">
                <div class="modal-body">
                    <div class="item form-group">
                        <label for="recorded_by" class="col-form-label col-md-3 col-sm-3 label-align">Recorded By</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="faculty" name="faculty" class="form-control">
                                <option value="">Select</option>
                                <?php foreach ($allFacultyNames as $faculty) { ?>
                                    <option value="<?php echo $faculty['id']; ?>"><?php echo $faculty['salutation'] . " " . $faculty['firstname'] . " " . $faculty['lastname']; ?></option>"
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Video Title
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="title" required="required" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="url">URL
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="url" name="url" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="language">Language
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="language" name="language" class="form-control">
                                <option value="">Select</option>
                                <?php foreach ($languages as $language) { ?>
                                    <option value="<?php echo $language['id']; ?>"><?php echo $language['name']; ?></option>"
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <input type="hidden" id="video_id" name="video_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Video Details modal -->





<script>
    $(document).ready(function() {
        $(".editvideodetails").click(function() { // Click to only happen on announce links
            $("#video_id").val($(this).data('videoid'));


            var fd = new FormData();
            fd.append('id', $(this).data('videoid'));

            $.ajax({
                url: basePath + "/videos/videodetails",
                type: "POST",
                data: fd,
                contentType: false, // Important for FormData
                processData: false, // Important for FormData
                success: function(response) {
                    // Handle successful response
                    console.log(response);
                    var parsedResponse = JSON.parse(response);
                    $('#faculty option[value="' + parsedResponse[0].id + '"]').attr("selected", "selected");
                    $("#title").val(parsedResponse[0].name);
                    $("#url").val(parsedResponse[0].video_url);
                    $('#language option[value="' + parsedResponse[0].language_id + '"]').attr("selected", "selected");

                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });
    });


    $("#edit-videodetails").submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);

        $.ajax({
            url: basePath + "/videos/update",
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
                $('#videodetails').modal('hide');
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


    function deleteVideo(video_id) {
        var result = confirm("Video Details, Video will be deleted, Are you sure you want to delete this video?");
        if (result) {
            var fd = new FormData();
            fd.append('id', video_id);

            $.ajax({
                url: basePath + "/videos/deleteVideo",
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