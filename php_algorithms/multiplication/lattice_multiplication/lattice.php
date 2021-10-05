<?php

//Check if arguments contain 2 valid numbers
if(count($argv)<3){
    throw new Exception("The number of arguments is insufficiant");
}

if(!ctype_digit($argv[1])  || !ctype_digit($argv[2])){
    throw new Exception("Parameters must be integers");
}


//Executes and displays result as string
echo fibonaccimultiply(array_reverse(str_split($argv[1])),
        array_reverse(str_split($argv[2])));

//Fibonacci function
//Input: Two arrays with single digits in left to right order
//Output: Integer containg the result of the product
function fibonaccimultiply($X,$Y){
    $Z = array_fill(0,count($X)+count($Y),0);
    $hold = 0;
    for($k=0;$k<=count($X)+count($Y)-1;$k++){
        for($i=0;$i<count($X);$i++){
            for($j=0;$j<count($Y);$j++){
                if($i+$j==$k){
                    $hold = $hold + $X[$i]*$Y[$j];
                }
            }
        }
        $Z[$k] = $hold % 10;
        $hold = $hold/10;
    }
    return (int)join(array_reverse($Z)); 

}
