
<div class="right_col" role="main">
<div class="page-title">
						<div class="title_left">
							<h3><?php echo $pageTitle ?></h3>
						</div>

						<!--<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>-->
					</div>
					<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $subMenu ?> <small>Blog</small></h2>
                  <!--<ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                          class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>-->
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                      <?php 
                                    if(isset($successMsg) && $successMsg){
                        ?>
                          <div class="alert alert-success" role="alert">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <span class="sr-only">Success:</span> <?php echo $successMsg; ?>
                          </div>
                        <?php
                            } 
                                      
                                            if(isset($errorMsg) && $errorMsg){
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
                              <th>Title</th>
                              <th>Photo</th>
                              <th>Description</th>
                              <th>Created date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $cnt = 1;
                            foreach($blogs as $each){
                              ?>
                              <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $each['name']; ?></td>
                                <td><?php if($each['photo']){ ?><img src="<?php echo $each['photo_path']; ?>" width="100px"/><?php }else echo "No Image";?></td>
                                <td><?php echo $each['short_description']; ?></td>
                                <td><?php echo $each['created_at']; ?></td>
                                <td><form method="post" action="<?= base_url('dish2o_admin/blog/edit') ?>"> <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $each['id']; ?>"/><button class="btn btn-success" type="submit">Edit</button></form></td>
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