
<html>
	<form id = "sub">
	  <label for="expression">Enter expression :</label>
	  <input type="text" id="expression" name="expression">
	  <br> <br>
	  <input type="submit" value="Calculate">
	</form>
 </html>
 <?php 

if(isset($_REQUEST['expression'])){
$entered_exp = $_REQUEST['expression'];

preg_match_all("/[a-z]/i", $entered_exp, $matches2);

if(sizeof($matches2[0]) == 0){
	
preg_match_all("/\+|\*|\-|\/|\d+/i", $entered_exp, $matches);

		if (in_array("*", $matches[0])){
			calculator($matches, "*");
		}elseif  (in_array("/", $matches[0])){
			calculator($matches, "/");
		 }elseif  (in_array("+", $matches[0])){
			calculator($matches, "+");
		  }elseif  (in_array("-", $matches[0])){
			calculator($matches, "-");
		   }
}else{
	echo "please don't enter character";
}
}

function calculator($array, $operation){
	
	for($i=0; $i < sizeof($array[0]); $i++){
		if($array[0][$i] == $operation){	
			calculator2($operation, $i, $array);
			break;
		}
	}
}




function calculator2($operation, $b, $array){
 switch($operation){
	 case "*":
		$res = $array[0][$b - 1] * $array[0][$b + 1];
		$array[0][$b - 1] = $res;
		array_splice($array[0],$b,2);
		
		if(in_array("*", $array[0])){
			 calculator($array,"*");
		}elseif  (in_array("/", $array[0])){
			 calculator($array,"/");
		 }elseif  (in_array("+", $array[0])){
			 calculator($array,"+");
		  }elseif  (in_array("-", $array[0])){
			 calculator($array,"-");
		   }
		
		break;
		
	case "/":
		$res = $array[0][$b - 1] / $array[0][$b + 1];
		$array[0][$b - 1] = $res;

		array_splice($array[0],$b,2);
		
		
		if (in_array("/", $array[0])){
			 calculator($array,"/");
		 }elseif  (in_array("+", $array[0])){
			 calculator($array,"+");
		  }elseif  (in_array("-", $array[0])){
			 calculator($array,"-");
		   }
		break;
		
	 case "+":
		$res = $array[0][$b - 1] + $array[0][$b + 1];
		$array[0][$b - 1] = $res;
		array_splice($array[0],$b,2);	

		if (in_array("+", $array[0])){
			 calculator($array,"+");
		}elseif  (in_array("-", $array[0])){
			 calculator($array,"-");
		 }	
		break;
		
	case "-":
	
		$res = $array[0][$b - 1] - $array[0][$b + 1];
		$array[0][$b - 1] = $res;
		array_splice($array[0],$b,2);	
		
		if(in_array("-", $array[0])){
			calculator($array,"-");
		}
		break;
	 
 }
 

 if(sizeof($array[0]) == 1){
	
	echo "Result :   ";
	echo $array[0][0];
	
	
	/* it create html file at local host folder but i don't now how to redirect it after calculation.
	 but back button works :) */
	$myfile = fopen("answer.html", "w") or die("Unable to open file!");
	$txt = "<html>";
	fwrite($myfile, $txt);
	fwrite($myfile, "Result is : ");
	fwrite($myfile, $array[0][0]);
	
	$txt = "<form action = 'http://localhost//'>
				<input type='submit' value='Back'>
			</form>";
	fwrite($myfile, $txt);
	$txt = "</html>";
	fwrite($myfile, $txt);
 }
}


?> 