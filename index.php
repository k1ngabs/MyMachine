<?php
session_start();
$loginDiv = file_get_contents('./login.html');
$accountDiv = file_get_contents('./userAccount.html');
$adminDiv = file_get_contents('./adminLink.html');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyMachine</title>
    <link rel="shortcut icon" href="images/2292112.svg" type="image/x-icon">
    <link rel="stylesheet" href="components/style.css" />
    <script src="scripts/main.js"></script>
  </head>
  <body>
    <div id="header" class="header">
      <div id="logo">
        <img src="images/2292112.svg" alt="" height="40px">
        <header>MyMachine</header>
      </div>
        <div class="search">
            <form action="search" method="get">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
            <input placeholder="Search" type="search" class="searchBar">
          </form>
        </div>
      <label class="switch">
        <input onclick="darkmode()" type="checkbox">
        <span class="slider"></span>
      </label>   
    </div>
      <div class="layout">
        
      <nav id="sidenav" class="sidenav">        
        
        <?php
        #Login Handler
        if(!isset($_SESSION['loggedIn'])){
          echo $loginDiv;
        }else{
          echo $accountDiv; 
          if($_SESSION['admin'] == 1){
          echo $adminDiv;
        }
        }
       
        ?>
      </nav>
      <main id="main">
        <div id="content">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis debitis
          sit eius provident libero quidem minima vero doloremque earum porro,
          quaerat molestiae sunt consectetur nostrum facilis. Nesciunt
          repellendus voluptatibus esse?
        </div>
      </main>
    <aside id="subcontent">
        <div>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis debitis
          sit eius provident libero quidem minima vero doloremque earum porro,
          quaerat molestiae sunt consectetur nostrum facilis. Nesciunt
          repellendus voluptatibus esse?
        </div>
      </aside>
    </div>
    <footer>
      <p>By Gabriel Carvalho</p>
    </footer>
  </body>
</html>
