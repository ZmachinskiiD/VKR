<?php
function escapeDoesExist(mysqli $connection,?string $doesExist=null):string
{
    $clause="1=1";
    if($doesExist!==null)
    {
        if($doesExist=="false")
        {
            $doesExist=false;
        }
        else if($doesExist==="true")
        {
            $doesExist=true;
        }
        if(is_bool($doesExist)) {
            $doesExist=(int)$doesExist;
            $clause = "doesExist={$doesExist}";
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
