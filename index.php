<?php

  session_start();

  if (isset($_SESSION['useruid'])) {

    // Do Nothing

  }

?>

<!DOCTYPE html>

<html lang="en">

    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
        <link rel="stylesheet" href="./assets/css/style.index.css">
        
        <title>Index</title>
    
    </head>

    <body>

        <!-- partial:index.partial.html -->
        <div class="menu-btn" onclick="toggleHamburgerMenu(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
    
        <div class="container">
    
        <!-- Nav -->
        <nav class="main-nav">
            
            <img src="assets/images/index/logo/logo.png" alt="logo" class="logo">
        
            <ul class="main-menu">
              <li><a href="#Anchor">Anchor</a></li>
              <li><a href="#Tags">Tags</a></li>
              <li><a href="#Links">Links</a></li>
              <li><a href="#Navigate">Navigate</a></li>
              <li><a href="#Multiple">Multiple</a></li>
              <li><a href="#Pages">Pages</a></li>
              <li><a href="#Sections">Sections</a></li>
            </ul>
        
            <ul class="right-menu">
              
              <?php
        
                if (isset($_SESSION['userid'])) {
        
                  ?>
        
                    <li>
                      <a href="profile.php?user=<?php echo $_SESSION['useruid']; ?>">
                        <i class="fas fa-user"></i>
                      </a>
                    </li>
                    
                    <li>
                      <a href="includes/signout.inc.php">
                        Signout
                      </a>
                    </li>
        
                  <?php
                 
                } else {
        
                  ?>
        
                    <li>
                      <a href="login.php">
                        Login
                      </a>
                    </li>  
        
                    <li>
                      <a href="signup.php">
                        Signup
                      </a>
                    </li>
        
                  <?php
        
                }
        
              ?>
        
            </ul>
        
        </nav>
    
        <!-- Showcase -->
        <header class="header">
            
            <br>
            
            <?php
            
                echo "<div style='text-align: left'> Welcome " . $_SESSION['useruid'] . "</div>";
            
            ?>
    
            <br>
            <br>
    
            <h1>Header</h1>
            
            <br>
            <br>
    
        </header>
    
        <!-- Home cards 1 -->
        <section body>
           
            <div id="Anchor"> <h2>Anchor</h2> </div>
            
            <br>
            <br>
            <br>
            <br>
    
            <div id="Tags"> <h2>Tags</h2> </div>
            
            <br>
            <br>
            <br>
            <br>
            
            <div id="Links"> <h2>Links</h2> </div>
            
            <br>
            <br>
            <br>
            <br>
            
            <div id="Navigate"> <h2>Navigate</h2> </div>
            
            <br>
            <br>
            <br>
            <br>
            
            <div id="Multiple"> <h2>Multiple</h2> </div>
            
            <br>
            <br>
            <br>
            <br>
            
            <div id="Pages"> <h2>Pages</h2> </div>
            
            <br>
            <br>
            <br>
            <br>
            
            <div id="Sections"> <h2>Sections</h2> </div>
            
            <br>
            <br>
    
        </section>
    
        <!-- Footer -->
        <footer class="footer">
    
          <div class="footer-inner">
            
            <div>
              <i class="fas fa-globe fa-2x"></i> English (American)
            </div>
              
              <ul>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Privacy & Cookies</a></li>            
                <li><a href="#">&trade; Trademarks</a></li>
                <li><a href="#">&copy; <?php echo date("Y/m/d"); ?></a></li>
              </ul>
    
          </div>
    
        </footer>
    
        <!-- partial -->
        <script  src="./assets/js/script.index.js"></script>

  </body>

</html>