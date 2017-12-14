<?php


//Function formatDate

function formatDate($date){
    $date = date("F j, Y, g:i a", strtotime($date));
    return $date;
    
}
//Url Format funtction
function urlFormat($str){
    //strip out all white spaces
    $str = preg_replace('/\s*/', '', $str);
    //Convert the string to  all lowercase
    $str = strtolower($str);
    //url encode
    $str =urlencode($str);
    return $str;
}

//Add classname active if category is active 

function is_active($category){
    if(isset($_GET['category'])){
        if($_GET['category'] == $category){
            return 'active';
        }else{
            return '';
        }
    }else{
        if($category == null){
            return 'active';
        }
    }
}