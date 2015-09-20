
/* Voltar para a página anterior. */

function voltar() 
{
  window.history.back();
}

/* Mensagem de confirmação */

function confirmWnd(msg, url)
{
 if(confirm(msg)) {
   document.location = url;
 }
}

/* Função para fazer nada */
function nd() 
{
   void(0);
}


function checkUncheckAll(chk, checkname) {

  checks = document.getElementsByName(checkname);
  output = "";
  for(i = 0; i < checks.length; i++) {
	  checks[i].checked = chk.checked;
  }
}
