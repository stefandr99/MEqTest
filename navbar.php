<div class="nav-container">
    <nav class="navbar">
        <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars"></i>
        </span>
        <a href="index.html" class="logo">M&Sigma;q</a>
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="#" class="nav-links">Home</a>
            </li>

<?php
  session_start();
  if ( isset($_SESSION["loggedin"]) && isset($_SESSION["userid"]) ) { ?>
            <li>
                <a href="profilepage.php?id= <?php echo $_SESSION["userid"]?>" class="nav-links">Profile</a>
            </li>
            <li>
                <a href="php/userAccount/logout.php" class="nav-links">Logout</a>
            </li>
        </ul>
    </nav>
  </div>
  <?php } else {?>
            <li>
              <a href="php/userAccount/login.php" class="nav-links">Login</a>
            </li>
          </ul>
    </nav>
  </div> 
  <?php } ?>