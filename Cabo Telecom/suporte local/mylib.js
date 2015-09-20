function ticketsativos()
{
	location.href = 'tickets_ativos.php';
}
function check_empty(field, fname)
{
    if(field.value == "") return "O campo " + fname + " nao pode ser vazio.\n";
    return "";
}

function validar_form() 
{
    output = "";
    output += check_empty(document.getElementById("solucao"), "SOLUCAO");
    if(output == "")
	return true;
    alert('Erros encontrados:\n' + output);

return false;
}

