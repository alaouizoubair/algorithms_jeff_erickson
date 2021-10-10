<?php 

//Check if arguments contain at least 1 element

if(count($argv)<2){
    throw new Exception("The number of arguments is insufficiant");
}

//Launch timer with microtime

$time_pre = microtime(true);
$sorted_array = mergesort(array_map(fn($a)=> (int)$a,array_slice($argv,1,count($argv)-1)) );
$time_post = microtime(true);

print_result_time($sorted_array,$time_post - $time_pre);


//Printing result in well formated manner
function print_result_time($sorted_array, $time){
    echo("#################################\n");
    echo("The result is :\n");
    print_r($sorted_array);
    echo("Execution time in micro seconds : ".
        number_format($time,7,',',' ')." \n");
    echo("#################################\n");
}

//Mergesort main function
function mergesort($A){
    if(count($A)>1){
        if(count($A) %2 == 0){
            $m = count($A)/2;
        }else{
            $m = (count($A)+1)/2;
        }
        
        $A1 = mergesort(array_slice($A,0,$m));
        $A2 = mergesort(array_slice($A,$m));
        $A = merge($A1,$A2);
    }
    return $A;
}

//Merge function post dividing
function merge($A1,$A2){
    $i = 0;
    $j = 0;
    $k = 0;

    
    $B = array_fill(0,count($A1)+count($A2),0);

    while($i<count($A1) || $j <count($A2)){
        if($i>=count($A1)){
            $B[$k] = $A2[$j++];
        }else if($j>=count($A2)){
            $B[$k] = $A1[$i++];
        }else if($A1[$i] < $A2[$j]){
            $B[$k] = $A1[$i++];
        }else{
            $B[$k] = $A2[$j++];
        }
        $k++;
    }

    return $B;
}
