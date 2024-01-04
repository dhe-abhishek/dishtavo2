<?php /*
<div class="leftpanel no-print">

<div class="leftmenu">        
<ul class="nav nav-tabs nav-stacked">
<li class="nav-header">Navigation</li>
<li  class="<?php if($menu == 'dashboard') echo "active"; ?>"><a href="<?php echo $this->config->item('lnk_url');?>dashboard"><span class="iconfa-laptop"></span> Dashboard</a></li>
<li class="dropdown  <?php if($menu == 'billing') echo "active"; ?>"><a href=""><span class="iconfa-pencil"></span> Billing</a>
<ul  <?php if($menu == 'billing') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'addbill') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>billing/badd">New</a></li>
<li <?php if($submenu == 'billinginvoices') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>billing/invoices">Invoices</a></li>
<li <?php if($submenu == 'billinginvoices') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>pendingpayment/listing">Pending Payment</a></li>
</ul>
</li>
<!--<li class="dropdown  <?php if($menu == 'productcategory') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Product Category</a>
<ul <?php if($menu == 'productcategory') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'categorylisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>product/cat/">List categories</a></li>
<li <?php if($submenu == 'addcategory') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>product/cat/a">Add Category</a></li>
</ul>
</li>-->
<li class="dropdown  <?php if($menu == 'productcategory') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Product Category</a>
<ul <?php if($menu == 'productcategory') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'categorylisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>category/">List categories</a></li>

</ul>
</li>
<li class="dropdown  <?php if($menu == 'product') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span>Product Database</a>
<ul <?php if($menu == 'product') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'productlisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>product/listing">List</a></li>
<li <?php if($submenu == 'addproduct') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>product/addedit">Add New</a></li>
</ul>
</li>
<li class="dropdown  <?php if($menu == 'stock') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Stock</a>
<ul <?php if($menu == 'stock') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'stocklisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>stock">List</a></li>
<li <?php if($submenu == 'addstock') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>stock/addedit">Add</a></li>
</ul>
</li>

<li class="dropdown  <?php if($menu == 'client') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Customer</a>
<ul <?php if($menu == 'client') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'clientlisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>customer/listing">List</a></li>
<li <?php if($submenu == 'addclient') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>customer/addedit">Add</a></li>

<!--<li <?php if($submenu == 'searchclients') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>customer/ser">Search</a></li>
<li <?php if($submenu == 'exportclients') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>customer/exp">Export</a></li>-->
</ul>
</li>
<li class="dropdown  <?php if($menu == 'customerproducts') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Customer Products</a>
<ul <?php if($menu == 'customerproducts') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'customerproductslist') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>customerproducts/listing">List</a></li>
<li <?php if($submenu == 'addcustomerproduct') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>customerproducts/addeditcustomerproduct">Add Customer Products</a></li>

</ul>
</li>
<li class="dropdown  <?php if($menu == 'maintenance') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Machine Database</a>
<ul <?php if($menu == 'maintenance') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'maintenancelisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>maintenance/listing/">List</a></li>
<li <?php if($submenu == 'addmaintenance') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>maintenance/addedit">Add</a></li>
</ul>
</li>
<li class="dropdown <?php if($menu == 'notification') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Notification</a>
<ul <?php if($menu == 'notification') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'productexpiry') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>productexpiry">Product Expiry</a></li>
<li <?php if($submenu == 'reorder') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>reorder">Reorder Level</a></li>
<li <?php if($submenu == 'servicedue') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>servicedue">Service Due</a></li>
</ul>
</li>
<li class="dropdown  <?php if($menu == 'cities') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Cities</a>
<ul <?php if($menu == 'cities') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'citylisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>city/lst/">List</a></li>
<li <?php if($submenu == 'addcities') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>city/lst/a">Add</a></li>
</ul>
</li>
<li class="dropdown  <?php if($menu == 'manageusers') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Manage Users</a>
<ul <?php if($menu == 'manageusers') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'userlisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>user/lst/">List</a></li>
<li <?php if($submenu == 'addusers') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>user/lst/a">Add</a></li>
</ul>
</li>
<li class="dropdown  <?php if($menu == 'purchase') echo "active"; ?>"><a href=""><span class="iconfa-pencil"></span> Purchases</a>
<ul  <?php if($menu == 'purchase') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'newpo') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>purchase/badd">New</a></li>
<li <?php if($submenu == 'purchaseorders') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>purchase/invoices">Purchase orders</a></li>
</ul>
</li>
<li class="dropdown  <?php if($menu == 'sellers') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Sellers</a>
<ul <?php if($menu == 'sellers') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'sellerslisting') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>sellers/listing/">List</a></li>
<li <?php if($submenu == 'addsellers') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>sellers/addedit">Add</a></li>
</ul>
</li>
<li class="dropdown  <?php if($menu == 'sellerproducts') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Seller Products</a>
<ul <?php if($menu == 'sellerproducts') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'sellerproductslist') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>sellerproducts/listing">List</a></li>
<li <?php if($submenu == 'addsellerproduct') echo "class='active'"; ?>><a href="<?php echo $this->config->item('lnk_url');?>sellerproducts/addeditsellerproduct">Add Seller Products</a></li>

</ul>
</li>

<li class="dropdown  <?php if($menu == 'reports') echo "active"; ?>"><a href=""><span class="iconfa-th-list"></span> Reports</a>
<ul <?php if($menu == 'reports') echo "style='display:block;'"; ?>>
<li <?php if($submenu == 'stockreport') echo "class='active'"; ?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>stock_report">Stock Report</a></li>
<li <?php if($submenu == 'salesreport') echo "class='active'"; ?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>sales_report">Sales Report</a></li>
<li <?php if($submenu == 'paymentreport') echo "class='active'"; ?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>payment_report">Payment Report</a></li>
<li <?php if($PG=='hsnr'){?>class="mnuSel"<?php }?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>hsncode_summary_report">HSNCODE Summary Report</a></li>
<li <?php if($PG=='hsntr'){?>class="mnuSel"<?php }?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>hsncode_total_report">HSNCODE Total Report</a></li>
<li <?php if($PG=='productsalesreport'){?>class="mnuSel"<?php }?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>product_sales_report">Product Sales Report</a></li>
<li <?php if($PG=='product_category_sale_report'){?>class="mnuSel"<?php }?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>product_category_sale_report">Product Category Sale Report</a></li>

<li <?php if($PG=='p_and_l'){?>class="mnuSel"<?php }?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>p_and_l">Profit & Loss Report</a></li>
<li <?php if($PG=='Batch_product_sales_report'){?>class="mnuSel"<?php }?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>batch_product_sales_report">Batch Products sales report</a></li>
<li <?php if($submenu == 'product_purchase_report') echo "class='active'"; ?>><a target="_new" href="<?php echo $this->config->item('lnk_url');?>product_purchase_report">Product Purchase Report</a></li>
</ul>
</li>
<!--
<li><a href="buttons.html"><span class="iconfa-hand-up"></span> Buttons &amp; Icons</a></li>
<li class="dropdown"><a href=""><span class="iconfa-pencil"></span> Forms</a>
<ul>
<li><a href="forms.html">Form Styles</a></li>
<li><a href="wizards.html">Wizard Form</a></li>
<li><a href="wysiwyg.html">WYSIWYG</a></li>
</ul>
</li>
<li class="dropdown"><a href=""><span class="iconfa-briefcase"></span> UI Elements &amp; Widgets</a>
<ul>
<li><a href="elements.html">Theme Components</a></li>
<li><a href="bootstrap.html">Bootstrap Components</a></li>
<li><a href="boxes.html">Headers &amp; Boxes</a></li>
</ul>
</li>
<li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Tables</a>
<ul>
<li><a href="table-static.html">Static Table</a></li>
<li class="dropdown"><a href="table-dynamic.html">Dynamic Table</a></li>
</ul>
</li>
<li><a href="media.html"><span class="iconfa-picture"></span> Media Manager</a></li>
<li><a href="typography.html"><span class="iconfa-font"></span> Typography</a></li>
<li><a href="charts.html"><span class="iconfa-signal"></span> Graph &amp; Charts</a></li>
<li><a href="messages.html"><span class="iconfa-envelope"></span> Messages</a></li>
<li><a href="calendar.html"><span class="iconfa-calendar"></span> Calendar</a></li>
<li class="dropdown"><a href=""><span class="iconfa-book"></span> Other Pages</a>
<ul>
<li><a href="404.html">404 Error Page</a></li>
<li><a href="editprofile.html">Edit Profile</a></li>
<li><a href="invoice.html">Invoice Page</a></li>
<li><a href="discussion.html">Discussion Page</a></li>
</ul>
</li>
<li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Three Level Menu Sample</a>
<ul>
<li class="dropdown"><a href="">Second Level Menu</a>
<ul>
<li><a href="">Third Level Menu</a></li>
<li><a href="">Another Third Level Menu</a></li>
</ul>
</li>
</ul>
</li>
-->
</ul>
</div><!--leftmenu-->

</div><!-- leftpanel -->
*/?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="<?= base_url('dish2o_admin/home') ?>"><i class="fa fa-home"></i> Home <span class="fa"></span></a>
            </li>
            <li><a><i class="fa fa-edit"></i> Manage Colleges <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('dish2o_admin/colleges') ?>">List</a></li>
                    <li><a href="<?= base_url('dish2o_admin/colleges/addnew') ?>">Add New</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Manage Programmes <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('dish2o_admin/programmes') ?>">List</a></li>
                    <li><a href="<?= base_url('dish2o_admin/programmes/addnew') ?>">Add New</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Manage Faculty <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('dish2o_admin/faculties') ?>">List</a></li>
                    <li><a href="<?= base_url('dish2o_admin/faculties/addnew') ?>">Add New</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Manage Videos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('dish2o_admin/videos') ?>">List</a></li>
                    <li><a href="<?= base_url('dish2o_admin/videos/addnew') ?>">Add New</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="form.html">General Form</a></li>
                    <li><a href="form_advanced.html">Advanced Components</a></li>
                    <li><a href="form_validation.html">Form Validation</a></li>
                    <li><a href="form_wizards.html">Form Wizard</a></li>
                    <li><a href="form_upload.html">Form Upload</a></li>
                    <li><a href="form_buttons.html">Form Buttons</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="general_elements.html">General Elements</a></li>
                    <li><a href="media_gallery.html">Media Gallery</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="glyphicons.html">Glyphicons</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="tables.html">Tables</a></li>
                    <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="chartjs.html">Chart JS</a></li>
                    <li><a href="chartjs2.html">Chart JS2</a></li>
                    <li><a href="morisjs.html">Moris JS</a></li>
                    <li><a href="echarts.html">ECharts</a></li>
                    <li><a href="other_charts.html">Other Charts</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--<div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="e_commerce.html">E-commerce</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project Detail</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="page_403.html">403 Error</a></li>
                    <li><a href="page_404.html">404 Error</a></li>
                    <li><a href="page_500.html">500 Error</a></li>
                    <li><a href="plain_page.html">Plain Page</a></li>
                    <li><a href="login.html">Login Page</a></li>
                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#level1_1">Level One</a>
                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#level1_2">Level One</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                        class="label label-success pull-right">Coming Soon</span></a></li>
        </ul>
    </div>-->

</div>