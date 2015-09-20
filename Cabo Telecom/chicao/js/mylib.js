function janelaping (URL)
{
    window.open(URL,"janela1","width=680,height=300,scrollbars=NO,resizable=NO")
}

function checkpass(novasenha,confirmasenha)
{
    if(novasenha!=confirmasenha)
	alert("Campo senha diferente do campo confirmar senha!!!");
}

function check(pStrText){
	var	len = pStrText.length;
	var pos;
	var vStrnewtext = "";

	for (pos=0; pos<len; pos++){
		if (pStrText.substring(pos, (pos+1)) != " "){
			vStrnewtext = vStrnewtext + pStrText.substring(pos, (pos+1));
		}
	}

	if (vStrnewtext.length > 0)
		return false;
	else
		return true;
}

function listar()
{
	location.href = '../listagens.php';
}

function voltar()
{
	location.href = '../adicionar.php';
}

function inicio()
{
	location.href = '../index.php';
}

function checkform()
{
    
    if(check(document.formcadastro.idcabo.value))
    {
	alert("Por favor preencha o ID Cabo!");
	document.formcadastro.idcabo.focus();
	return false;
    }
    if(check(document.formcadastro.nome.value))
    {
	alert("Por favor preencha o nome do cliente!");
	document.formcadastro.nome.focus();
	return false;
    }
    if(check(document.formcadastro.telefone.value))
    {
	alert("Por favor preencha o telefone do cliente!");
	document.formcadastro.telefone.focus();
	return false;
    }
    if(check(document.formcadastro.slap.value))
    {
	alert("Por favor preencha o bloco/apto!");
	document.formcadastro.slap.focus();
	return false;
    }
    if(check(document.formcadastro.mac.value))
    {
	alert("Por favor preencha o mac da placa!");
	document.formcadastro.mac.focus();
	return false;
    }
}

function checkformusuario()
{
    
    if(check(document.formatualizausuario.novasenha.value))
    {
	alert("Por Favor Preencha a Nova Senha!");
	document.formatualizausuario.novasenha.focus();
	return false;
    }
    if(check(document.formatualizausuario.confirmasenha.value))
    {
	alert("Por Favor Confirme a Nova Senha!");
	document.formatualizausuario.confirmasenha.focus();
	return false;
    }
}

function format(src, mask)
{

    var i = src.value.length;
    var out = mask.substring(0,1);
    var text = mask.substring(i)

    if (text.substring(0,1) != out)
    {
	src.value += text.substring(0,1);
    }
}

function textCounter(field, countfield, maxlimit)
{
    if (field.value.length > maxlimit)
	field.value = field.value.substring(0, maxlimit);
    else 
	countfield.value = maxlimit - field.value.length;
}

function limpa()
{
    document.formcadastro.reset();
}

function editar(id)
{
	location.href = '../editar.php?id='+id;
}

function detalhe(id)
{
	location.href = '../detalhe.php?id='+id;
}

function restrito(id)
{
	location.href = '../restrito/editar.php?id='+id;
}

function excluir(id)
{
	location.href = '../restrito/excluir.php?id='+id;
}

function comandos(id)
{
	location.href = '../comandos_server.php?id='+id;
}

function novapesquisa()
{
	location.href = '../busca.php';
}

function checamac()
{
    var resposta;

    resposta=confirm("Este mac ja esta cadastrado, continuar mesmo assim?");
    if(resposta==true)
	return true;
    else
	location.href="adicionar.php";
}
