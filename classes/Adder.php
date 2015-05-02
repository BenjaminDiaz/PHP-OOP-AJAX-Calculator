<?php 
	/**
	* 
	*/
	class Adder implements OperatorInterface
	{
		
		function run($firstOperand, $secondOperand){
			return (float)$firstOperand + $secondOperand;
		}
	}
?>