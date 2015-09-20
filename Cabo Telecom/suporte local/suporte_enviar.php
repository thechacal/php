<?
//print_r($_SERVER);
require("inc/lib.inc.php");
include ("banco.inc");

conectar_banco() or die ("Erro ao acessar o servidor!");
function add_bug($resumo, $descricao, $gravidade,  $detalhes) {
$mbt = new mantis_bug_table();
$mbtt = new mantis_bug_text_table();
$mbtt->description = $descricao;
$mbtt->additional_information = $detalhes;

$mbtt->save();


$idt = $mbtt->getLastId();

$mbt->project_id =  "1"; //  GMD
$mbt->reporter_id = "5" ; // id do reporter
$mbt->handler_id = "2";  // id do eduardo
$mbt->duplicate_id = "0";
$mbt->priority = "30";
$mbt->severity = $gravidade;
$mbt->reproducibility =  "10";
$mbt->status = "50";
$mbt->resolution = "10";
$mbt->projection = "10";
$mbt->category = "Suporte ao usuário local";
$mbt->date_submitted = date("Y-m-d H:i:s");

$mbt->last_updated = date("Y-m-d H:i:s");
$mbt->eta =  "10";
$mbt->bug_text_id = $idt;
/*           [os] =>
            [os_build] =>
            [platform] =>
            [version] =>
            [fixed_in_version] =>
            [build] => */
$mbt->profile_id =  "0";
$mbt->view_state = "10";
$mbt->summary = $resumo;
$mbt->sponsorship_total = "0";
$mbt->sticky = "0";
$mbt->save();

$id = $mbt->getLastId();
return $id;
}


$nome = mysql_escape_string($_POST["nome"]);
$setores = $_POST["setores"];
$ramal = mysql_escape_string($_POST["ramal"]);
$gravidade = $_POST["gravidade"];
$resumo = mysql_escape_string($_POST["resumo"]);
$descricao = mysql_escape_string($_POST["descricao"]);
$ip = $_SERVER["REMOTE_ADDR"];

$detalhes = "NOME: $nome\nRAMAL: $ramal\nIP:$ip\n";

#$id = add_bug($resumo, $descricao, $gravidade, $detalhes);

$resultado=mysql_query("INSERT INTO chamados (depto,hora,ip,data,nome,ramal,gravidade,resumo,descricao) VALUES ('$setores',now(),'$ip',now(),'$nome','$ramal','$gravidade','$resumo','$descricao')");

$resultado=mysql_query("select id from chamados ");

while($linha=mysql_fetch_array($resultado)){
$id = $linha["id"];
}

$mail = new PHPMailer();
$mail->From     = "tickets@cabonatal.com.br";
$mail->FromName = "Tickets";
$mail->Host     = "mx.cabonatal.com.br";
$mail->Mailer   = "smtp";

$text_body  = "Olá Suporte Local,\n\n<br><br>";
$text_body .= "$nome cadastrou um ticket novo.\n\n<br>";
$text_body .= "<a href=\"http://suportelocal.cabonatal.com.br/detalhe.php?id=$id\">Clique aqui para visualizar o ticket.</a><br><br>";
$text_body .= "Obrigado!";
$mail->isHTML(true);
$mail->AddAddress("suportelocal@cabonatal.com.br", "Suporte Local");
$mail->Subject = "Ticket Aberto!!";
$mail->Body    = $text_body;


if(!$mail->Send())
{
   echo "Erro enviando e-mail.";
   exit;
}

$page = new Smarty();
$page->assign("nome", $nome);
$page->assign("bugid", $id);
$page->display("suporte_enviar.html");


?>
