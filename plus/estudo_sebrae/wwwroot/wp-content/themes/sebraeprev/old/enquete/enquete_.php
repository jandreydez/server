<?php
	include 'concurso.class.php';
	$concurso = new concurso();
	$concurso->setIdEnquete( 2 ); // Setando o ID da enquete

	if( $_POST ) :
		$resultado = $concurso->registraOpcao( $_POST['enquete'] );
		if( $resultado === true ) {
			$resultado = "Enquete atualizada com sucesso!";
			$chart = true;
		} else {
			$resultado = "Enquete não foi atualizada. Por favor, tente novamente.";
		}
	endif;

	$nomeEnquete = $concurso->getEnquete();
	$result = $concurso->getOpcoes();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $nomeEnquete->titulo_enquete; ?></title>
	<script src="chart/Chart.js"></script>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script>
		$(function(){

			var i = <?php echo count( $result ); ?>;
			$('.add').click(function(e){
				e.preventDefault();
				var more = '<div><label for="opcao_'+ i +'">Opção '+ i +'</label>';
				more += '<input type="text" value="" id="opcao_'+ i +'" name="enquete[]">';
				more += '<a href="javascript:void(0);" class="del"><span>-</span></a></div>';
				$('#more').append( more );
				i++;
			});
			$('.del').on('click', function(e){
				e.preventDefault();
				$(this).parent().remove();
				i--;
			});
		});
	</script>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style>
		*{ font-family: tahoma, verdana, arial; text-decoration: none;font-family: 'Open Sans', sans-serif;}
		h1{ text-align: center;color: #2883af;margin-bottom: 60px;margin-top: 60px;}
		body{color:#666;font-size: 14px;}
		p{border-bottom: 1px solid #eee;padding-bottom: 0px;margin: 8px;}
		input[type="text"]{ width: 470px; margin-bottom: 10px;}
		form{ width: 600px; margin: 0 auto;}
		span{ display:block; background: #cccccc; color: #ffffff; width: 20px; height: 20px; text-align: center; line-height: 20px; margin-right: 10px; float: left;}
		img{margin: 0 auto;display: block;margin-top: 40px;margin-bottom: 40px;}
		table,tr{width: 100%;}
		table{border: 1px solid #eee;}
		td{padding: 10px;}
		tr{cursor: pointer;}
		table tr:last-child .total{border-bottom: 0px !important;}
		#canvas{width: 100%;height: 100%;}
		.grafico{display:none;width: 400px;height:400px;margin: 0 auto;float: right;margin-bottom: 80px;}
		.perguntas{display:;float: left;width: 365px;}
		.resultado{margin: 0 auto;width: 495px;margin-bottom: 80px;display: none;}
		.dash{width: 495px; margin: 0 auto;}
		.total{background: #efefef;text-align:center;font-weight: bold;border-bottom:1px solid #ddd;}
		.letra{float: left;height: 20px;margin-right: 10px;}
		tr:hover .total{background: #2883af;color:#fff;}
	</style>
</head>
<body>
	<div class="dash">
	<img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/08/logo_sebraeprev_final.png"/>
	<?php if( $_GET['opcoes'] ): ?>
		<h1><?php echo $nomeEnquete->titulo_enquete; ?></h1>
		<form action="" method="post">
			<?php if( $resultado ) echo "<p>$resultado</p>"; ?>
			<?php 
				$i = 1;
				while( $opcao = $concurso->fetch( $result )):
					if( $i > 2 ) :
						echo '<div><a href="javascript:void(0);" class="del"><span>-</span></a>';
					endif;
			?>
				<label for="opcao_<?php echo $i; ?>">Opção <?php echo $i; ?></label>
				<input type="text" value="<?php echo $opcao->titulo; ?>" id="opcao_<?php echo $i; ?>" name="enquete[]"><br />
			<?php 
					if( $i > 2 ):
						echo '</div>';
					endif;
					$i++;
				endwhile;
			?>
				<div id="more"></div>
				<p><a href="javascript:void(0);" class="add"><span>+</span>Adicionar mais opções</a></p>
				<input type="submit" value="Salvar">
		</form>
	<?php endif; ?>

	<?php if( $_GET['resultado-parcial'] ) : ?>
		<h1><?php echo $nomeEnquete->titulo_enquete; ?></h1>
		<div class="grafico">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>
		<div class="perguntas">
			<?php
				$opcoes = $concurso->getOpcoes();
				$votos = $concurso->getVotos();
				$ordem = "A";
				while( $opcao = $concurso->fetch( $opcoes ) and $voto = $concurso->fetch( $votos )):
					echo '<p>'. '<div class="letra">' . $ordem .'.' . '</div>'. $opcao->titulo . '<div clas="total">' . /*$voto->total.*/'</div>'.'</p>';
					$ordem++;
				endwhile;
			?>
		</div>
		<div class="resultado">
			<table cellpadding="0" cellspacing="0">
				<?php
					$votos = $concurso->getVotos();
					while( $opcao = $concurso->fetch( $votos ) ):
				?>
					<tr name="<?php echo $count;?>">
						<td><?php echo $opcao->titulo; ?></td>
						<td class="total"><?php echo $opcao->total; ?></td>
					</tr>
				<?php
					endwhile;
				?>
			</table>
		</div>
		<script>
			var randomScalingFactor = function(){ return Math.round(Math.random()*100)};


			var barChartData = {
				labels : ["A", "B", "C", "D"],
				datasets : [
					{
						fillColor : "rgba(151,187,205,0.5)",
						strokeColor : "rgba(151,187,205,0.8)",
						highlightFill : "rgba(151,187,205,0.75)",
						highlightStroke : "rgba(151,187,205,1)",
						data : [
							<?php
								$votos = $concurso->getVotos();
								$virgula = "";
								while( $voto = $concurso->fetch( $votos )):
									echo $virgula . '"' . $voto->total . '"';
									$virgula = ",";
								endwhile;
							?>
						]
					}
				]
			}

			window.onload = function(){
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myBar = new Chart(ctx).Bar(barChartData, {
					responsive : true
				});
			}
		</script>
	<?php endif; ?>
	</div>
</body>
</html>