<?php 
	/**
	* 
	*/
	class Calculator
	{
		private $operands;

		private $operator;

		private $result;

		function setOperator(OperatorInterface $operator) {
			$this->operator = $operator;
		}

		function setOperands($operands) {
			$this->operands = $operands;
		}
		
		function calculate() {
			$this->result = $this->operator->run($this->operands);
		}

		function getResult() {
			return $this->result;
		}


	}
?>