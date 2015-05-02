<?php 
	/**
	* 
	*/
	class Adder implements OperatorInterface
	{
		
		function run($operands){
			return (float)$operands[0] + $operands[1];
		}
	}
?>