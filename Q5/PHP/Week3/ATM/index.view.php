<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <script src="https://kit.fontawesome.com/de1ce5e4ae.js" crossorigin="anonymous"></script>
    <style><?php include "style.css";?></style>
</head>
<body>

    <header>
        <h1>Tax Evasion eBanking</h1>
        <i class="fa-solid fa-building-columns fa-2xl"></i>
    </header>
              
    <h2>Available Accounts</h2>
        <div class="wrapper">
            <a class="account-click" href="index.php?type=checking">
                <div class="account">
                    <div class="left-align">
                        <h3>Checking</h3>
                        <h4><?= $checkingAccountNumber?></h4>
                    </div>
                    <p class="right-align">$<?= round($_SESSION["checking"]->getBalance(), 2) ?></p>
                </div>
            </a>

            <a class="account-click" href="index.php?type=savings">
                <div class="account">
                    <div class="left-align">
                        <h3>Savings</h3>
                        <h4><?= $savingsAccountNumber?></h4>
                    </div>
                    <p class="right-align">$<?= round($_SESSION["savings"]->getBalance(), 2) ?></p>
                </div>
            </a>
        </div>
</body>
</html>