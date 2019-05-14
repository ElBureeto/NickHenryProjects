<?php
require 'loadGamePageInfo.php';

echo '
       <header>
                  <nav>

                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo"><img src="../Images/gameHubLogo.png" alt= "GameHub"></div>

                        <div class="menu">
                              <ul>
                                    <li>
                                    
                                    <form method="POST" class="search-container"><input type="text" name="gameName" placeholder="Search...">
                                    <input type="SUBMIT" 
                                    name="submit" value="Search" class="searchBttn"></form>
                                    
                                    </li>
                                    
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="test.php">Checkout</a></li>
                                    <li><div class="dropdown">
    <button class="dropbtn">Account 
      
    </button>
    <div class="dropdown-content">
    <a class="logout" href="admin.php">Admin</a>
        <a class="logout" href="changeInfo.php">Information</a>
      <a class="logout" href="logout.php">Logout</a>
    </div>
  </div></li>
                              </ul>
                        </div>
                  </nav>
        </header>'
?>



