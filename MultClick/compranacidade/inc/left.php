    	<div class="col left margin-right">
            <div class="round-info">
				<div class="roundtop">
					<img src="css/images/top-left.gif" alt="" width="15" height="15" class="corner" style="display: none" />
				</div>
                
                <div class="content-info_oferta">
                
                	<div class="seta"></div>
                
                	<div class="preco-de preco-de-frente">de R$258</div>
                	<div class="preco-de preco-de-tras">de R$258</div>
                    
                	<div class="preco-por preco-por-frente">por R$64</div>
                	<div class="preco-por preco-por-tras">por R$64</div>
                    

					<div class="info">
                    	<a href="#"><img src="css/images/bt_comprar.png" /></a>
						<a href="#"><img src="css/images/bt_compre_amigo.png" /></a>
                        
	                    <div class="divisoria"></div>
                        
                        <div class="espaco-contador">
	                        <div class="contador" id="relogioh"></div>
	                        <div class="contador-pontos">:</div>
	                        <div class="contador" id="relogiom"></div>
	                        <div class="contador-pontos">:</div>
	                        <div class="contador" id="relogios"></div>
                        </div>
                        
						<?php
							date_default_timezone_set("America/Fortaleza");		
							$tempoRestante = mktime(18,00,00,03,01,2011) - time();
						?>
                        
						<script type="text/javascript">
						
							var tempoRestante = <?php echo $tempoRestante; ?>;
						
							var h = $("#relogioh");
							var m = $("#relogiom");
							var s = $("#relogios");
						
							var relogio = setInterval(cronometro, 1000);
						
							function cronometro () {
								var segundos = tempoRestante --;
								if (segundos < 0){
									segundos = 0;
									clearInterval(relogio);
								}
						
								var horas = Math.floor(segundos / 3600);
								segundos -= horas * 3600;
								var minutos = Math.floor(segundos / 60);
								segundos -= minutos * 60;
								h.html(horas >= 0 ? horas : 0);
								m.html(minutos >= 0 ? minutos : 0);
								s.html(segundos >= 0 ? segundos : 0);
							}
						</script>
                        
                        
                        <p class="vendidos">183 vendidos</p>
                        
                        <img src="css/images/compra_ativada.png" />
                        
                        <p class="minimo">M&iacute;nimo de 10 atingido</p>
                        
                    </div>
                    
                </div>
                
				<div class="roundbottom">
					<img src="css/images/bottom-left.gif" alt="" width="15" height="15" class="corner" style="display: none" />
				</div>
            </div>
            
            <div class="banner">
            	<a href="#"><img src="css/images/banner_projeto.gif" /></a>
			</div>
            
            <div class="banner anunciante">
            	<a href="#"><img src="css/images/banner_anunciante.gif" /></a>
			</div>
            
            <div class="banner anunciante">
            	<a href="#"><img src="css/images/banner_anunciante.gif" /></a>
			</div>
            
        </div>