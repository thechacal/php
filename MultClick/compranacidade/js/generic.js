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
			
		// tira a seleção da aba atual
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
	
});

$(function(){
	
	$("#select1").click(function(){
		$('.outras-cidades-list').toggle();
	});

	$("#select2").click(function(){
		$('.outras-cidades-list2').toggle();
	});
	
});