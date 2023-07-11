<?php
session_start();
include_once('components/functions.php');
include_once('components/connect.php');
$loginDiv = file_get_contents('./login.html');
$accountDiv = file_get_contents('./userAccount.html');


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="components/style.css" />
    <script src="scripts/main.js"></script>
</head>
<body>
    <div>
    <Header>MyMachine</Header>
    </div>
    <div class="adminBox">
        <div id="productAdmin">
            <form action="components/logic.php" method="post">
                <input type="text" name="search" placeholder="pesquise aqui">
                <input type="submit" name="searchProd">
            </form>
            <?php
                $prodId[] = [$_SESSION['prodId'], $_SESSION['prodId']];
                $prod = readProd($connect, $prodId);
                if (isset($_SESSION['prodId'])){?>
                <div id="updateProd">
                    <form action="components/logic.php" method="post">
                        <label for="username">Titulo:</label><input type="text" name="prodTitle" placeholder="<?php echo $prod['prodTitle']; ?>" required><br>
                        <label for="email">ID:</label><input type="text" name="prodId" placeholder="<?php echo $prod['prodId']; ?>" required><br>
                        <button type="submit" name="updateUser">Confirmar</button>
                        <button type="submit" name="deleteProd">Excluir Produto</button>
                    </form>
                </div>
            <?php } ?>
        </div>
        <div id="catAdmin">
            <form action="components/logic.php" method="post">
                
            </form>
        </div>
        <div id="userAdmin">
            <form action="logic.php" method="post">

            </form>
        </div>
    </div>
</body>
</html>
