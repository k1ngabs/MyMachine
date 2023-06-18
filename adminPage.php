<?php
session_start();
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
            <form action="" method="post">

            </form>
        </div>
        <div id="catAdmin">
            <form action="" method="post">
                
            </form>
        </div>
        <div id="userAdmin">
            <form action="logic.php" method="post">

            </form>
        </div>
    </div>
</body>
</html>
