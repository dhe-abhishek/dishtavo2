<!-- page content -->

<div class="right_col" role="main">
				<div class="">
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
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><?php echo $subMenu ?> <small>different form elements</small></h2>
									<!--<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>-->
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
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
									<div class="alert alert-success" role="alert">
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										<span class="sr-only">Success:</span> <?php echo $errorMsg; ?>
									</div>
								<?php
								    } 
                                ?>
								<?php 
								if(isset($errors) && $errors){
								?>
								<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									<span class="sr-only">Errors:</span> <?php foreach($errors as $eachError){ print $eachError.'<BR>'; } ?>
								</div>
								<?php
									} 
                                ?>
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/colleges/update') ?>">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" required="required" class="form-control " value="<?php echo $collegeDetails['name']; ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea type="text" id="address" name="address" required="required" class="form-control"><?php echo $collegeDetails['address']; ?></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" >Email </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="text" name="email" value="<?php echo $collegeDetails['email']; ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mobile </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="mobile" class="form-control" type="text" name="mobile" value="<?php echo $collegeDetails['mobile']; ?>">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                                <input id="college_id" class="form-control" type="hidden" name="college_id" value="<?php echo $collegeDetails['id']; ?>">
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