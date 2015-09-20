$(function(){

	// abas
	// oculta todas as abas

	$("div.tab-content").hide();

	// mostra somente  a primeira aba
	$("div.tab-content:first").show();
	
	// seta a primeira aba como selecionada (na lista de abas)
	$("#abas a:first").each(function(){
		opc = $(this).attr('class');
		$(this).removeClass(opc);
		$(this).addClass(opc+'-selecionado');
	});

	// quando clicar no link de uma aba
	$("#abas a").click(function(){

		// oculta todas as abas
		$("div.tab-content").hide();
			
		// tira a sele��o da aba atual
		$("#abas a").each(function(){
			opc = $(this).attr('class');
			var classe = opc.split("-selecionado");
			if(classe[1] != undefined){
				$(this).removeClass(opc);
				$(this).addClass(classe[0]);
			}
		});
      
   
		// adiciona a classe selected na selecionada atualmente
		var opc2 = $(this).attr('class');
		$(this).addClass(opc2+"-selecionado");
      
		// mostra a aba clicada
		$($(this).attr("href")).show();
      
		// pra nao ir para o link
		return false;
	});

	$(".select_outrascidades").click(function(){
		$('.outras-cidades-list').slideToggle();
	});

	$(".select_outrascidades2").click(function(){
		$('.outras-cidades-list2').slideToggle();
	});
	
	$(".cidade").click(function(){
		$('#cidades').slideToggle();
	});
	
	$("#cidades").click(function(){
		$(this).slideUp();
	});
	
	$("a.bt-login").click(function(){
		$('.form-login').slideToggle();
	});
	
	$("a.bt-minhaconta").click(function(){
		$('.minhaconta').slideToggle();
	});
	
	$('#email,#email2').click(
			function(){		
				if (($(this).val() == 'E-mail')) {
					$(this).val('');
				}
			}
			
		);
		
	$('#email,#email2').blur(
			function(){			
				if ($(this).val() == '') {
					var element;
					switch($(this).attr('id')){
						case 'email': element = 'E-mail'; break;
						case 'email2': element = 'E-mail'; break;
					}
					$(this).attr('value',element);
				}
			}
		);

	$('.round-oferta').corner();
	
    $('.DateNascimento').mask('99/99/9999')
    $('.Telefone').mask('(99) 9999-9999');
    $('.CEP').mask('99999-999');
    $('.CPF').mask('999.999.999-99');
    $('.Login').button({
          icons:{
                primary: 'ui-icon-locked'
          }
    });
    $('.Enviar').button();
    $('.Cadastrar').button();
    
    $("#numero_utilizadores").change(function () {
        var qtd = "";
        $("#numero_utilizadores option:selected").each(function () {
        	
        	qtd = $(this).text();
        	var i;
        	$('.utilizadores').html('');
        	$('.text-total').html('');
        	$('.compra-footer .text-preco').html('');

	        for(i=0; qtd>i; i++)
	        	if(i==0)
	   	        	$('.utilizadores').html('<tr class="utilizador"><td>Nome de quem vai usar:</td><td><input type="text" name="utilizador[]" /></td></tr>');
	        	else
	        		$('.utilizadores').append('<tr class="utilizador"><td>Nome de quem vai usar:</td><td><input type="text" name="utilizador[]" /></td></tr>');
        	
        	var preco = $('.text-preco').html();
        	var total = $('.text-total').html();
        	var desc = $('.espaco_form-compra h2').html();
        	
        	var p = parseFloat(preco.replace(",", "."));
        	var t = parseFloat(total.replace(",", "."));
        	
        	var soma = p*qtd;
        	soma = ((Math.round(soma*100))/100)+'';
        	
           	var values = soma.split(".");
           	var v1 = parseFloat(values[0]);
           	if(!values[1]) values[1] = 0;
           	var v2 = zeroPad(values[1],2);
        	
        	$('.text-total').append(v1+','+v2);
        	$('.compra-footer .text-preco').append(v1+','+v2);
        	
        	$('input[name = "preco"]').val(preco.replace(",", ""));
        	$('input[name = "quantidade"]').val(qtd);
        	$('input[name = "descricao"]').val(desc);
        	
        });
    }).trigger('change');

    $('.utilizadores').html('<tr class="utilizador"><td>Nome de quem vai usar:</td><td><input type="text" name="utilizador[]" /></td><td></td></tr>');
    
    $('a.add').click(function(){

    		var total = $(this).html();
    		var qtd = 0;
    		$('.utilizador').each(function(i){
    			qtd++;
    		});
    		
       		$("#numero_utilizadores").val(qtd+1);
        		
           	$('.text-total').html('');
           	$('.compra-footer .text-preco').html('');
            	
           	var preco = $('.text-preco').html();
           	var total = $('.text-total').html();
           	var desc = $('.espaco_form-compra h2').html();
            	
           	var p = parseFloat(preco.replace(",", "."));
           	var t = parseFloat(total.replace(",", "."));
            	
           	var soma = p*(qtd+1);
           	soma = ((Math.round(soma*100))/100)+'';
            	
           	var values = soma.split(".");
           	var v1 = parseFloat(values[0]);
           	if(!values[1]) values[1] = 0;
           	var v2 = zeroPad(values[1],2);
           	
           	$('.text-total').html('');
           	$('.compra-footer .text-preco').html('');
        		
           	$('input[name = "preco"]').val('');
           	$('input[name = "quantidade"]').val('');
           	$('input[name = "descricao"]').val('');
           	$('.text-quantidade').html('');
           	
           	$('.text-total').append(v1+','+v2);
           	$('.compra-footer .text-preco').append(v1+','+v2);
        		
           	$('input[name = "preco"]').val(preco.replace(",", ""));
           	$('input[name = "quantidade"]').val(qtd+1);
           	$('input[name = "descricao"]').val(desc);
           	$('.text-quantidade').html(qtd+1);
           	
      		$('.utilizadores').append('<tr class="utilizador '+(qtd+1)+'"><td>Nome de quem vai usar:</td><td><input type="text" name="utilizador[]" /></td><td><img src="/public/css/images/del.png" onclick="javascript:remove('+(qtd+1)+');"></td></tr>');
      	    
    });
    $( ".DataTable .disabled" ).button({ disabled: true });
    $('.DataTable .imprimir-registro').button({
        icons:{
              primary: 'ui-icon-print'
        },
        text:false
    });
    $('table.DataTable').dataTable({
        bJQueryUI: true,
        sPaginationType: "full_numbers",
        bStateSave: true,
        oLanguage: {
              sProcessing: "Carregando...",
              sEmptyTable: "Nenhum registro encontrado na tabela",
              sInfoPostFix: "",
              sSearch: "Buscar: ",
              sLengthMenu: "Mostrar _MENU_ registros por página",
              sZeroRecords: "Nenhum registro encontrado",
              sInfo: "Visualisando _START_ até _END_ de _TOTAL_ registros",
              sInfoEmpty: "Visualizando 0 até 0 de 0 registros",
              sInfoFiltered: "(filtrados de um total de _MAX_ registros)",
              sUrl: "",
              oPaginate: {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Próximo",
                    "sLast":     "Útimo"
              }
        }
  });
    
    $(".parceiroForm").submit(function(e){
    	
    	var nome = $("#nome").val();
    	var sobrenome = $("#sobrenome").val();
    	var empresa = $("#empresa").val();
    	var email = $("#mail-form").val();
    	var categoria = $("#categoria").val();
    	var telefone = $("#telefone").val();
    	var endereco = $("#endereco").val();
    	var estado = $("#estado").val();
    	var cidade = $("#cidade").val();
    	var bairro = $("#bairro").val();
    	var cep = $("#cep").val();
    	var msg = $("#msg").val();
    	var site = $("#site").val();

    	var tipoMsg;
    	
    	if((nome == '') || (sobrenome == '') || (empresa == '') || (email == '') || (categoria == '') || (telefone == '') ||
    		(endereco == '') || (estado == '') || (cidade == '') || (bairro == '') || (cep == '') || (msg == '')){
			  $("#dialog").html("Preencha todos os campos!");
			  tipoMsg = 'Erro';
		        $("#dialog").dialog({
		      	  	title: tipoMsg,
		      	  	autoOpen: true,
		            resizable: false,
		            height: 140,
		            modal: true,
		            buttons: {
		                  Ok: function() {
		                        $( this ).dialog( 'close' );
		                  }
		            }
		        });
    	} else {
    		var regmail = /^[\w!#$%&amp;'*+\/=?^`{|}~-]+(\.[\w!#$%&amp;'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    		if(!regmail.test(email)){
  			  	$("#dialog").html("E-mail inv&aacute;lido! Por favor, digite um e-mail v&aacute;lido, como: <strong>contato@email.com</strong>!");    			
  			  	tipoMsg = 'Erro';
  		        $("#dialog").dialog({
  		      	  	title: tipoMsg,
  		      	  	autoOpen: true,
  		            resizable: false,
  		            height: 140,
  		            modal: true,
  		            buttons: {
  		                  Ok: function() {
  		                        $( this ).dialog( 'close' );
  		                  }
  		            }
  		        });
    		} else {
				$.post("/parceiro/", {
    				nome: nome,
    				sobrenome: sobrenome,
    				empresa: empresa,
    				email: email,
    				categoria: categoria,
    				telefone: telefone,
    				site: site,
    				endereco: endereco,
    				estado: estado,
    				cidade: cidade,
    				bairro: bairro,
    				cep: cep,
    				msg: msg
        		},function(data){
      			  	$("#dialog").html("Mensagem enviada com sucesso! Aguarde por nosso contato.");    			
      			  	tipoMsg = 'Sucesso';
      		        $("#dialog").dialog({
      		      	  	title: tipoMsg,
      		      	  	autoOpen: true,
      		            resizable: false,
      		            height: 140,
      		            modal: true,
      		            buttons: {
      		                  Ok: function() {
      		                        $( this ).dialog( 'close' );
      		                  }
      		            }
      		        });
        		});
    		}
    	}
        
    	e.preventDefault();
    });
    
    $(".contatoForm").submit(function(e){
    	
    	var nome = $("#nome").val();
    	var email = $("#mailform").val();
    	var telefone = $("#telefone").val();
    	var mensagem = $("#mensagem").val();
    	var assunto = $("#assunto").val();

    	var tipoMsg;
    	
    	if((nome == '') || (email == '') || (telefone == '') || (mensagem == '')){
			  $("#dialog").html("Preencha todos os campos!");
			  tipoMsg = 'Erro';
		        $("#dialog").dialog({
		      	  	title: tipoMsg,
		      	  	autoOpen: true,
		            resizable: false,
		            height: 140,
		            modal: true,
		            buttons: {
		                  Ok: function() {
		                        $( this ).dialog( 'close' );
		                  }
		            }
		        });
    	} else {
    		var regmail = /^[\w!#$%&amp;'*+\/=?^`{|}~-]+(\.[\w!#$%&amp;'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    		if(!regmail.test(email)){
  			  	$("#dialog").html("E-mail inv&aacute;lido! Por favor, digite um e-mail v&aacute;lido, como: <strong>contato@email.com</strong>!");    			
  			  	tipoMsg = 'Erro';
  		        $("#dialog").dialog({
  		      	  	title: tipoMsg,
  		      	  	autoOpen: true,
  		            resizable: false,
  		            height: 140,
  		            modal: true,
  		            buttons: {
  		                  Ok: function() {
  		                        $( this ).dialog( 'close' );
  		                  }
  		            }
  		        });
    		} else {
				$.post("/contato/", {
    				nome: nome,
    				email: email,
    				telefone: telefone,
    				msg: mensagem,
    				assunto: assunto
        		},function(data){
      			  	$("#dialog").html("Mensagem enviada com sucesso! Aguarde por nosso contato.");    			
      			  	tipoMsg = 'Sucesso';
      		        $("#dialog").dialog({
      		      	  	title: tipoMsg,
      		      	  	autoOpen: true,
      		            resizable: false,
      		            height: 140,
      		            modal: true,
      		            buttons: {
      		                  Ok: function() {
      		                        $( this ).dialog( 'close' );
      		                  }
      		            }
      		        });
        		});
    		}
    	}
        
    	e.preventDefault();
    });
    
    $(".localidadeForm").submit(function(e){
    	
    	var localidade = $("#localidade").val();
    	var tipoMsg;
    	
    	if(localidade == ''){
			  $("#dialog").html("Preencha o campo!");
			  tipoMsg = 'Erro';
		        $("#dialog").dialog({
		      	  	title: tipoMsg,
		      	  	autoOpen: true,
		            resizable: false,
		            height: 140,
		            modal: true,
		            buttons: {
		                  Ok: function() {
		                        $( this ).dialog( 'close' );
		                  }
		            }
		        });
    	} else {
			$.post("/localidade/", {
				localidade: localidade
    		},function(data){
  			  	$("#dialog").html("Localidade enviada com sucesso!");    			
  			  	tipoMsg = 'Sucesso';
  		        $("#dialog").dialog({
  		      	  	title: tipoMsg,
  		      	  	autoOpen: true,
  		            resizable: false,
  		            height: 140,
  		            modal: true,
  		            buttons: {
  		                  Ok: function() {
  		                        $( this ).dialog( 'close' );
  		                  }
  		            }
  		        });
    		});
    	}
        
    	e.preventDefault();
    });
    
    $(".sugiradescontoForm").submit(function(e){
    	
    	var nome = $("#nome").val();
    	var cidade = $("#cidadee").val();
    	var ramo = $("#ramo").val();
    	var site = $("#site").val();
    	var mensagem = $("#mensagem").val();
    	var tipoMsg;
    	
    	if((nome == '') || (cidade == '') || (ramo == '') || (site == '') || (mensagem == '')){
			  $("#dialog").html("Preencha os campos!");
			  tipoMsg = 'Erro';
		        $("#dialog").dialog({
		      	  	title: tipoMsg,
		      	  	autoOpen: true,
		            resizable: false,
		            height: 140,
		            modal: true,
		            buttons: {
		                  Ok: function() {
		                        $( this ).dialog( 'close' );
		                  }
		            }
		        });
    	} else {
			$.post("/sugiradesconto/", {
				nome: nome,
				cidade: cidade,
				ramo: ramo,
				site: site,
				mensagem: mensagem
    		},function(data){
  			  	$("#dialog").html("Desconto enviado com sucesso!");    			
  			  	tipoMsg = 'Sucesso';
  		        $("#dialog").dialog({
  		      	  	title: tipoMsg,
  		      	  	autoOpen: true,
  		            resizable: false,
  		            height: 140,
  		            modal: true,
  		            buttons: {
  		                  Ok: function() {
  		                        $( this ).dialog( 'close' );
  		                  }
  		            }
  		        });
    		});
    	}
        
    	e.preventDefault();
    });
    
});

