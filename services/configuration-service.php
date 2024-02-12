<?php
function option(string $name,$defaultValue=null)
{
    /** @var array $config */
    static $config=null;
    if($config===null)
    {
        $mconfig= require ROOT . '/config.php';
        if(file_exists( ROOT.'/config-local.php'))
        {
            $localconfig= require ROOT . '/config-local.php';
        }
        else{
            $localconfig=[];
        }
        $config=array_merge($mconfig,$localconfig);

    }
    if(array_key_exists($name,$config))
    {
        return $config[$name];
    }
    if($defaultValue!==null)
    {
        return $defaultValue;
    }
    throw new Exception("configuration option {$name}not found");
}