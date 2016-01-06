<div class="page-sidebar navbar-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu">
        <li class="sidebar-toggler-wrapper">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler">
            </div>
            <div class="clearfix">
            </div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
            <form class="search-form" role="form" action="http://www.keenthemes.com/preview/conquer/index.html" method="get">
                <div class="input-icon right">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control input-medium input-sm" name="query" placeholder="Search...">
                </div>
            </form>
        </li>
        <li class="start <?=($activeClass == "dashboard")?"active":"";?>">
            <a href="home.php?s=dashboard">
            <i class="fa fa-home"></i>
            <span class="title">
                Dashboard
            </span>
            </a>
        </li>
        <li class="<?=($activeClass == "requerimientos")?"active":"";?>">
            <a href="home.php?s=requerimientos">
            <i class="fa fa-search"></i>
            <span class="title">
            	Requerimientos
            </span>
            </a>
        </li>
        <?php
        if ( priv( 1 ) ) { //Agregar/Editar Requerimientos
        ?>
        <li class="<?=($activeClass == "proveedores")?"active":"";?>">
            <a href="home.php?s=proveedores">
            <i class="fa fa-user"></i>
            <span class="title">
            	Proveedores
            </span>
            </a>
        </li>
        <li class="<?=($activeClass == "usuarios")?"active":"";?>">
            <a href="home.php?s=usuarios">
            <i class="fa fa-user"></i>
            <span class="title">
            	Usuarios
            </span>
            </a>
        </li>
        <?php
        }
        ?>
        <!--<li class="">
            <a href="javascript:;">
            <i class="fa fa-bookmark"></i>
            <span class="title">
                UI Features
            </span>
            <span class="arrow ">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="ui_general.html">
                    General</a>
                </li>
                <li>
                    <a href="ui_buttons.html">
                    Buttons</a>
                </li>
                <li>
                    <a href="ui_typography.html">
                    Typography</a>
                </li>
                <li>
                    <a href="ui_modals.html">
                    Modals</a>
                </li>
                <li>
                    <a href="ui_extended_modals.html">
                    Extended Modals</a>
                </li>
                <li>
                    <a href="ui_tabs_accordions_navs.html">
                    Tabs, Accordions & Navs</a>
                </li>
                <li>
                    <a href="ui_toastr.html">
                    <span class="badge badge-warning">
                        new
                    </span>
                    Toastr Notifications</a>
                </li>
                <li>
                    <a href="ui_datepaginator.html">
                    <span class="badge badge-success">
                        new
                    </span>
                    Date Paginator</a>
                </li>
                <li>
                    <a href="ui_tree.html">
                    Tree View</a>
                </li>
                <li>
                    <a href="ui_nestable.html">
                    Nestable List</a>
                </li>
                <li>
                    <a href="ui_ion_sliders.html">
                    <span class="badge badge-important">
                        new
                    </span>
                    Ion Range Sliders</a>
                </li>
                <li>
                    <a href="ui_noui_sliders.html">
                    <span class="badge badge-success">
                        new
                    </span>
                    NoUI Range Sliders</a>
                </li>
                <li>
                    <a href="ui_jqueryui_sliders.html">
                    jQuery UI Sliders</a>
                </li>
                <li>
                    <a href="ui_knob.html">
                    Knob Circle Dials</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
            <i class="fa fa-table"></i>
            <span class="title">
                Form Stuff
            </span>
            <span class="arrow ">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="form_controls.html">
                    Form Controls</a>
                </li>
                <li>
                    <a href="form_layouts.html">
                    Form Layouts</a>
                </li>
                <li>
                    <a href="form_component.html">
                    Form Components</a>
                </li>
                <li>
                    <a href="form_editable.html">
                    <span class="badge badge-warning">
                        new
                    </span>
                    Form X-editable</a>
                </li>
                <li>
                    <a href="form_wizard.html">
                    Form Wizard</a>
                </li>
                <li>
                    <a href="form_validation.html">
                    Form Validation</a>
                </li>
                <li>
                    <a href="form_image_crop.html">
                    <span class="badge badge-important">
                        new
                    </span>
                    Image Cropping</a>
                </li>
                <li>
                    <a href="form_fileupload.html">
                    Multiple File Upload</a>
                </li>
                <li>
                    <a href="form_dropzone.html">
                    Dropzone File Upload</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
            <i class="fa fa-sitemap"></i>
            <span class="title">
                Pages
            </span>
            <span class="arrow ">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="page_inbox.html">
                    <span class="badge badge-important">
                        4
                    </span>
                    Inbox</a>
                </li>
                <li>
                    <a href="page_locked.html">
                    User Locked</a>
                </li>
                <li>
                    <a href="page_portfolio.html">
                    <span class="badge badge-warning badge-roundless">
                        new
                    </span>
                    Portfolio</a>
                </li>
                <li>
                    <a href="page_blog.html">
                    Blog</a>
                </li>
                <li>
                    <a href="page_blog_item.html">
                    Blog Post</a>
                </li>
                <li>
                    <a href="page_about.html">
                    About Us</a>
                </li>
                <li>
                    <a href="page_contact.html">
                    Contact Us</a>
                </li>
                <li>
                    <a href="page_calendar.html">
                    <span class="badge badge-important">
                        14
                    </span>
                    Calendar</a>
                </li>
                <li>
                    <a href="page_profile.html">
                    User Profile</a>
                </li>
                <li>
                    <a href="page_faq.html">
                    FAQ</a>
                </li>
                <li>
                    <a href="page_invoice.html">
                    Invoice</a>
                </li>
                <li>
                    <a href="page_pricing_table.html">
                    Pricing Tables</a>
                </li>
                <li>
                    <a href="page_404_option1.html">
                    404 Page Option 1</a>
                </li>
                <li>
                    <a href="page_404_option2.html">
                    404 Page Option 2</a>
                </li>
                <li>
                    <a href="page_500_option1.html">
                    500 Page Option 1</a>
                </li>
                <li>
                    <a href="page_500_option2.html">
                    500 Page Option 2</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
            <i class="fa fa-folder-open"></i>
            <span class="title">
                4 Level Menu
            </span>
            <span class="arrow ">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-cogs"></i> Item 1
                    <span class="arrow">
                    </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-user"></i>
                            Sample Link 1
                            <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#"><i class="fa fa-times"></i> Sample Link 1</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pencil"></i> Sample Link 1</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-edit"></i> Sample Link 1</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Sample Link 1</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-external-link"></i> Sample Link 2</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bell"></i> Sample Link 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-globe"></i> Item 2
                    <span class="arrow">
                    </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Sample Link 1</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-external-link"></i> Sample Link 1</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bell"></i> Sample Link 1</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-folder-open"></i>
                    Item 3 </a>
                </li>
            </ul>
        </li>
        <li class=" ">
            <a href="javascript:;">
            <i class="fa fa-th"></i>
            <span class="title">
                Data Tables
            </span>
            <span class="selected">
            </span>
            <span class="arrow open">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="table_basic.html">
                    Basic Tables</a>
                </li>
                <li>
                    <a href="table_responsive.html">
                    Responsive Tables</a>
                </li>
                <li>
                    <a href="table_managed.html">
                    Managed Tables</a>
                </li>
                <li>
                    <a href="table_editable.html">
                    Editable Tables</a>
                </li>
                <li class="active">
                    <a href="table_advanced.html">
                    Advanced Tables</a>
                </li>
                <li>
                    <a href="table_ajax.html">
                    Ajax Datatables</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
            <i class="fa fa-file-text"></i>
            <span class="title">
                Portlets
            </span>
            <span class="arrow ">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="portlet_general.html">
                    General Portlets</a>
                </li>
                <li>
                    <a href="portlet_draggable.html">
                    Draggable Portlets</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
            <i class="fa fa-map-marker"></i>
            <span class="title">
                Maps
            </span>
            <span class="arrow ">
            </span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="maps_google.html">
                    Google Maps</a>
                </li>
                <li>
                    <a href="maps_vector.html">
                    Vector Maps</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="charts.html">
            <i class="fa fa-bar-chart-o"></i>
            <span class="title">
                Visual Charts
            </span>
            </a>
        </li>
        <li class="last ">
            <a href="login.html">
            <i class="fa fa-user"></i>
            <span class="title">
                Login
            </span>
            </a>
        </li>-->
    </ul>
    <!-- END SIDEBAR MENU -->
</div>