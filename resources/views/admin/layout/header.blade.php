  <!DOCTYPE html>
  <html dir="ltr" lang="en">
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta
        name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
      />
      <meta
        name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
      />
      <meta name="robots" content="noindex,nofollow" />
      <title>Tokline</title>
      <!-- Favicon icon -->
      <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="../assets/images/favicon.png"
      />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="../assets/images/favicon.png"
      />
      <!-- Custom CSS -->
      <link
        rel="stylesheet"
        type="text/css"
        href="../assets/extra-libs/multicheck/multicheck.css"
      />
      <link
        href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
        rel="stylesheet"
      />
      <link href="../dist/css/style.min.css" rel="stylesheet" />

      <!-- Custom CSS -->
      <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
      <!-- Custom CSS -->
      <link href="../dist/css/style.min.css" rel="stylesheet" />
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    </head>

    <body>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin5"
        data-sidebartype="full"
        data-sidebar-position="absolute"
        data-header-position="absolute"
        data-boxed-layout="full"
      >
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
          <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
              <!-- ============================================================== -->
              <!-- Logo -->
              <!-- ============================================================== -->
              <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon ps-2">
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  <img
                    src="../assets/images/logo-icon.png"
                    alt="homepage"
                    class="light-logo"
                    width="25"
                  />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text ms-2">
                  <!-- dark Logo text -->
                   Tokline
                </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                <!-- </b> -->
                <!--End Logo icon -->
              </a>
              <!-- ============================================================== -->
              <!-- End Logo -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Toggle which is visible on mobile only -->
              <!-- ============================================================== -->
              <a
                class="nav-toggler waves-effect waves-light d-block d-md-none"
                href="javascript:void(0)"
                ><i class="ti-menu ti-close"></i
              ></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div
              class="navbar-collapse collapse"
              id="navbarSupportedContent"
              data-navbarbg="skin5"
            >
              <!-- ============================================================== -->
              <!-- toggle and nav items -->
              <!-- ============================================================== -->
              <ul class="navbar-nav float-start me-auto">
                <li class="nav-item d-none d-lg-block">
                  <a
                    class="nav-link sidebartoggler waves-effect waves-light"
                    href="javascript:void(0)"
                    data-sidebartype="mini-sidebar"
                    ><i class="mdi mdi-menu font-24"></i
                  ></a>
                </li>

              </ul>
              <!-- ============================================================== -->
              <!-- Right side toggle and nav items -->
              <!-- ============================================================== -->
              <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                  <ul
                    class="
                      dropdown-menu dropdown-menu-end
                      mailbox
                      animated
                      bounceInDown
                    "
                    aria-labelledby="2"
                  >
                    <ul class="list-style-none">
                      <li>
                        <div class="">
                          <!-- Message -->
                          <a href="javascript:void(0)" class="link border-top">
                            <div class="d-flex no-block align-items-center p-10">
                              <span
                                class="
                                  btn btn-info btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "
                                ><i class="mdi mdi-settings fs-4"></i
                              ></span>
                              <div class="ms-2">
                                <h5 class="mb-0">Settings</h5>
                                <span class="mail-desc"
                                  >You can customize this template</span
                                >
                              </div>
                            </div>
                          </a>
                          <!-- Message -->
                          <a href="javascript:void(0)" class="link border-top">
                            <div class="d-flex no-block align-items-center p-10">
                              <span
                                class="
                                  btn btn-primary btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "
                                ><i class="mdi mdi-account fs-4"></i
                              ></span>
                              <div class="ms-2">
                                <h5 class="mb-0">Pavan kumar</h5>
                                <span class="mail-desc"
                                  >Just see the my admin!</span
                                >
                              </div>
                            </div>
                          </a>
                          <!-- Message -->
                          <a href="javascript:void(0)" class="link border-top">
                            <div class="d-flex no-block align-items-center p-10">
                              <span
                                class="
                                  btn btn-danger btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "
                                ><i class="mdi mdi-link fs-4"></i
                              ></span>
                              <div class="ms-2">
                                <h5 class="mb-0">Luanch Admin</h5>
                                <span class="mail-desc"
                                  >Just see the my new admin!</span
                                >
                              </div>
                            </div>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </ul>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                  <a
                    class="
                      nav-link
                      dropdown-toggle
                      text-muted
                      waves-effect waves-dark
                      pro-pic
                    "
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img
                      src="../assets/images/users/1.jpg"
                      alt="user"
                      class="rounded-circle"
                      width="31"
                    />
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-end user-dd animated"
                    aria-labelledby="navbarDropdown"
                  >
                    <a class="dropdown-item" href="/profile-admin"
                      ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
                    >
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                      @csrf
                        <i class="fa fa-power-off me-1 ms-1"></i>
                        <button type="submit" name="submit">
                        logout
                        </button>
                    </form>
                    <div class="dropdown-divider"></div>
                    <div class="ps-4 p-10">
                      <a
                        href="/profile-admin"
                        class="btn btn-sm btn-success btn-rounded text-white"
                        >View Profile</a
                      >
                    </div>
                  </ul>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
              </ul>
            </div>
          </nav>
        </header>
          @include('admin.layout.sidebar')
        </div>
        {{-- SWEET ALERT --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
      <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
      <!--Wave Effects -->
      <script src="../dist/js/waves.js"></script>
      <!--Menu sidebar -->
      <script src="../dist/js/sidebarmenu.js"></script>
      <!--Custom JavaScript -->
      <script src="../dist/js/custom.min.js"></script>
      <!--This page JavaScript -->
      <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
      <!-- Charts js Files -->
      <script src="../assets/libs/flot/excanvas.js"></script>
      <script src="../assets/libs/flot/jquery.flot.js"></script>
      <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
      <script src="../assets/libs/flot/jquery.flot.time.js"></script>
      <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
      <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
      <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
      <script src="../dist/js/pages/chart/chart-page-init.js"></script>
      <!-- this page js -->
      <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
      <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
      <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
      <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
      </script>
    </body>
  </html>
