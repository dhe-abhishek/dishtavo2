<!-- page content -->
<!-- bootstrap-wysiwyg -->
	<script src="<?= base_url('public/vendors') ?>/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="<?= base_url('public/vendors') ?>/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="<?= base_url('public/vendors') ?>/google-code-prettify/src/prettify.js"></script>

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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('dish2o_admin/blog/save') ?>" enctype="multipart/form-data">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select name="blog_section_id" id="blog_section_id" class="form-control " required>
												<option value="">Select Section</option>
												<?php
												foreach ($blogSections as $eachSection) {
												?>
												<option value="<?php echo $eachSection['id'] ?>"><?php echo $eachSection['name'] ?></option>
												<?php
												}
												?>
											</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select name="blog_category_id" id="blog_category_id" class="form-control " required>
												<option value="">Select category</option>
												<?php
												foreach ($blogCategories as $eachCategory) {
												?>
												<option value="<?php echo $eachCategory['id'] ?>"><?php echo $eachCategory['name'] ?></option>
												<?php
												}
												?>
											</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" class="form-control ">
												<?php echo (isset($errors) && $errors['name'])? '<span class="parsley-required" role="alert">'.$errors['name'].'</span>':''; ?>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Short description <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="short_description" name="short_description" class="form-control ">
												
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
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
															<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
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

														<!--<div class="btn-group">
															<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
															<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
														</div>-->

														<div class="btn-group">
															<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
															<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
														</div>
													</div>

													<div id="editor-one" class="editor-wrapper"></div>

													<textarea name="descr" id="descr" style="display:none;"></textarea>

													<br />

				
												</div>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Video URL </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="video_url" name="video_url" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Cover Photo </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" name="file"/>
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