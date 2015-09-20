<?php

function listacable($qtde,$plano_serv)
{

	//CRIA AS QUERYS DA LUACHEIA E DA MEIALUA

	$sql = "select MAC_CM from CM where ( ";
	for($i=0; $i < count($plano_serv) - 1 ;$i++)
	{
	  $sql .= "NR_PS='$plano_serv[$i]' OR ";
	}

	$sql .= " NR_PS='$plano_serv[$i]') AND status = 6";

	//CONECTA NO SERVIDOR

	$dbhandle = mssql_connect("192.168.0.1","login","senha");
        $mydb = mssql_select_db('GCM', $dbhandle);

	$resultado = mssql_query($sql);


	//PERCORRE POR LINHA NO BANCO
 	while ($mac = mssql_fetch_row($resultado))
	{
		$cables[] = "$mac[0]";
	}


	//FAZ O CÁLCULO DA QUANTIDADE DE PACOTES

        $lote = 0;
        $count = 1;

        $retorno = array();
        $retorno[$lote] = array();

        foreach($cables as $mac) {

          if( ($count % $qtde) == 0 )
          {
              $lote++;
              $retorno[$lote] = array();

          }

          $retorno[$lote][] = $mac;
          $count++;
        }


	$qtde_cms = count($cables);
	$qtde_pcte1 = bcdiv($qtde_cms, $qtde);
	$var = bcmul($qtde_pcte1, $qtde);
	$qtde_pcte2 = bcsub($qtde_cms, $var);

	//CRIA OS PACOTES
	$retorno=array();
	for($i=0;$i<=$qtde_pcte1;$i++)
	{
		$lote = array();
		for($j=0;$j<$qtde;$j++)
		{
			$buffer = $cables[$j];
			$lote[]=$buffer;
		}
	$retorno[]=$lote;
	}

	//USA O RESTO DA DIVISÃO PARA CRIAR O ÚLTIMO PACOTE
	$lote=array();
	for($i=0;$i<=$qtde_pcte2;$i++)
	{
		$buffer = $cables[$i];
		$lote[]=$buffer;
	}
	$retorno[]=$lote;


	mssql_close($dbhandle);

	return $retorno;
}
?>
