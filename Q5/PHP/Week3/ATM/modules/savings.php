<?php

require_once "account.php";
 
class SavingsAccount extends Account 
{

	public function withdrawal($amount, $desc = " ") 
	{
		if ($this->balance-$amount >= 0) {
			$this->balance -= $amount;
			array_push($this->transactions, ["amount"=>$amount*-1,"desc"=>$desc, "time"=>date("Y-m-d h:i:sa"), "balance"=>$this->balance]);
			return true;
		} else {
			return false;
		}
	}

	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Savings Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	}
	
}
?>
