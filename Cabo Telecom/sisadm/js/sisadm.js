function show_help()
{
  div_h = document.getElementById("depen");
  div_h.style.display = "";
}

function check_empty(field, fname)
{
    if(field.value == "")
	return "O campo " + fname + " nao pode ser vazio.\n";
    
    return "";
}

function validar_arquivo_digital()
{
    output = "";
    output += check_empty(document.getElementById("idcaixa"), "IDCAIXA");
    output += check_empty(document.getElementById("setores"), "SETORES");
    output += check_empty(document.getElementById("tipodoc"), "TIPODOC");
    output += check_empty(document.getElementById("conteudo"), "CONTEUDO");
    output += check_empty(document.getElementById("periodo"), "PERIODO");
    output += check_empty(document.getElementById("exercicio"), "EXERCICIO");

    if(output == "")
                return true;
    Boxy.alert('Preencha todos os campos!');

    return false;

}

function validar_senha2()
{
    output = "";
    output += check_empty(document.getElementById("password"), "PASSWORD");
    output += check_empty(document.getElementById("password2"), "PASSWORD2");

    if(output == "")
                return true;
    Boxy.alert('Preencha todos os campos!');

    return false;

}

function validar_senha() 
{
    output = "";
    output += check_empty(document.getElementById("login"), "LOGIN");
    output += check_empty(document.getElementById("password"), "PASSWORD");
    output += check_empty(document.getElementById("password2"), "PASSWORD2");
    output += check_empty(document.getElementById("fullname"), "FullName");
    output += check_empty(document.getElementById("email"), "EMAIL");
    
    if(output == "")
		return true;
    Boxy.alert('Preencha todos os campos!');
    
    return false;
  
}

function validar_faturas() 
{
    output = "";
    output += check_empty(document.getElementById("idcabo"), "IDCABO");
    output += check_empty(document.getElementById("nome"),"NOME");
    output += check_empty(document.getElementById("notafiscal"), "NOTAFISCAL");
    output += check_empty(document.getElementById("telefone"), "TELEFONE");
    output += check_empty(document.getElementById("vencimento"), "VENCIMENTO");    
    output += check_empty(document.getElementById("motivo"), "MOTIVO");    
    output += check_empty(document.getElementById("mes"), "MES");    
    if(output == "")
		return true;
    Boxy.alert('Preencha todos os campos!');
    
    return false;
  
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

function voltar()
{
	location.href = '../adicionar.php';
}

function inicio()
{
	location.href = '../index.php';
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
