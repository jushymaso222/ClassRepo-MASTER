<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "style.css";?></style>
    <script src="https://kit.fontawesome.com/de1ce5e4ae.js" crossorigin="anonymous"></script>
    <title><?= $accountType; ?> Account</title>
</head>
<body>
    <header>
        <div>
            <h1 style="font-size: 16pt;"><?= $accountType . ' Account';?></h1>
            <p style="text-align: left;"><?= $number?></p>
        </div>
        <p id="openPopup">Make a Transation</p>
        <a href="index.php" class="link-undo"><i class="fa-solid fa-building-columns fa-2xl"></i></a>
    </header>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <?php
        if (isset ($_POST['selection']) && $_POST['selection'] == "withdraw" ) 
        {
            if ($accountType == "Checking") {
                $_SESSION["checking"]->withdrawal((float)$_POST['amount'],$_POST['reason']);
            } else {
                $_SESSION["savings"]->withdrawal((float)$_POST['amount'],$_POST['reason']);
            }
        } 
        else if (isset ($_POST['selection']) && $_POST['selection'] == "deposit") 
        {
            if ($accountType == "Checking") {
                $_SESSION["checking"]->deposit((float)$_POST['amount'],$_POST['reason']);
            } else {
                $_SESSION["savings"]->deposit((float)$_POST['amount'],$_POST['reason']);
            }
        }
    ?>

    <div id="popup" class="hidden">
        <form method="post">
            <p id="corner">X</p>
            <div class="custom-select" style="width:200px;">
                <select name="selection">
                    <option disabled selected>···</option>
                    <option value="withdraw">Withdraw</option>
                    <option value="deposit">Deposit</option>
                </select>
            </div>
            <div><input name="amount" inputmode="decimal" type="number" min="0.01" step=".01" placeholder="$100.00"></div>
            <div><input name="reason" type="text" placeholder="Description..."></div>
            <div><input type="submit" value="Submit" class="button"></div>
        </form>
    </div>

    <div id="transactions">
        <?= getTransactions($_SESSION["checking"], $_SESSION["savings"], $accountType) ?>
    </div>
    
    <script><?php include "select.js";?></script>
</body>
</html>