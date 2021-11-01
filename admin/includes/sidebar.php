<div class="container-fluid row flex-nowrap px-0 d-flex">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 bg-dark px-3 row-second"> 
          <!-- col-auto col-md-2 col-lg-2 col-sm-3 px-sm-2 px-0 bg-dark -->
          <div
            class="
              d-flex
              flex-column
              align-items-center 
              align-items-sm-start
              text-white
              left-side
            "
          >
          <!--px-3
              pt-2 -->
            <a
              href="/"
              class="
                d-flex
                align-items-center
                pb-3
                mb-md-0
                me-md-auto
                text-white text-decoration-none
              "
            >
              <span class="fs-5 d-none d-sm-inline">Settings</span>
            </a>
            <ul
              class="
                nav nav-pills
                flex-column
                mb-sm-auto mb-0
                align-items-center align-items-sm-start
              "
              id="menu"
            >
              <!-- Home -->
              <li class="nav-item">
                <a href="index.php" class="nav-link align-middle px-0 main-link">
                  <i class="fa fa-home"></i>
                  <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
              </li>
              <!-- Dashboard -->
              <li class="nav-item">
                <a
                  class="nav-link px-0 align-middle main-link"
                >
                  <i class="fa fa-tachometer"></i>
                  <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
              </li>
              <!-- Order -->
              <li class="nav-item">
                <a href="#" class="nav-link px-0 align-middle main-link">
                <i class="fa fa-calendar"></i>
                  <span class="ms-1 d-none d-sm-inline">Orders</span></a
                >
              </li>
              <!-- Products -->
              <li class="nav-item">
                <a
                  href="product.php"
                  class="nav-link px-0 align-middle main-link"
                >
                  <i class="fa fa-inbox"></i>
                  <span class="ms-1 d-none d-sm-inline">Products</span>
                </a>
              </li>
              <!-- Category -->
              <li class="nav-item">
                <a
                  class="nav-link px-0 align-middle main-link"
                  href="#submenu1"
                  data-bs-toggle="collapse"
                >
                  <i class="fa fa-inbox"></i>
                  <span class="ms-1 d-none d-sm-inline">Category</span>
                </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="catadd.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Category Add</span> * </a>
                  </li>
                  <li>
                    <a href="catlist.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Category List</span> * </a>
                  </li>
                </ul>
              </li>
              <!-- Customers -->
              <li class="nav-item">
                <a href="#" class="nav-link px-0 align-middle main-link">
                  <i class="fa fa-users"></i>
                  <span class="ms-1 d-none d-sm-inline">Customers</span>
                </a>
              </li>
            </ul>
          </div>
        </div>