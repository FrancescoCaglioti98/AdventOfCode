<?php


$test = "abcdef609043";
$md5 = ( md5( $test ) );

function verifyHash( $md5 ): bool
{

    $split = str_split( $md5 );

    foreach ( $split as $key => $value ) {
        if( $key < 6 && $value != 0 ) {
            return false;
        }
    }
    return true;

}


$number = 0;
$secretKey = "bgvyzdsv";
$isFive = false;
do {

    $newKey = $secretKey . $number;
    $md5 = md5( $newKey );

    if( verifyHash( $md5 ) ) {
        $isFive = true;
    } else {
        $number++;
    }

}while( !$isFive );

var_dump( $number );
var_dump( $isFive );

var_dump( md5( $secretKey . $number ) );
var_dump( verifyHash( $secretKey . $number ) );