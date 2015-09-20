<?
include_once("include/log_lua_cheia.php");
function reseta_cable($ln)
{

$cfgServer = "192.168.0.18";
$cfgPort    = 23;
$cfgTimeOut = 10;

$usenet = fsockopen($cfgServer, $cfgPort, $errno, $errstr, $cfgTimeOut);

if(!$usenet)
{
	echo "Connexion failed\n";
	exit();
}
else
{
	//CONECTA NO CMTS

	echo "Connected\n";
	sleep(2);
	fputs ($usenet, "edluise\r\n");
       	fputs ($usenet, "senha\r\n");
        fputs ($usenet, "enable\r\n");
	fputs ($usenet, "arris\r\n");

	//RESETA OS CMs

	foreach($ln as $mac)
	{

                $mac = chop($mac);
                //echo $mac . "\n";

        	fputs ($usenet, "clear cable modem $mac reset\r\n");
                gravalog("RESET_CABLE", "resetando cable $mac");

	}
       	fputs ($usenet, "exit\r\n");
	$erro=false;
	while(!feof($usenet))
	{
		$linha=fgets($usenet);
//		echo "$linha";
		if(strstr($linha, "Error"))
		{
			$erro = true;
		}
	}
}

echo "End.\r\n";
}

?>
