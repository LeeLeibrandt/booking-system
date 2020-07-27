<?php
function cost($param, $param2, $param3, $param4, $param5){
    /*$param : array of hotels, 
    $param2 : string evaluates to "name" of hotel (property of Hotel), 
    $param3 : post super global as hotel1, 
    $param4 : days booked, 
    $param5 : string "daily"*/
    foreach($param as $var){
        if($var->$param2 === $param3){
            return $var->$param5 * $param4;
        } 
    }    
}
    
//accepts array of hotels, hotel1, hotel2, property name of Hotel    
function compareHotelsMain($param, $param1, $param2, $param3){
    $compareHotelsArr = array();    
    foreach($param as $var){
        if($var->$param3 === $param1 || $var->$param3 === $param2){    
            array_push($compareHotelsArr, $var);
        }
    }
    return $compareHotelsArr;
}
    
function selectedHotel($param, $param2, $param3){
    if($param[0]->$param2 === $param3){
        return $param[0];
    }else{
        return $param[1];
    }
} 

function totalCost($param1, $param2, $param3){
    if($param1->$param2 === $param3){
        return $_SESSION['cost1'];
    }else{
        return $_SESSION['cost2'];
    }
}  