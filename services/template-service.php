<?php
function view(string $path,array $variables=[]):string
{
    if(!preg_match('/^[0-9A-Za-z\/_-]+$/',$path)) //validate input
    {
        throw new Exception('invalide template path');
    }
    $absolutePath=ROOT."/views/$path.php";
    if(!file_exists($absolutePath)) // validate if template doesnt exists
    {
        throw new Exception('invalid template path-not found');
    }
    extract($variables);
    ob_start(); //open buffer so file doesn't execute immediately
   require $absolutePath;
   $content=ob_get_clean(); //pass to variable
    return $content;
}
function escape(string $value):string{
    return(htmlspecialchars($value,ENT_QUOTES));
}
