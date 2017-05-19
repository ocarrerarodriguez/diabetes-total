<body>
        <div class="container">
            <div class="navbar navbar-defecto">
                <div class="navbar-header">
					<div class="navbar-brand">
                    <a  href="<?php echo(BASE_URL.'index');?>"><img src="<?php echo($_layoutParams['ruta_img'].'favicon32-min.png');?>" alt="" width="24"/> DiabetesTotal</a>
					</div>
                </div>
                <ul class="nav navbar-nav">
					
					<?php if(isset($_layoutParams['menu'])): ?>
						<?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
							<?php 

                            if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
								$_item_style = 'current'; 
                            } else {
								$_item_style = '';
                            }

                            ?>

                            <li><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

                        <?php endfor; ?>
					<?php endif; ?>                  
                </ul>
                <a class="btn navbar-btn pull-right" href="#"><span class="glyphicon glyphicon-log-out"></span></a>
            </div>
            <!-- contenido añadir un div antes de cerrar el body-->