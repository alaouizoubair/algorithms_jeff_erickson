<?php

//Check if arguments contain 1 valid numbers
if(count($argv)<2){
    throw new Exception("The number of arguments is insufficiant");
}

if(!ctype_digit($argv[1])){
    throw new Exception("Parameters must be integers");
}

//Declare constants
const A = 1;
const B = 2;
const N = 0;
$n = $argv[1]+2;
$T = array();
for($i=0;$i<$n;$i++){
    $t = array_fill(0,$n,0);
    array_push($T,$t);
}
for($i=1;$i<$n-1;$i++){
    $T[0][$i] = A;
    $T[$i][0] = B;
}

$record_A= array();
$record_B = array();

game_play(A,1,$T,$n);

function game_play($player,$level,$T0,$n){
    if($player == A){
        for($i=1;$i<$n-1;$i++){
            $T = $T0;
            $can_move = player_can_move($player,$i,$T,$n);
            if($can_move != 0 ){
                $T = move_token($player,$i,$T);
                display_T($level,$T,$n);
            }else{
                continue;
            }
            if(player_won(A, $level,$T,$n) == true){
                echo("Player A has won \n");
                array_push($GLOBALS['record_A'], $level);
            }else{
                game_play(B,$level+1,$T,$n);
            }        
        }
    }else{
        for($j=1;$j<$n-1;$j++){
            $T = $T0;
            $can_move = player_can_move($player,$j,$T,$n);
            if($can_move != 0 ){
                $T = move_token($player,$j,$T);
                display_T($level,$T,$n);
            }else{
                continue;
            }
            if(player_won(B, $level,$T,$n) == true){
                echo("Player B has won \n");
                array_push($GLOBALS['record_B'], $level);
                
            }else{
                game_play(A,$level+1,$T,$n);
            }  
        }
    }
    
}

function display_T($level,$T,$n){
    echo("##########################\n");
    echo("Level: ".$level."\n");
    for($i=0;$i<$n;$i++){
        echo(" | ");
        for($j=0;$j<$n;$j++){
            echo(" ".$T[$i][$j]." ");
        }
        echo(" | \n");
    }
    echo("Player A won : " . count($GLOBALS['record_A'])." times.\n");
    echo("Player B won : " . count($GLOBALS['record_B'])." times.\n");
}



function player_won($player, $level,$T,$n){
    if($player == A){
        for($i=1;$i<$n-1;$i++){
            if($T[$n-1][$i]==0){
                return false;
            }
        }
        return true;
    }else{
        for($i=1;$i<$n-1;$i++){
            if($T[$i][$n-1]==0){
                return false;
            }
        }
        return true;
    }
}

//Check if a token can move, if so, makes the move, otherwise, do nothing
function player_can_move($player,$line_column,$T,$n){
    if($player == A){
        //Start at the first line
        $i=0;
        //Search where the token is in the selected column
        while($T[$i][$line_column] != A ){
            $i++;
        }
        //Return false if the token is already in the last square
        if($i==$n-1){
            return 0;
        }

        if($T[$i+1][$line_column] == 0){
            //Return 1 if the next square is empty
            return 1;
        }elseif($T[$i+1][$line_column] == B && $T[$i+2][$line_column] == 0){
            //Return 2 if the next square is filled but the one after is empty
            return 2;
        }else{
            //Return 0 if the two squares ahead are filled
            return 0;
        }
    }else{
        //Start at the first column
        $j=0;
        //Search where the token is in the selected line
        while($T[$line_column][$j] != B ){
            $j++;
        }
        //Return false if the token is already in the last square
        if($j==$n-1){
            return 0;
        }

        if($T[$line_column][$j+1] == 0){
            //Return 1 if the next square is empty
            return 1;
        }elseif($T[$line_column][$j+1] == A && $T[$line_column][$j+2] == 0){
            //Return 2 if the next square is filled but the one after is empty
            return 2;
        }else{
            //Return 0 if the two squares ahead are filled
            return 0;
        }
    }
}

function move_token($player,$line_column,$T){
    if($player == A){
        //Start at the first line
        $i=0;
        //Search where the token is in the selected column
        while($T[$i][$line_column] != A ){
            $i++;
        }

        if($T[$i+1][$line_column] == 0){
            $T[$i+1][$line_column] = A;
            $T[$i][$line_column]= 0;
        }elseif($T[$i+1][$line_column] == B && $T[$i+2][$line_column] == 0){
            $T[$i+2][$line_column] = A;
            $T[$i][$line_column] = 0;
        }
        return $T;
    }else{
        //Start at the first column
        $j=0;
        //Search where the token is in the selected line
        while($T[$line_column][$j] != B ){
            $j++;
        }

        if($T[$line_column][$j+1] == 0){
            $T[$line_column][$j+1] = B;
            $T[$line_column][$j] = 0;
        }elseif($T[$line_column][$j+1] == A && $T[$line_column][$j+2] == 0){
            $T[$line_column][$j+2] = B;
            $T[$line_column][$j] = 0;
        }
        return $T;
    }
}
