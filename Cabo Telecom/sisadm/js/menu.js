//©Xara Ltd
if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)default.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}

var bd=0
document.write("<style type=\"text/css\">");
document.write("\n<!--\n");
document.write(".default_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#1c437b;position:absolute;left:0px;top:0px;visibility:hidden;}");
document.write(".default_plain, a.default_plain:link, a.default_plain:visited{text-align:left;background-color:#1c437b;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Verdana, Arial, Helvetica, sans-serif;}");
document.write("a.default_plain:hover, a.default_plain:active{background-color:#8cc5d5;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Verdana, Arial, Helvetica, sans-serif;}");
document.write("a.default_l:link, a.default_l:visited{text-align:left;background:#1c437b url("+loc+"default_l.gif) no-repeat right;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Verdana, Arial, Helvetica, sans-serif;}");
document.write("a.default_l:hover, a.default_l:active{background:#8cc5d5 url("+loc+"default_l2.gif) no-repeat right;color: #000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Verdana, Arial, Helvetica, sans-serif;}");
document.write("\n-->\n");
document.write("</style>");

var fc=0x000000;
var bc=0x8cc5d5;
if(typeof(frames)=="undefined"){var frames=0;}

startMainMenu("",0,0,2,0,0)
mainMenuItem("default_b1",".gif",24,83,"secured_page.php","_parent","Consultas",2,2,"default_plain");
mainMenuItem("default_b2",".gif",24,83,"secured_page.php","_parent","Consultas",2,2,"default_plain");
endMainMenu("",0,0);

startSubmenu("default_b1","default_menu",204);
mainMenuItem("default_b1_1","Lista de Usuários",0,0,"users.php","","",1,1,"default_plain");
mainMenuItem("default_b1_2","Lista de Banidos",0,0,"banlist.php","","",1,1,"default_plain");
mainMenuItem("default_b1_2","Alterar Senha Pessoal",0,0,"change_pass.php","","",1,1,"default_plain");
mainMenuItem("default_b1_3","Sair",0,0,"logout.php?saindo=1","","",1,1,"default_plain");
endSubmenu("default_b1");

startSubmenu("default_b2","default_menu",204);
mainMenuItem("default_b2_1","Notas de Crédito ou Débito",0,0,"notas_cred_deb.php","","",1,1,"default_plain");
mainMenuItem("default_b2_2","Reenvio de Faturas",0,0,"javascript:;","","",1,1,"default_l");
mainMenuItem("default_b2_3","Devolução de Equipamentos",0,0,"devolucao_equipamentos.php","","",1,1,"default_plain");
mainMenuItem("default_b2_4","Solicitação de Desconexão",0,0,"solicitacao_desconexao.php","","",1,1,"default_plain");
mainMenuItem("default_b2_5","Anulação de Desconexão",0,0,"anulacao_desconexao.php","","",1,1,"default_plain");
mainMenuItem("default_b2_6","Suspensão Total dos Serviços",0,0,"suspensao_total_servicos.php","","",1,1,"default_plain");
mainMenuItem("default_b2_7","Solicitação de uso USB",0,0,"declaracao_usb.php","","",1,1,"default_plain");
mainMenuItem("default_b2_8","Transfer&ecirc;ncia de Titularidade",0,0,"transferencia_titularidade.php","","",1,1,"default_plain");
mainMenuItem("default_b2_9","Débito Programado",0,0,"debito_programado.php","","",1,1,"default_plain");
mainMenuItem("default_b2_10","Arquivo Digital",0,0,"javascript:;","","",1,1,"default_l");
mainMenuItem("default_b2_11","Receita Federal",0,0,"javascript:;","","",1,1,"default_l");
mainMenuItem("default_b2_12","UFRNET",0,0,"http://www.ufrnet.br/cabo/","_blank","",1,1,"default_plain");
endSubmenu("default_b2");

startSubmenu("default_b2_2","default_menu",105);
submenuItem("Solicitar Reenvio","reenvio_faturas.php","","default_plain");
submenuItem("Listar Solicitações","listagem_reenvio_faturas.php","","default_plain");
submenuItem("Baixar Solicitações","baixar_faturas.php","","default_plain");
endSubmenu("default_b2_2");

startSubmenu("default_b2_10","default_menu",105);
submenuItem("Cadastrar Caixa","cadastrar_caixa.php","","default_plain");
submenuItem("Listagem de Caixas","listagem_arquivo_digital.php","","default_plain");
endSubmenu("default_b2_10");

startSubmenu("default_b2_11","default_menu",114);
submenuItem("Situação do CNPJ","http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp","_blank","default_plain");
submenuItem("Situação do CPF","http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/CPF/ConsultaPublica.asp","_blank","default_plain");
endSubmenu("default_b2_11");

loc="";
