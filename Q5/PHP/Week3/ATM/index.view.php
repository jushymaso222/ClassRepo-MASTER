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
              
    <h2>Accounts</h2>
        <div class="wrapper">
            <a class="account-click" href="index.php?type=checking">
                <div class="account">
                    <div class="left-align">
                        <h3>Checking</h3>
                        <h4><?= $checkingAccountNumber?></h4>
                    </div>
                    <p class="right-align">$100.00</p>
                </div>
            </a>

            <a class="account-click" href="index.php?type=savings">
                <div class="account">
                    <div class="left-align">
                        <h3>Savings</h3>
                        <h4><?= $savingsAccountNumber?></h4>
                    </div>
                    <p class="right-align">$100.00</p>
                </div>
            </a>
        </div>
</body>
</html>

<!--
<div class="wrapper">
            
            <div class="account">
              
                    
                    <div class="accountInner">
                        <input type="text" name="checkingWithdrawAmount" value="" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="checkingDepositAmount" value="" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            
            </div>

            <div class="account">
               
                    
                    <div class="accountInner">
                        <input type="text" name="savingsWithdrawAmount" value="" />
                        <input type="submit" name="withdrawSavings" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="savingsDepositAmount" value="" />
                        <input type="submit" name="depositSavings" value="Deposit" /><br />
                    </div>
            
            </div>
            
        </div>
-->