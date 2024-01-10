<?php /*
<div class="header no-print">
<div class="logo">
  <a href="<?php echo $this->config->item('lnk_url');?>dashboard" style="color: rgb(255, 255, 255); font-size: 21px;">Parab Ent. & Delta SUPER<!--<img src="images/logo.png" style="color: rgb(255, 255, 255); font-size: 48px;" alt="IMS" />--></a>
</div>
<div class="headerinner">
  <ul class="headmenu">
      <li class="odd">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="count"></span>
              <span class="head-icon head-billing"></span>
              <span class="headmenu-label">Billing</span>
          </a>
          <ul class="dropdown-menu">
              
              <li><a href="<?php echo $this->config->item('lnk_url');?>billing/badd"><span class=""></span> <strong>New Bill</strong> <small class="muted"></small></a></li>
              <li><a href="<?php echo $this->config->item('lnk_url');?>billing/invoices"><span class=""></span> <strong>Invoives</strong> <small class="muted"></small></a></li>
              <li><a href="<?php echo $this->config->item('lnk_url');?>pendingpayment/listing"><span class=""></span> <strong>Pending Payment</strong> <small class="muted"></small></a></li>
          </ul>
             
      </li>
      <li>
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
          <span class="count"></span>
          <span class="head-icon head-users"></span>
          <span class="headmenu-label">Customers</span>
          </a>
          <ul class="dropdown-menu newusers">
               <!--<li class="nav-header">Add New Customer<</li>
              <li class="nav-header">Customer Listing</li>-->
               <li><a href="<?php echo $this->config->item('lnk_url');?>stock_report" target="_new"><span class="icon-align-left"></span>  <strong>Add New Customer</strong> <small class="muted"></small></a></li>
               <li><a href="<?php echo $this->config->item('lnk_url');?>stock_report" target="_new"><span class="icon-align-left"></span>  <strong>Customer Listing</strong> <small class="muted"></small></a></li>
              <!--<li>
                  <a href="">
                      <img src="images/photos/thumb2.png" alt="" class="userthumb" />
                      <strong>Shamcey Sindilmaca</strong>
                      <small>April 19, 2013</small>
                  </a>
              </li>
              <li>
                  <a href="">
                      <img src="images/photos/thumb3.png" alt="" class="userthumb" />
                      <strong>Nusja Paul Nawancali</strong>
                      <small>April 19, 2013</small>
                  </a>
              </li>
              <li>
                  <a href="">
                      <img src="images/photos/thumb4.png" alt="" class="userthumb" />
                      <strong>Rose Cerona</strong>
                      <small>April 18, 2013</small>
                  </a>
              </li>
              <li>
                  <a href="">
                      <img src="images/photos/thumb5.png" alt="" class="userthumb" />
                      <strong>John Doe</strong>
                      <small>April 16, 2013</small>
                  </a>
              </li>-->
          </ul>
      </li>
      <li class="odd">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
          <span class="count"></span>
          <span class="head-icon head-bar"></span>
          <span class="headmenu-label">Reports</span>
          </a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo $this->config->item('lnk_url');?>stock_report" target="_new"><span class="icon-align-left"></span>  <strong>Stock Report</strong> <small class="muted"></small></a></li>
              <li><a href="<?php echo $this->config->item('lnk_url');?>sales_report" target="_new"><span class="icon-align-left"></span>  <strong>Sales Report</strong> <small class="muted"></small></a></li>
              <li><a href="<?php echo $this->config->item('lnk_url');?>payment_report" target="_new"><span class="icon-align-left"></span>  <strong>Payment Report</strong> <small class="muted"></small></a></li>
             
          </ul>
      </li>
      <li>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="count"></span>
              <span class="head-icon head-backup"></span>
              <span class="headmenu-label">Backup</span>
          </a>
          <ul class="dropdown-menu">
              
              <li><a href="<?php echo $this->config->item('lnk_url');?>backup/create"><span class=""></span> <strong>Create Backup</strong> <small class="muted"></small></a></li>
             
          </ul>
             
      </li>
      

      <li class="right">
          <div class="userloggedinfo">
              <img src="<?php echo $this->config->item('profileWebPath').'/'.$this->session->userdata('profilePic'); ?>" alt="" />
              <div class="userinfo">
                  <h5 id="wishing" style="text-align:center;"></h5>
                  <h5><?php echo ucwords($this->session->userdata('SESSION_NAME')); ?><small>- <?php echo ucwords($this->session->userdata('email')); ?></small></h5>
                  <ul>
                      <li><a href="<?php echo $this->config->item('lnk_url');?>admin/profile">Edit Profile</a></li>
                      <li><a href="<?php echo $this->config->item('lnk_url');?>settings">Package Settings</a></li>
                      <li><a href="<?php echo $this->config->item('lnk_url');?>admin/out">Logout</a></li>
                  </ul>
              </div>
          </div>
      </li>
  </ul><!--headmenu-->
</div>
</div>
<script language="Javascript">
<!--

now = new Date
console.log(now.getHours());

if (now.getHours() >6 && now.getHours()< 12) {
jQuery("#wishing").html("Good Morning!");
}
else if (now.getHours() == 12) {
jQuery("#wishing").html("Good Day!");
}
else if (now.getHours() >12  && now.getHours()< 17) {
jQuery("#wishing").html("Good Afternoon!")
}
else if (now.getHours() >=17  && now.getHours()< 20) {
jQuery("#wishing").html("Good Afternoon!");
}
else {
jQuery("#wishing").html("Good Night!")
}
//-->
</script>
*/?>
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url('public/images/img.jpg') ?>" alt=""><?php /*echo $sessionUser['salutation'].' '.$sessionUser['firstname'].' '.$sessionUser['lastname']  */?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <!--<a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>-->
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="<?= base_url('dish2o_admin/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <!--<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>-->
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>