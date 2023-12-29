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
								<?php if(isset($successMsg) && $successMsg){
									?>
									<div class="alert alert-success" role="alert">
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										<span class="sr-only">Success:</span> <?php echo $successMsg; ?>
									</div>
									<?php
								} 
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/colleges/save') ?>">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" class="form-control ">
												<?php echo (isset($errors) && $errors['name'])? '<span class="parsley-required" role="alert">'.$errors['name'].'</span>':''; ?>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea type="text" id="address" name="address" required="required" class="form-control"></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="text" name="email">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mobile </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="mobile" class="form-control" type="text" name="mobile">
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