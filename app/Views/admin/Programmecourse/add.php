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
						<h2><?php echo $subMenu ?> <!-- <small>different form elements</small> --></h2>
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
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/Programmecourse/save') ?>">

							<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Stream <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" class="form-control ">
												<?php //echo (isset($errors) && $errors['name'])? '<span class="parsley-required" role="alert">'.$errors['name'].'</span>':''; 
												?>
											</div>
										</div> -->

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Stream<span class="required">*</span></label>
								<br>
								<select class="form-control" id="sel_stream" name="sel_stream">
									<option selected>Select Stream</option>


									<?php
									foreach ($programmes as $programme) {
										echo "<option value='" . $programme['id'] . "'>" . $programme['name'] . "</option>";
									}
									?>
								</select>

							</div>
							<br>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span></label>
								<br>
								<select class="form-control" id="sel_sub" name="sel_sub">
									<option selected>Select Subject</option>
									<?php
									foreach ($subjects as $subject) {
										echo "<option value='" . $subject['id'] . "'>" . $subject['name'] . "</option>";
									}
									?>

								</select>
							</div>
							<br>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Program Type<span class="required">*</span></label>
								<select class="form-control" id="sel_program" name="sel_program">
									<option selected>Select Program Type</option>
									<option value="GEN">General</option>
									<option value="HNR">Honours</option>
								</select>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Semester<span class="required">*</span></label>
								<br>
								<select class="form-control" id="sel_sem" name="sel_sem">
									<option selected>Select Semester</option>
									<option value=1>I</option>
									<option value=2>II</option>
									<option value=3>III</option>
									<option value=4>IV</option>
									<option value=5>V</option>
									<option value=6>VI</option>
									<option value=7>VII</option>
									<option value=8>VIII</option>
									<option value=9>IX</option>
									<option value=10>X</option>
								</select>

							</div>
							<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Subject <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" class="form-control ">
												<?php //echo (isset($errors) && $errors['name'])? '<span class="parsley-required" role="alert">'.$errors['name'].'</span>':''; 
												?>
											</div>
										</div> -->
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Effective Year <span class="required">*</span>
								</label>
								<div class="col-md-3 col-sm-3 ">
									<input id="year" class="form-control" type="text" name="year">
								</div>
								<div class="col-md-4 col-sm-4 ">
									<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Number of Credits </label>
									<div class="col-md-3 col-sm-3 ">
										<input id="credits" class="form-control" type="text" name="credits">
									</div>
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Course Type<span class="required">*</span></label>
								<br>
								<select class="form-control" id="ctype" name="ctype">
									<option selected>Select Category</option>
									<?php
									foreach ($coursecategory as $category) {
										echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
									}
									?>

								</select>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Course Code<span class="required">*</span></label>
								<br>
								<div class="col-md-3 col-sm-3 ">
									<input id="ccode" class="form-control" type="text" name="ccode">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Course Name<span class="required">*</span>
								</label>
								<br>
								<select class="form-control" id="cname" name="cname">
									<option selected>Select Course Name</option>
									<?php
									foreach ($courses as $name) {
										echo "<option value='" . $name['id'] . "'>" . $name['name'] . "</option>";
									}
									?>

								</select>

							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Course Prerequisuite<span class="required">*</span></label>
								<br>
								<div class="col-md-3 col-sm-3 ">
									<input id="cPrerequisuite" class="form-control" type="text" name="cPrerequisuite">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Course Ojectives<span class="required">*</span></label>
								<br>
								<div class="col-md-3 col-sm-3 ">
									<input id="cOjectives" class="form-control" type="text" name="cOjectives">
								</div>
							</div>
							<br>
							<!-- <div class="title_left">
								<h5>Coordinator Details</h5>
							</div>
							<hr>
							<br>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Coordinator Name</label>
								<div class="col-md-4 col-sm-4 ">
									<input id="name" class="form-control" type="text" name="name">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Course Prerequisuite</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="Prerequisuite" class="form-control" type="text" name="Prerequisuite">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Coordinator Mobile </label>
								<div class="col-md-6 col-sm-6 ">
									<input id="mobile" class="form-control" type="text" name="mobile">
								</div>
							</div> -->

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