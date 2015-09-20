$(function(){
      var formWrap = $('#remover-registros-wrapper');
      var checados = $('.remove_registro:checked');
      if( checados.length )
      {
            formWrap.show();
      }
      $('input.remove_registro').click(function(){
            checados = $('.remove_registro:checked');

            if(checados.length)
                  formWrap.stop(true,true).fadeIn(600);
            else
                  formWrap.stop(true,true).fadeOut(400);
      });
      
      $('.FormRemover').submit(function(){
            var id = $(this).attr('id');
            var valores = $('td .remove_registro:checked').clone();
            $('#valores-remover', formWrap).html(valores);

            $('#dialog').html('Deseja realmente excluir o(s) registro(s) selecionado(s)?');
            $('#dialog').dialog({
                  modal: true,
                  title: 'Confirmação',
                  buttons: {
                        Sim: function() {
                              document.getElementById(id).submit();
                              $(this).dialog('close');
                        },
                        Cancelar: function() {
                              $(this).dialog('close');
                        }
                  }
            });

            return false;
      });

      $('.MultiFile').each(function(){
            var elemento = $(this);
            elemento
            .attr('name', elemento.attr('name') + '[]')
            .parent()
            .append('<div class="AdicionarFile"><span class="ui-icon ui-icon-plus"></span>Adicionar um arquivo</div><br style="clear:both" />');

            $('.AdicionarFile').click(function(){
                  var count = $('.MultiFile').length;
                  elemento.clone()
                  .attr('id', elemento.attr('id') + '-' + count)
                  .insertAfter(elemento)
                  .wrap('<div class="MultiFileWrapper MF-' + count +'"></div>');

                  var wrapper = $('.MultiFileWrapper.MF-'+count);
                  wrapper.append('<div class="RemoverFile"><span class="ui-icon ui-icon-closethick"></span></div>');

                  $('.RemoverFile', wrapper).click(function(){
                        wrapper.remove();
                  });
            });
      });

      var imagensEditar = $('input:hidden.Imagens');
      if(imagensEditar.length)
      {
            imagensEditar.each(function(){
                  var input = $(this);
                  var name = input.attr('name');
                  var imgs = input.val().split(',');
                  var wrap = input.parent();
                  var clear = '<div class="clear"></div>';

                  if(imgs.length >= 2)
                  {
                        for ( var i = 0; i < imgs.length; i++ )
                        {
                              if ( imgs[i] && imgs[i] != '' )
                              {
                                    var imgAtual = '/uploads/' + imgs[i];

                                    var elemento = '<div class="img-edit">';
                                    elemento += '<a href="' + imgAtual + '" title="Imagens" rel="imagem-' + name + '" class="ColorBox">';
                                    elemento += '<img src="' + imgAtual + '" height="120" width="120" title="clique para ampliar" />';
                                    elemento += '</a>';
                                    elemento += '<div class="remover-imagem"><span class="ui-icon ui-icon-closethick"></span></div>';
                                    elemento += '<div class="nome-imagem">'+ imgs[i] +'</div>';
                                    elemento += '</div>';
                                    wrap.append(elemento);
                              }
                        }
                  }
                  else
                  {
                        if( input.hasClass('Mult') )
                        {
                              wrap.append('<input class="MultiFile" type="file" name="'+ name + '[]" />');
                        }
                        else
                        {
                              wrap.append('<input type="file" class="Mult" name="'+ name + '" />');
                        }
                        input.remove();
                        wrap.append(clear);
                  }


                  if(input.hasClass('Mult'))
                  {
                        wrap.append('<div class="AdicionarFile"><span class="ui-icon ui-icon-plus"></span>Adicionar um arquivo</div>' + clear);

                        $('.AdicionarFile').click(function(){
                              var count = $('.Mult').length;
                              wrap
                              .append('<input id="Mult-' + count + '" class="Mult" type="file" name="'+ name + '[]" />')

                              $('#Mult-'+count).wrap('<div class="MultWrapper MF-' + count +'"></div>');

                              var wrapper = $('.MultWrapper.MF-' + count);

                              wrapper.append('<div class="RemoverFile"><span class="ui-icon ui-icon-closethick"></span></div>');
                                    
                              $('.RemoverFile', wrapper).click(function(){
                                    wrapper.remove();
                              });
                              
                              wrap.append(clear);
                        });
                  }
                  else
                  {
                        wrap.append(clear);
                  }
                  

                  $('.remover-imagem', wrap).click(function(){
                        var w = $(this).parent();
                        var nomeImagem = $('.nome-imagem', w).text();

                        input.val(input.val().replace(nomeImagem + ',', ''));
                        
                        $(this).parent().remove();

                        if( !$('.img-edit', wrap).length )
                        {
                              if( input.hasClass('Mult') )
                              {
                                    wrap.append('<input class="MultiFile" type="file" name="'+ name + '[]" />');
                              }
                              else
                              {
                                    wrap.append('<input type="file" class="Mult" name="'+ name + '" />');
                              }
                              input.remove();
                              wrap.append(clear);
                        }
                  });
            });
      }


      $('.Numeric').numeric(false);
      $('.Date').mask('99/99/9999 às 99:99:99')
      $('.DateNascimento').mask('99/99/9999')
      $('.Telefone').mask('(99) 9999-9999');
      $('.CEP').mask('99999-999');
      $('.CPF').mask('999.999.999-99');
      $('a.ColorBox').colorbox({
            current: "imagem {current} de {total}",
            previous: "anterior",
            next: "poximo",
            close: "fechar"
      });
      $('.Money').maskMoney({
            symbol: 'R$',
            decimal:',',
            thousands:'.',
            allowZero:true
      });
      $('.DataTable .remove_registro').button({
            icons:{
                  primary: 'ui-icon-check'
            },
            text:false
      });
      $('.DataTable .editar-registro').button({
            icons:{
                  primary: 'ui-icon-pencil'
            },
            text:false
      });
      $('.DataTable .email-registro').button({
          icons:{
                primary: 'ui-icon-mail-closed'
          },
          text:false
    });
      $('.DataTable .email-disabled').button({
          icons:{
          		primary: 'ui-icon-mail-closed'
      	  },
      	  text:false,
    	  disabled: true
    });
      $('.newsletter-registro').button({
          icons:{
                primary: 'ui-icon-mail-closed'
          },
          text:true
    });
      $('.DataTable .download-registro').button({
          icons:{
                primary: 'ui-icon-arrowstop-1-s'
          },
          text:false
    });
      $('.Cadastrar').button({
            icons:{
                  primary: 'ui-icon-check'
            }
      });
      $('.Editar').button({
            icons:{
                  primary: 'ui-icon-check'
            }
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
      
      $('#cortitulo, #corsombra').ColorPicker({
    		onSubmit: function(hsb, hex, rgb, el) {
    			$(el).val(hex);
    			$(el).ColorPickerHide();
    		},
    		onBeforeShow: function () {
    			$(this).ColorPickerSetColor(this.value);
    		}
    	}).bind('keyup', function(){
    		$(this).ColorPickerSetColor(this.value);
    	});
      
});

(function($) {
	$(document).ready(function() {
		
		var mySettings = {	
				onShiftEnter:  	{keepDefault:false, replaceWith:'<br />\n'},
				onCtrlEnter:  	{keepDefault:false, openWith:'\n<p>', closeWith:'</p>'},
				onTab:    		{keepDefault:false, replaceWith:'    '},
				markupSet:  [ 	
					{name:'Bold', className:'bold', key:'B', openWith:'(!(<strong>|!|<b>)!)', closeWith:'(!(</strong>|!|</b>)!)' },
					{name:'Italic', className:'italic', key:'I', openWith:'(!(<em>|!|<i>)!)', closeWith:'(!(</em>|!|</i>)!)'  },
					{name:'Stroke through', className:'stroke', key:'S', openWith:'<del>', closeWith:'</del>' },
					{name:'Underline', className:'underline', key:'U', openWith:'<u>', closeWith:'</u>' },
					{separator:'---------------' },
					{name:'List Numbers', className:'listnumbers', openWith:'<ol>', closeWith:'</ol>' },
					{name:'List Bullets', className:'listbullets', openWith:'<ul>', closeWith:'</ul>' },
					{separator:'---------------' },
					{name:'Clean', className:'clean', replaceWith:function(markitup) { return markitup.selection.replace(/<(.*?)>/g, "") } },		
					{name:'Preview', className:'preview',  call:'preview'}
				]
			};
		
		var mySettings2 = {	
				onShiftEnter:  	{keepDefault:false, replaceWith:'<br />\n'},
				onCtrlEnter:  	{keepDefault:false, openWith:'\n<p>', closeWith:'</p>'},
				onTab:    		{keepDefault:false, replaceWith:'    '},
				markupSet:  [ 	
					{name:'Bold', className:'bold', key:'B', openWith:'(!(<strong>|!|<b>)!)', closeWith:'(!(</strong>|!|</b>)!)' },
					{name:'Italic', className:'italic', key:'I', openWith:'(!(<em>|!|<i>)!)', closeWith:'(!(</em>|!|</i>)!)'  },
					{name:'Stroke through', className:'stroke', key:'S', openWith:'<del>', closeWith:'</del>' },
					{name:'Underline', className:'underline', key:'U', openWith:'<u>', closeWith:'</u>' },
					{separator:'---------------' },
					{name:'Clean', className:'clean', replaceWith:function(markitup) { return markitup.selection.replace(/<(.*?)>/g, "") } },		
					{name:'Preview', className:'preview',  call:'preview'}
				]
			};
		
		$("#regras,#destaques").markItUp(mySettings);
		$("#titulo,#sobre").markItUp(mySettings2);
		
	});
})(jQuery);