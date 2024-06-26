<?php
namespace Up\Services;
class HttpService
{
	public static function getMyUrl():string
	{
		$protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) === 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
		$server = $_SERVER['SERVER_NAME'];
		$port = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';
		return $protocol.$server.$port;
	}
}
