<?php
include_once('components/functions.php');
include_once('components/connect.php');
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
    
  </head>
  <body onload="qlqrDesgrassa()">
    <div id="header" class="header">
      <div id="logo">
        <img src="images/2292112.svg" alt="" height="40px">
        <header>MyMachine</header>
      </div>
        <div class="search">
            <form action="search" method="get">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
            <input placeholder="Search" type="search" class="searchBar" id="search" onkeypress="fetchAndRenderProducts()">
          </form>
        </div>
      <label class="switch">
        <input id="darkModeToggle" type="checkbox" >
        <span class="slider"></span>
      </label>   
    </div>
      <div class="layout">
        
      <nav id="sidenav" class="sidenav">
        
      <input hidden="" class="check-icon" id="check-icon" name="check-icon" type="checkbox" onclick="collapseNav()">
            <label class="icon-menu" for="check-icon">
                <div class="cor1 bar bar--1"></div>
                <div class="cor1 bar bar--2"></div>
                <div class="cor1 bar bar--3"></div>
            </label>
        <div id="internNav">
          <?php
        #Login Handler
        if(!isset($_SESSION['loggedIn'])){
          echo $loginDiv;
        }else{?>
          <div>
          <input onclick="collUpdateUser()" checked="checked" type="checkbox">
  <form action="components/logic.php" method="post" name="logout">
    <button class="genBtn" name="logout" type="submit">Sair</button>
  </form>
  <div>
    <?php
      $userId = [$_SESSION['userId']];
      $user = readUser($connect, $userId);

      if(empty($user)){
        session_destroy();
      }else{
        ?>
          <section>
            <p>Bem-Vindo, <?php echo $user['username']; ?>!</p>
          </section>
        <?php
          }
        ?>
      </div>
    </div>
      <?php
          if($_SESSION['admin'] == 1){
            echo $adminDiv;
          }
        }    
      ?>
    </div>
    <div id="updateUser" class="displayN">
        <form action="components/logic.php" method="post">
          <label for="username">Usuário:</label><input type="text" name="username" placeholder="<?php echo $user['username']; ?>" required><br>
          <label for="email">Email:</label><input type="email" name="email" placeholder="<?php echo $user['email']; ?>" required><br>
          <label for="password">Senha:</label><input type="password" name="password" placeholder="***********" required><br>
          <button type="submit" name="updateProd">Confirmar</button>
        </form>
        <form action="components/logic.php" method="post">
          <button type="submit" name="deleteUser">Excluir Conta</button>
        </form>
    </div>
    <div class="userLists" id="userLists">
        <?php
        if(isset($_SESSION['loggedIn'])){
          $userList[] = readLists($connect, $userId);
          foreach($userList as $userList){
            print_r($userList);
          }
        }
        ?>
    </div>       
      </nav>
      <main id="main">
        <div class="content" id="maincontent">
          <div id="capture">
            <form action="components/logic.php" method="post" id="listProduct">
              <?php
              if(isset($_SESSION['loggedIn'])){?>
              <button class="genBtn" type="submit" name="savelist">Salvar Lista</button><?php }
              ?>
              <button class="genBtn" type="button" onclick="gerarCanva()">Gerar PDF</button>
              <p id="valorTotal"></p>
            </form>
          </div>
        </div>
      </main>
    <aside  class="content" id="aside">
      
    <label class="container">
  <input onclick="collapseAside()" checked="checked" type="checkbox">
  <div class="checkmark"></div>
</label>
    <!-- <button type="button"  class="collapseBtn">Collapse</button> -->
        <div  id="productBox" class="productBox">
  <ul id="productList" class="product-list"></ul>
        
        </div>
      </aside>
      <div id="test">

      </div>
    </div>
    <!-- <footer>
      <p>By Gabriel Carvalho</p>
    </footer> -->
  </body>
  <script src="scripts/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</html>
