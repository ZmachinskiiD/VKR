<?php
function getSquaresCount(float $raiting):array
{
    return([floor($raiting),10-floor($raiting)]);
}
function minutesToHoursAndMinutes(float $duration):string
{
    $hourPart=(string)((int)($duration/60));
    $minutePart=(string)($duration-$hourPart*60);
    $hourPart="0".$hourPart;//Ожидаем что фильм меньше 10часов
    if(strlen($minutePart)===1)
    {
        $minutePart="0".$minutePart;
    }
    $newDuration=$hourPart.":".$minutePart;
   return $newDuration;
}
function truncate(string $text,?int $maxLength=null):string
{
    if($maxLength===null)
    {
        return $text;
    }
    $cropped=substr($text,0,$maxLength);
    if($cropped!==$text)
    {
        return "$cropped...";
    }
    return $text;
}
