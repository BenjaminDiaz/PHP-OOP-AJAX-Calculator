<?php 
$c = new Calculator();
$data = $_GET;
if (isset($data['firstOperand'])) {
	$c->setFirstOperand($data['firstOperand']);
}
if (isset($data['secondOperand'])) {
	c->setSecondOperand($data['secondOperand']);
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
}

function getResult() {
	return $this->result;
}


}

$operation = new Operation($_GET);
echo $operation.getResult();
?>