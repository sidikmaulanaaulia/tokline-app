
<aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('dashboard.show') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('produk.show') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-bookmark-plus
                  "></i
                  ><span class="hide-menu">Produk</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('kategori.show') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-chart-bar"></i
                  ><span class="hide-menu">Kategori</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('pengguna.show') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">Pengguna</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('order.show') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-cart"></i
                  ><span class="hide-menu">Order</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="tables.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">laporan</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-key"></i
                  ><span class="hide-menu">Settings</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="authentication-login.html" class="sidebar-link"
                      ><i class="mdi mdi-account"></i
                      ><span class="hide-menu">Profile</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="authentication-register.html" class="sidebar-link"
                      ><i class="mdi mdi-wallet"></i
                      ><span class="hide-menu"> My Balance </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="authentication-register.html" class="sidebar-link"
                      ><i class="mdi mdi-email"></i
                      ><span class="hide-menu">Inbox</span></a
                    >
                  </li>
                  <form action="/logout" method="post">
                    @csrf
                      <i class="fa fa-power-off me-1 ms-1"></i>
                      <button type="submit" name="submit">
                      logout
                      </button>
                  </form>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <div class="page-wrapper bg-white p-3">
          @yield('container')
        </div>
