<?php

abstract class Account 
{
	protected $accountId;
	protected $balance;
	protected $startDate;
	protected $transactions; //["desc" => "Test", "amount" => "100"]
	
	public function __construct ($id, $bal, $startDt) 
	{
	   $this->accountId = $id;
	   $this->balance = $bal;
	   $this->startDate = $startDt;
	   $this->transactions = array();
	}
	
	public function deposit ($amount, $desc = " ") 
	{
		$this->balance += $amount;
		$this->transactions[] = ["desc" => $desc,"amount"=> $amount, "time"=>date("Y-m-d h:i:sa"), "balance"=>$this->balance];
	}

	// This is an abstract method. 
	// This method must be defined in all classes
	// that inherit from this class
	abstract public function withdrawal($amount);
	
	public function getStartDate() 
	{
		return $this->startDate;
	}

	public function getBalance() 
	{
		return $this->balance;
	}

	public function getAccountId() 
	{
		return $this->accountId;
	}

	public function getTransactions() {
		return $this->transactions;
	}

	// Display AccountID, Balance and StartDate in a nice format
	protected function getAccountDetails()
	{
		$msg = "";
		$msg .= "ID: " . $this->accountId . "<br>";
		$msg .= "Balance: " . $this->balance . "<br>";
		$msg .= "Start Date: " . $this->startDate;
		return $msg;
	}
	
}

?>
