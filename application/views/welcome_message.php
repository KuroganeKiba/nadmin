
<!-- ------------------------------------------------------------------------ -->

<div class="content">
	
	<?php 


		for($i = 0; $i<$ultimoI; $i++){ //detecta si hay items para imprimir, si los hay, imprime una ronda por cada uno
			

			echo '<div class="item">'; //inicia el div por cada item

			echo '<div class="cabeza">
					<div class="nombre"><h2>'.${'datosFiltrados'.$i}['nombre'].' <img src="assets/img/'.${'datosFiltrados'.$i}['estado'].'.png" width="25" /></h2></div>
					<div class="estado"></div>
					<div class="cancion">
						<div class="pathSong"><b>Folder:</b> '.${'datosFiltrados'.$i}['pathSong'].'</div>
						<div class="nombreSong"><b>Song:</b> '.${'datosFiltrados'.$i}['nombreSong'].'</div></div>
				  	<div class="botones">
						<form class="botonista">
							<input type="button" value="Actions" id="botoner'.$i.'" class="lavida" />
						</form>
						
						<form class="diferent">
							<input type="button" value="Information" id="soy'.$i.'" class="lavida" />
						</form>
						<div class="clr"></div>
						
					</div>
					<div class="botonation">
						<form action="assets/actions/'.${'datosFiltrados'.$i}['action'].'.php" method="post">
							<input type="submit" value="'.${'datosFiltrados'.$i}['action'].'" />
						</form>
						<form action="assets/actions/restart.php" method="post">
							<input type="submit" value="Restart" />
						</form>
						<form action="assets/actions/next.php" method="post">
							<input type="submit" value="Next song" />
						</form>
						<form action="index.php/log" method="post" target="_blank">
							<input type="hidden" name="log" value="'.${'datosFiltrados'.$i}['nombreLog'].'" />
							<input type="submit" value="Log" />
						</form>
						<div class="clr"></div>
					</div>
				  </div>
				  <div class="cuerpo">';
			

			for($a = 1; $a<${'totalInfoItem'.$i}; $a++){
				echo '<div class="instancia">'.${'infoItem'.$i}[$a].'</div>';
			}

			echo '</div></div>';

		} ?>
	
</div>

