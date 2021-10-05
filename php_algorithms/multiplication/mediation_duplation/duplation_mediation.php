<?php 

//Check if arguments contain 2 valid numbers
if(count($argv)<3){
    throw new Exception("The number of arguments is insufficiant");
}

if(!ctype_digit($argv[1])  || !ctype_digit($argv[2])){
    throw new Exception("Parameters must be integers");
}

//Peasant multiplication algorithm
//Input: Two integers
//Output: One integer
function peasantmultiply(int $x,int $y):int{
    $prod = 0;
    while($x > 0){
        if( $x % 2 !=0){
            $prod = $prod + $y;
        }
        $x = $x/2;
        $y = $y + $y;
    }
    return $prod;
}


//Print to standard output the product of the two integers
//in the parameters
echo(peasantmultiply((int)$argv[1],(int)$argv[2])."\n");