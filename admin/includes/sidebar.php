<style>
  /* Main sidebar background and text */
.main-sidebar {
  background-color: #2b3944 !important;
  color: #ffffff !important;
}

/* Brand logo background and text */
.brand-link {
  background-color: #2b3944 !important;
  color: #ffffff !important;
  font-family:"Arial";
}

/* Sidebar menu links */
.nav-sidebar .nav-link {
  color: #ffffff !important;
  font-family:"Arial";
}

.nav-sidebar .nav-link:hover {
  background-color: #1f2a32 !important;
  color: #ffffff !important;
}

/* Active menu item */
.nav-sidebar .nav-link.active {
  background-color: #1f2a32 !important;
  color: #ffffff !important;
  font-weight: bold;
  font-family:"Arial";
}

/* Sidebar icons */
.nav-sidebar .nav-icon {
  color: #ffffff !important;
}

/* User panel text */
.user-panel a, .user-panel p {
  color: #ffffff !important;
}

/* Sidebar search input */
.form-control-sidebar {
  background-color: #3b4a56 !important;
  color: #ffffff !important;
  border: none;
}

.form-control-sidebar::placeholder {
  color: #d0d0d0 !important;
}

/* Search button */
.btn-sidebar {
  background-color: #4b5a66 !important;
  color: #ffffff !important;
  border: none;
}
</style>

<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->

  <a href="index3.html" class="brand-link">

      <span class="brand-text fw-bold text-white" style="font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;Cogent Industry Rajkot</span>


  </a>



  <!-- Sidebar -->

  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <!--this div is for admin username-->

      

      </div>



    <!-- SidebarSearch Form -->

    <div class="form-inline">

      <div class="input-group" data-widget="sidebar-search">

        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

        <div class="input-group-append">

          <button class="btn btn-sidebar">

            <i class="fas fa-search fa-fw"></i>

          </button>

        </div>

      </div>

    </div>



    <!-- Sidebar Menu -->

    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

        <li class="nav-item menu-open">



          <ul class="nav nav-treeview">

            

            <li class="nav-item">

              <a href="./" class="nav-link ">

                <i class="fas fa-tachometer-alt nav-icon"></i>

                <p>Dashboard</p>

              </a>

            </li>



            <li class="nav-item">

              <a href="./category.php" class="nav-link ">

                <i class="fas fa-th-large nav-icon"></i>

                <p>Category</p>

              </a>

            </li>
            



            <li class="nav-item">

              <a href="./subcategory.php" class="nav-link">

                <i class="fab fa-buffer nav-icon"></i>

                <p>Sub Category</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="./product.php" class="nav-link">

                <i class="fab fa-product-hunt nav-icon"></i>

                <p>Product</p>

              </a>

            </li>


            
            



            <li class="nav-item">

              <a href="./slider.php" class="nav-link">

                <i class="fas fa-cog nav-icon"></i>

                <p>Slider Options</p>

              </a>

            </li>
            
            <li class="nav-item">

              <a href="./aboutus.php" class="nav-link">

                <i class="fas fa-envelope nav-icon"></i>

                <p>About Us</p>

              </a>

            </li>

             <li class="nav-item">

              <a href="./site-setting.php" class="nav-link">

                <i class="fas fa-envelope-open-text nav-icon"></i>

                <p>Contact Us</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="./choose_us.php" class="nav-link">

                <i class="fas fa-newspaper nav-icon"></i>

                <p>Why Choose Us</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="./what_say.php" class="nav-link">

                <i class="fas fa-newspaper nav-icon"></i>

                <p>Client Say</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="./inquiry.php" class="nav-link">

                <i class="fas fa-newspaper nav-icon"></i>

                <p>Inquiry</p>

              </a>

            </li>



          </ul>

        </li>

      </ul>

    </nav>

    <!-- /.sidebar-menu -->

  </div>

  <!-- /.sidebar -->

</aside>