          <!-- Navbar -->
          <nav class="navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
              </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <!-- Navbar Search -->
              <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                  <form class="form-inline" action="index.php">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar bg-gray" type="search" placeholder="Search" aria-label="Search" name="name" value="<?php echo $_REQUEST['name']??''; ?>">
                      <input type="hidden" name="module" value="products">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" id="cartIcon">
                  <i class="fa fa-cart-plus" aria-hidden="true"></i>
                  <span class="badge badge-danger navbar-badge" id="badgeProduct"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listCart" >
                </div>
              </li>
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                  <?php
                    if( isset($_SESSION['idClient'])==false ){
                  ?>
                  <a href="login.php" class="dropdown-item">
                    <i class="fas fa-door-open mr-2 text-primary"></i> Log in
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="register.php" class="dropdown-item">
                      <i class="fas fa-sign-in-alt mr-2 text-primary"></i> Register
                  </a>
                  <?php
                    }else{
                      ?>
                        <a href="index.php?module=user" class="dropdown-item">
                          <i class="fas fa-user mr-2 text-primary"></i>Hello <?php echo $_SESSION['nameClient']; ?>
                        </a>
                        <form action="index.php" method="post">
                          <button name="action" class="btn btn-danger dropdown-item" type="submit" value="close">
                            <i class="fas fa-door-closed mr-2 text-danger"></i>Log off
                          </button>
                        </form>
                      <?php
                    };
                  ?>
                </div>
              </li>
            </ul>
          </nav>
          <?php
            $message=$_REQUEST['message']??'';
            if($message){
              ?>
                <div class="alert alert-primary alert-dismissable fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <?php echo $message; ?>
                </div>
              <?php
            }
          ?>
