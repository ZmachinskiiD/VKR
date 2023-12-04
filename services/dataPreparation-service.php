<?php
//Функция для получения и обработки GET ключа. Использовать только в случае если значение ключа в двух вариантах
function getToString(mysqli $connection, ?string $getVariabale=null, ?string $variableName=null):string
{
    $clause="1";
    if($getVariabale!==null)
    {
        if($getVariabale==="false")
        {
            $getVariabale=false;
        }
        else if($getVariabale==="true")
        {
            $getVariabale=true;
        }
        if(is_bool($getVariabale)) {
            $getVariabale=(int)$getVariabale;
          $clause = "{$variableName}={$getVariabale}";
        }
    }
    return $clause;
}
function checkIfIdExists(?string $id,array $movies):bool
{
    if($id===null )
    {
        return false;
    }
    if(array_search($id, array_column($movies, 'id')) !== false)
    {
        return true;
    }
    return false;
}
