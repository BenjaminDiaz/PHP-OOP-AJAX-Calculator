<?php 
	/**
	* 
	*/
	class Calculator
	{
		private $firstOperand;

		private $secondOperand;

		private $operator;

		private $result;

		function setOperator(OperatorInterface $operator) {
			$this->operator = $operator;
		}

		function setOperands($firstOperand, $secondOperand) {
			$this->firstOperand = $firstOperand;
			$this->secondOperand = $secondOperand;
		}
		
		function calculate() {
			$this->result = $this->operator->run($this->firstOperand, $this->secondOperand);
		}

		function getResult() {
			return $this->result;
		}


	}
?>