function zeroPad(num,count){
	var numZeropad = num + '';
	while(numZeropad.length < count) {
		numZeropad = numZeropad + "0";
	}
	return numZeropad;
}

function remove(id){
	$('.'+id).remove();
	
	var qtd = $('.text-quantidade').html() - 1;
	
   	var preco = $('.text-preco').html();
   	var total = $('.text-total').html();
    	
   	var p = parseFloat(preco.replace(",", "."));
   	var t = parseFloat(total.replace(",", "."));
    	
   	var soma = p*(qtd);
   	soma = ((Math.round(soma*100))/100)+'';
    	
   	var values = soma.split(".");
   	var v1 = parseFloat(values[0]);
   	if(!values[1]) values[1] = 0;
   	var v2 = zeroPad(values[1],2);
   	
   	$('.text-total').html('');
   	$('.compra-footer .text-preco').html('');
   	
   	$('.text-total').append(v1+','+v2);
   	$('.compra-footer .text-preco').append(v1+','+v2);
		
   	$('input[name = "preco"]').val(preco.replace(",", ""));
   	$('input[name = "quantidade"]').val(qtd);
	$('.text-quantidade').html(qtd);
	
	return false;
}

function enviaEmail(id){
    var formulario = '<table>'+
    				 '<tr><td><strong>Nome do Remetente:</strong></td></tr>'+
    				 '<tr><td><input type="text" id="nome_remetente" style="border: 1px solid silver; height: 25px; width: 220px;"></td></tr>'+
    				 '<tr><td><strong>E-mail do Remetente:</strong></td></tr>'+
    				 '<tr><td><input type="text" id="email_remetente" style="border: 1px solid silver; height: 25px; width: 220px;"></td></tr>'+
    				 '<tr><td><strong>Nome do Destinat&aacute;rio:</strong></td></tr>'+
    				 '<tr><td><input type="text" id="nome_destinatario" style="border: 1px solid silver; height: 25px; width: 220px;"></td></tr>'+
    				 '<tr><td><strong>E-mail do Destinat&aacute;rio:</strong></td></tr>'+
    				 '<tr><td><input type="text" id="email_destinatario" style="border: 1px solid silver; height: 25px; width: 220px;"></td></tr>'+
    				 '</tr></table>';

	 
	$( '#dialog' ).html(formulario);
    $( '#dialog' ).dialog({
    	title: 'Enviar oferta pelo e-mail',
    	resizable: false,
    	height: 300,
    	modal: true,
    	buttons: {
			Ok: function() {
    	
    		  var existe;
    		  var tipomsg; 
			  var regmail = /^[\w!#$%&amp;'*+\/=?^`{|}~-]+(\.[\w!#$%&amp;'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
			 	
			  if ((!regmail.test($("#dialog #email_remetente").val())) || (!regmail.test($("#dialog #email_destinatario").val()))) {
				  $("#dialog2").html("E-mail inv&aacute;lido! Por favor, digite um e-mail v&aacute;lido, como: <strong>contato@email.com</strong>!");
				  tipomsg = 'Erro';
			  } else if(($("#dialog #nome_remetente").val() == '') || ($("#dialog #nome_destinatario").val() == '')){
				  $("#dialog2").html("Preencha com nomes!");
				  tipomsg = 'Erro';
			  } else {
				  $("#dialog2").html("Seu e-mail foi enviado com sucesso!");
				  tipomsg = 'Sucesso';
				  existe = "ok";
					$.post("/enviaemail/", {
	    				id_oferta: id,
	    				nome_remetente: $('#dialog #nome_remetente').val(),
	    				email_remetente: $('#dialog #email_remetente').val(),
	    				nome_destinatario: $('#dialog #nome_destinatario').val(),
	    				email_destinatario: $('#dialog #email_destinatario').val()
	        		});
					$( this ).dialog( 'close' );
			  }
    	
	          $( '#dialog2' ).dialog({
	        	  title: tipomsg,
	        	  autoOpen: true,
	              resizable: false,
	              height: 140,
	              modal: true,
	              buttons: {
	                    Ok: function() {
	                          $( this ).dialog( 'close' );
	                    }
	              }
	          });
	          
				return false;
			}
		}
	});
}

function enviaConvite(link,nome,email){
    var formulario = '<table>'+
    				 '<tr><td><strong>Nome do Destinat&aacute;rio:</strong></td></tr>'+
    				 '<tr><td><input type="text" id="nome_destinatario" style="border: 1px solid silver; height: 25px; width: 220px;"></td></tr>'+
    				 '<tr><td><strong>E-mail do Destinat&aacute;rio:</strong></td></tr>'+
    				 '<tr><td><input type="text" id="email_destinatario" style="border: 1px solid silver; height: 25px; width: 220px;"></td></tr>'+
    				 '</tr></table>';

	 
	$( '#dialog' ).html(formulario);
    $( '#dialog' ).dialog({
    	title: 'Enviar convite por e-mail',
    	resizable: false,
    	height: 200,
    	modal: true,
    	buttons: {
			Ok: function() {
    	
    		  var existe;
    		  var tipomsg; 
			  var regmail = /^[\w!#$%&amp;'*+\/=?^`{|}~-]+(\.[\w!#$%&amp;'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
			 	
			  if (!regmail.test($("#dialog #email_destinatario").val())){
				  $("#dialog2").html("E-mail inv&aacute;lido! Por favor, digite um e-mail v&aacute;lido, como: <strong>contato@email.com</strong>!");
				  tipomsg = 'Erro';
			  } else if($("#dialog #nome_destinatario").val() == ''){
				  $("#dialog2").html("Preencha com nomes!");
				  tipomsg = 'Erro';
			  } else {
				  $("#dialog2").html("Seu e-mail foi enviado com sucesso!");
				  tipomsg = 'Sucesso';
				  existe = "ok";
					$.post("/conta/enviaconvite/", {
						nome: nome,
						link: link,
						email_remetente: email,
	    				nome_destinatario: $('#dialog #nome_destinatario').val(),
	    				email_destinatario: $('#dialog #email_destinatario').val()
	        		});
					$( this ).dialog( 'close' );
			  }
    	
	          $( '#dialog2' ).dialog({
	        	  title: tipomsg,
	        	  autoOpen: true,
	              resizable: false,
	              height: 140,
	              modal: true,
	              buttons: {
	                    Ok: function() {
	                          $( this ).dialog( 'close' );
	                    }
	              }
	          });
	          
				return false;
			}
		}
	});
}