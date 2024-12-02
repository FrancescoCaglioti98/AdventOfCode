<?php
/** @var array $data */
include_once "./InputData/Day3_InputData.php";

$xPositionSanta = 0;
$yPositionSanta = 0;
$xPositionRoboSanta = 0;
$yPositionRoboSanta = 0;

$arVisitedHousesSanta = [
    "0.0" => 1
];
$arVisitedHousesRoboSanta = [
    "0.0" => 1
];

$isSanta = true;
foreach ( $data as $newMove ) {

    if( $isSanta ) {
        $xPosition = $xPositionSanta;
        $yPosition = $yPositionSanta;
    } else {
        $xPosition = $xPositionRoboSanta;
        $yPosition = $yPositionRoboSanta;
    }

    switch ( $newMove ) {
        case '^':
            $xPosition++;
        break;
        case '>':
            $yPosition++;
        break;
        case '<':
            $yPosition--;
        break;
        case 'v':
            $xPosition--;
        break;
    }

    $newPosition = $xPosition . "." . $yPosition;


    if( $isSanta ) {
        $arVisitedHousesSanta[$newPosition] = 1;
        $xPositionSanta = $xPosition;
        $yPositionSanta = $yPosition;
    } else {
        $arVisitedHousesRoboSanta[$newPosition] = 1;
        $xPositionRoboSanta = $xPosition;
        $yPositionRoboSanta = $yPosition;
    }

    $isSanta = !$isSanta;
}

var_dump( count($arVisitedHousesRoboSanta) );
var_dump( count($arVisitedHousesSanta) );


foreach ( $arVisitedHousesRoboSanta as $key => $value ) {
    $arVisitedHousesSanta[$key] = $value;
}

var_dump( count( $arVisitedHousesSanta ) );