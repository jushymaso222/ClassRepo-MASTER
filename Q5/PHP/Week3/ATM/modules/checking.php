<?php
 
require_once "account.php";

class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount, $desc = " ") 
	{
		if ($this->balance-$amount >= self::OVERDRAW_LIMIT) {
			$this->balance -= $amount;
			array_push($this->transactions, ["amount"=>$amount*-1,"desc"=>$desc, "time"=>date("Y-m-d h:i:sa"), "balance"=>$this->balance]);
			return true;
		} else {
			return false;
		}
	}

	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Checking Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	}
}

?>
