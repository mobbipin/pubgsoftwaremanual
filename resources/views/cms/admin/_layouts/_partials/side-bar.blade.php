<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <!-- Users -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <span data-key="t-calendar">All Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.create') }}">
                                <span data-key=" t-chat">Create User</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Category -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.categories.index') }}">
                                <span data-key="t-calendar">All Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.create') }}">
                                <span data-key="t-chat">Create Category</span>
                            </a>
                        </li>
                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html" data-key="t-starter-page">Starter Page</a></li>
                        <li><a href="pages-maintenance.html" data-key="t-maintenance">Maintenance</a></li>
                        <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Coming Soon</a></li>
                        <li><a href="pages-timeline.html" data-key="t-timeline">Timeline</a></li>
                        <li><a href="pages-faqs.html" data-key="t-faqs">FAQs</a></li>
                        <li><a href="pages-pricing.html" data-key="t-pricing">Pricing</a></li>
                        <li><a href="pages-404.html" data-key="t-error-404">Error 404</a></li>
                        <li><a href="pages-500.html" data-key="t-error-500">Error 500</a></li>
                    </ul>
                </li>

                <li>
                    <a href="layouts-horizontal.html">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">Horizontal</span>
                    </a>
                </li>

                <li class="menu-title mt-2" data-key="t-components">Elements</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Components</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                        <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>
                        <li><a href="ui-cards.html" data-key="t-cards">Cards</a></li>
                        <li><a href="ui-carousel.html" data-key="t-carousel">Carousel</a></li>
                        <li><a href="ui-dropdowns.html" data-key="t-dropdowns">Dropdowns</a></li>
                        <li><a href="ui-grid.html" data-key="t-grid">Grid</a></li>
                        <li><a href="ui-images.html" data-key="t-images">Images</a></li>
                        <li><a href="ui-modals.html" data-key="t-modals">Modals</a></li>
                        <li><a href="ui-offcanvas.html" data-key="t-offcanvas">Offcanvas</a></li>
                        <li><a href="ui-progressbars.html" data-key="t-progress-bars">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions.html" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html" data-key="t-typography">Typography</a></li>
                        <li><a href="ui-video.html" data-key="t-video">Video</a></li>
                        <li><a href="ui-general.html" data-key="t-general">General</a></li>
                        <li><a href="ui-colors.html" data-key="t-colors">Colors</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="gift"></i>
                        <span data-key="t-ui-elements">Extended</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                        <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                        <li><a href="extended-sweet-alert.html" data-key="t-sweet-alert">SweetAlert 2</a></li>
                        <li><a href="extended-session-timeout.html" data-key="t-session-timeout">Session Timeout</a>
                        </li>
                        <li><a href="extended-rating.html" data-key="t-rating">Rating</a></li>
                        <li><a href="extended-notifications.html" data-key="t-notifications">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="box"></i>
                        <span class="badge rounded-pill bg-soft-danger text-danger float-end">7</span>
                        <span data-key="t-forms">Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                        <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                        <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                        <li><a href="form-editors.html" data-key="t-form-editors">Editors</a></li>
                        <li><a href="form-uploads.html" data-key="t-form-upload">File Upload</a></li>
                        <li><a href="form-wizard.html" data-key="t-form-wizard">Wizard</a></li>
                        <li><a href="form-mask.html" data-key="t-form-mask">Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="sliders"></i>
                        <span data-key="t-tables">Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html" data-key="t-basic-tables">Bootstrap Basic</a></li>
                        <li><a href="tables-datatable.html" data-key="t-data-tables">DataTables</a></li>
                        <li><a href="tables-responsive.html" data-key="t-responsive-table">Responsive</a></li>
                        <li><a href="tables-editable.html" data-key="t-editable-table">Editable</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-charts">Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html" data-key="t-apex-charts">Apexcharts</a></li>
                        <li><a href="charts-echart.html" data-key="t-e-charts">Echarts</a></li>
                        <li><a href="charts-chartjs.html" data-key="t-chartjs-charts">Chartjs</a></li>
                        <li><a href="charts-knob.html" data-key="t-knob-charts">Jquery Knob</a></li>
                        <li><a href="charts-sparkline.html" data-key="t-sparkline-charts">Sparkline</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="cpu"></i>
                        <span data-key="t-icons">Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                        <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                        <li><a href="icons-dripicons.html" data-key="t-dripicons">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="map"></i>
                        <span data-key="t-maps">Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>
                        <li><a href="maps-vector.html" data-key="t-v-maps">Vector</a></li>
                        <li><a href="maps-leaflet.html" data-key="t-l-maps">Leaflet</a></li>
                    </ul>
                </li>


                <!-- Settings -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="figma"></i>

                        <span data-key="t-blogs">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.setting.index') }}" data-key="t-Terms">Web Settings</a>
                        </li>
                        <li><a href="{{ route('admin.setting.roles.permission.index') }}" data-key="t-blogs">Roles
                                &#38; Permission Setting</a></li>
                        <li><a href="{{ route('admin.setting.social.media.index') }}" data-key="t-blogs">Social
                                Media
                                Setting</a></li>

                    </ul>
                </li>

            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
