<?php 
		
		function add($num1,$num2){
				$result = $num1 + $num2;
			return ($result);
		}
		
		function divide($number1,$number2){
			$result = $number1 / $number2;
			return $result;
		}
		
		echo divide(add(10,10),add(5,5));

?>
