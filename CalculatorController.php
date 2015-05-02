<?php
	/**
	* 
	*/
	function my_autoloader($class) {
    	include 'classes/' . $class . '.php';
	}
	spl_autoload_register('my_autoloader');

	$c = new Calculator();

	$data = $_GET;

	if (isset($data['firstOperand']) && isset($data['secondOperand'])) {
		$operands = array($data['firstOperand'], $data['secondOperand']);
		$c->setOperands($operands);
	}

	if (isset($data['operator'])) {
		switch ($data['operator']) {
			case 'adder':
			$c->setOperator(new Adder());
			break;
			case 'subtractor':
			$c->setOperator(new Substractor());
			break;
		}
	}
	
	$c->calculate();
	echo $c->getResult();
?>