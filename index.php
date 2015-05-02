<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP AJAX Calculator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="assets/css/jumbotron-narrow.css" rel="stylesheet">
	<style type="text/css">
		#result{
			width: 100%;
			margin-bottom: 5px;
		}
		.btn {
			width:23%;
			margin-bottom: 5px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<li role="presentation" class="active"><a href="#">Home</a></li>
					<li role="presentation"><a href="#">About</a></li>
					<li role="presentation"><a href="#">Contact</a></li>
				</ul>
			</nav>
			<h3 class="text-muted">OOP PHP AJAX Calculator</h3>
		</div>
		<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="text" class="" id="result" placeholder="0" readonly>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">7</button>
					<button class="btn btn-default numberBtn" type="submit">8</button>
					<button class="btn btn-default numberBtn" type="submit">9</button>
					<button id="divider" class="btn btn-default operatorBtn" type="submit">/</button>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">4</button>
					<button class="btn btn-default numberBtn" type="submit">5</button>
					<button class="btn btn-default numberBtn" type="submit">6</button>
					<button id="multiplier" class="btn btn-default operatorBtn" type="submit">x</button>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">1</button>
					<button class="btn btn-default numberBtn" type="submit">2</button>
					<button class="btn btn-default numberBtn" type="submit">3</button>
					<button id="substractor" class="btn btn-default operatorBtn" type="submit">-</button>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">0</button>
					<button class="btn btn-default floatBtn" type="submit">.</button>
					<button class="btn btn-default resultBtn" type="submit">=</button>
					<button id="adder" class="btn btn-default operatorBtn" type="submit">+</button>
				</div>
		</div>
		<div class="row marketing">
			
		</div>
		<footer class="footer">
			<p>More projects at <a href="https://github.com/BenjaminDiaz">https://github.com/BenjaminDiaz</a></p>
		</footer>

	</div> <!-- /container -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
	
	var isFloat = false; //True if result is float, else False
	var operator = '';
	var operatorPressed = false; //True if last button pressed was an operator, else False
	var resultPressed = false; //True if last button pressed was result button (=), else False
	var firstOperand = '';
	var secondOperand = '';
	function ajaxGetResult(firstOperandAjax, secondOperandAjax, operatorAjax) {
		//alert(firstOperandAjax);
    	$.ajax({
    		type: 'GET',
    		url: 'CalculatorController.php',
    		data: 'firstOperand=' + firstOperandAjax + '&secondOperand=' + secondOperandAjax + '&operator=' + operatorAjax,
    		success: function(response){    			
    			$("#result").val(response);
    			firstOperand = response;
    		}
    	});

    };
    $(document).ready(function() {
    	$("#result").val('');
	});
	$(".numberBtn").click(function() {
		if (operatorPressed) {
			$("#result").val('');
		};
		oldResult = $("#result").val();
		newResult = oldResult += $(this).html();
	   	$("#result").val(newResult);
	   	operatorPressed = false;
    });

    $(".floatBtn").click(function() {
		if (!isFloat) {			
			if ($("#result").val() == "" || operatorPressed) {
				$("#result").val(0+$(this).html());
				operatorPressed = false;
			}
			else {
				$("#result").val($("#result").val()+$(this).html());
			}
	   		isFloat = true;
		}
    });
    $(".operatorBtn").click(function() {
    	if (!operatorPressed && firstOperand != '') {
    		secondOperand = $("#result").val();
    		ajaxGetResult(firstOperand, secondOperand, operator);

    	};
    	operatorPressed = true;
    	firstOperand = $("#result").val();
    	operator = $(this).attr("id");
    	isFloat = false;
    	resultPressed = false;
    });
    $(".resultBtn").click(function() {
    	if (!resultPressed && firstOperand) {
    		secondOperand = $("#result").val();
    		ajaxGetResult(firstOperand, secondOperand, operator);
    		resultPressed = true;
    		operatorPressed = true;
    	};
    });
    

   

</script>
</body>
</html>