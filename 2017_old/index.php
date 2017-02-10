<?php
	include_once("analyticstracking.php");
	
	if ( !empty($_GET['language']) ) {
	    $_COOKIE['language'] = $_GET['language'] === 'en' ? 'en' : 'pt';
	}else {
	    $_COOKIE['language'] = 'pt';
	}

	setcookie('language', $_COOKIE['language']);


	$lang="";

	if ( $_COOKIE['language'] == "en") {
	  
	  	$lang="en";
	  	$json = file_get_contents('langs/en-US/conferences.json');
	  	$teste = file_get_contents('langs/en-US/general.json');
	}else{
		$lang="pt";
		$json = file_get_contents('langs/pt-BR/conferences.json');
		$teste = file_get_contents('langs/pt-BR/general.json');
	}
	$conferences = json_decode($json, true);
	$general = json_decode($teste, true);
?>

<!DOCTYPE html>
<html lang=<?php echo $_COOKIE['language'];?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title><?php echo $general['title']?> 2017</title>

		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../main4.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="../main.js"></script>
	</head>
	
	<body>

		<!-- navbar -->
		<nav id="sticky">
			<div class="nav-menu" id="main">
				<ul class="menu-list">
					<li>
						<a id="anchor" class="menu-link" href="#home"><span class="menu-label"><?php echo $general['home']?></span></a>
					</li>
					<li>
						<a id="anchor" class="menu-link" href="#description"><span class="menu-label"><?php echo $general['about']?></span></a>
					</li>
					<li>
						<a id="anchor" class="menu-link" href="#schedule"><span class="menu-label"><?php echo $general['dates']?></span></a>
					</li>
					<li>
						<a class="menu-link" href="#place"><span class="menu-label"><?php echo $general['place']?></span></a>
					</li>
					<li>
						<a class="menu-link" href="#conference-1"><span class="menu-label"><?php echo $general['conference']?> 1</span></a>
					</li>
					<li>
						<a class="menu-link" href="#conference-2"><span class="menu-label"><?php echo $general['conference']?> 2</span></a>
					</li>
					<li>
						<a class="menu-link" href="#realizador"><span class="menu-label"><?php echo $general['organization']?></span></a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- idioma -->
		<div class="dropdown">
			<img src="../image/icones/icon_lang.png" class="dropdown-toggle world-img" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<div class="dropdown-menu lang-dropdown" aria-labelledby="dropdownMenu1">
				<a class="dropdown-item" href="?language=en">English</a>
				<a class="dropdown-item" href="?language=pt">Português</a>
			</div>
		</div>

		<!-- Home section -->
		<section class="conference-section active" id="home">
			<article>
				<h1 class="title"><a href="../?language=<?php echo $lang;?>" class="link"><?php echo $general['dialogos']?></a></h1>				
			</article>
		</section>

		<!-- descrição -->
		<section class="conference-section hide" id="description">
			<article class="container">
				<div class="wrap">
					<div class="row line">

						<!-- vídeo dialogos -->
						<div class="col-lg-6">
							<div class="videoWrapper">
								<iframe width="560" height="290" src="https://www.youtube.com/embed/H-BN6NdeZHY" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>

						<!-- texto -->
						<div class="col-lg-6 desc-container">

							<!-- titulo -->
							<div class="text-right">
								<div class="section-title-circle"></div>
							</div>

							<!-- desc -->
							<?php foreach($general['description'] as $key => $value):?>
								<p><?php echo $value['paragraph']; ?></p>
							<?php endforeach;?>
							
							<!-- lista -->
							<ul>
								<?php foreach($general['description-items'] as $key => $value):?>
									<li><?php echo $value['items']; ?></li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
					<div class="row center">
						<a href="https://www.facebook.com/obec.rs/" title="Facebook" target="_blank"><img src="../image/icones/facebook_pb.png" class="img-icon"></a>
						<a href="https://twitter.com/OBEC_RS" title="Twitter" target="_blank"><img src="../image/icones/twitter.png" class="img-icon"></a>
						<a href="https://www.instagram.com/obec.ufrgs/" title="Instagram" target="_blank"><img src="../image/icones/instagram.png" class="img-icon"></a>
					</div>
				</div>
			</article>
		</section>

		<!-- agenda -->
		<section class="conference-section hide" id="schedule">
			<article class="container">
				<div class="wrap">
					<div class="row">
						<div class="col-lg-12 center">
							
							<!-- section title! -->
							<div class="section-title">

								<!-- circulos -->
								<div class="section-title-circle"></div>
								
								<!-- titulo -->
								<h1 class="the-title"><?php echo $general['conferences']?></h1>
								
								<!-- ano -->
								<div class="section-title-line"></div><span class="year">2017</span><div class="section-title-line"></div>

							</div>

						</div>
					</div>
					<div class="row schedule-container">
						<div class="col-md-6">
							<?php foreach ($conferences as $key => $val) :?>
								<?php foreach ($val as $a => $b) :?>
									<div class="schedule-block">

										<!-- data -->
										<div class="col-xs-2 schedule-date-container">
											<div class="schedule-date day"><?php echo $b['date-day'];?></div>
											<div class="schedule-date month"><?php echo $b['date-month'];?></div>
										</div>

										<!-- descrição -->
										<div class="col-xs-10 schedule-content">
											<p class="date-title"><?php echo $b['title'];?></p>
										</div>

									</div>
									<?php if($a == 0) echo '</div><div class="col-md-6 right">'; ?>
								<?php endforeach;?>
							<?php endforeach;?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 center">
							
							<!-- certificados -->
							<a href="https://www1.ufrgs.br/extensao/portal/index.php" class="link-buttons">
								<button class="button button-custom"><?php echo $general['certificates']?></button>
							</a>

							<!-- inscrições -->
							<a href="https://docs.google.com/forms/d/e/1FAIpQLSdnOTqEqJT1VXKBtYXqA6VvX2oWgVIwqwn8j5R-onkQT2fKzw/viewform" class="link-buttons">
								<button class="button button-custom"><?php echo $general['registration']?></button>
							</a>					

						</div>
					</div>
				</div>
			</article>
		</section>	

		<!-- lugar -->
		<section class="conference-section hide" id="place">
			<article class="container">
				<div class="wrap">
					<div class="row">
						<div class="col-lg-12">

							<!-- section title! -->
							<div class="section-title center">

								<!-- circulos -->
								<div class="section-title-circle"></div>
								
								<!-- titulo -->
								<h1 class="the-title"><?php echo $general['place']?></h1>
								
								<!-- ano -->
								<div class="section-title-line"></div><span class="year">2017</span><div class="section-title-line"></div>

							</div>			

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<!-- link mapa -->
							<a href="https://www.google.com.br/maps/@-30.0337546,-51.2191368,19.25z">
								<img class="mapa img-fluid" src="../image/mapa.png">
							</a>
							
							<!-- endereço -->
							<p class="place-address"><br/>Salão de Festas<br/>Reitoria da UFRGS, 2º andar <br>Av. Paulo Gama 110</p>
						
						</div>
					</div>
				</div>
			</article>
		</section>

		<!-- Conference sections -->
		<?php foreach ($conferences as $conference) :?>
			<?php foreach ($conference as $value) :?>
				<section class="conference-section hide" id="conference-<?php echo $value['id'];?>">
					<article>

						<div class="wrap">

							<!--=== título seção! ===-->
							<div class="row title-conf">
								<div class="section-title center">

									<!-- circulos -->
									<div class="section-title-circle"></div>
									
									<!-- titulo -->
									<h1 class="the-title"><?php echo $general['conference']?> <?php echo $value['id'];?></h1>
									
									<!-- ano -->
									<div class="section-title-line"></div><span class="year">2017</span><div class="section-title-line"></div>

								</div>

							</div>

							<!--=== conteúdo conferências! ===-->
							<div class="row">

								<!-- imagem -->
								<div class="col-lg-6 no-border img-conf <?php if( $value['id']%2==0 ) echo right; ?>">
									<!-- data -->
									<div class="conf-date">
										<div class="col-xs-2 schedule-date-container">
											<div class="schedule-date day"><?php echo $value['date-day'];?></div>
											<div class="schedule-date month"><?php echo $value['date-month'];?></div>
										</div>
									</div>

									<img class="img-fluid" style="width:100%; margin-top:5px" src="../image/2017/<?php echo $value['id'];?>.png">
								</div>

								<!-- texto -->
								<div class="col-lg-6 <?php if( $value['id']%2==0 ) echo left; ?>">	
									<div class="info">		

										<!-- titulo -->
										<h2 class="conference-title"><?php echo $value['title'];?></h2>
										
										<!-- descrição -->
										<p class="conference-description"><?php echo $value['description'];?></p>

										<!-- palestrantes -->
										<h6 class="block-headline"><?php echo $value['panelists'] != NULL ? $general['speaker'] : '' ;?></h6>
										
										<?php foreach ($value['panelists'] as $panelist) :?>
											
											<!-- link palestrante -->
											<div class="conference-modal" data-toggle="modal" data-target="<?php echo '#modal' . $panelist['picture']?>">
												
												<!-- imagem palestrante -->
												<img src="<?php echo '../image/profiles/' . $panelist['picture'] . '.png';?>">
												
												<!-- nome + uni palestrante -->
												<p><?php echo $panelist['name'];?><br/><?php echo $panelist['university'];?></p>

											</div>
											
											<!-- modal palestrante -->
											<div class="modal fade panelist" id="<?php echo 'modal' . $panelist['picture']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">

														<!-- cabeçalho -->
														<div class="modal-header">
															
															<!-- fechar -->
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>

															<!-- imagem -->
															<img class="modal-picture" src="<?php echo '../image/profiles/' . $panelist['picture'] . '.png';?>">
															
															<!-- nome -->
															<h4 class="modal-title" id="myModalLabel"><?php echo $panelist['name'];?><span><?php echo $panelist['university'];?></span></h4>
														</div>
														
														<!-- conteúdo ::: bio -->
														<div class="modal-body">
															<p><?php echo $panelist['resume'];?></p>
														</div>

													</div>
												</div>
											</div>

										<?php endforeach?>

										<!--== link relatório ==-->
										<h6 class="block-headline"><?php echo $value['report'] != NULL ? $general['report'] : '' ;?></h6>
										
										<?php foreach ($value['report'] as $report) :?>
											<a href="<?php echo $report['link']?>" target="_blank" class="link-report">
												<?php echo $report['name']?>
											</a>
										<?php endforeach;?>

										<!--== link social media ==-->
										<h6 class="block-headline"><?php echo ($value['youtube'] != NULL || $value['facebook'] != NULL) ? $general['seeMore'] : ''?></h6>
										
										<!-- youtube! -->
										<?php if ($value['youtube'] != NULL):?>
											<a href="<?php echo $d['link']?>" class="link-buttons" data-toggle="modal" data-target="#youtube<?php echo $value['id']?>">
												<img class="video-icon" src="../image/icones/play.png">
											</a>
										<?php endif;?>
										
										<!-- facebook! -->
										<?php if ($value['facebook'] != NULL):?>
											<a href="<?php echo $value['facebook']?>" class="link-buttons" target="_blanck">
												<img class="video-icon" src="../image/icones/facebook.png">
											</a>
										<?php endif;?>


										<!--=== modal video do youtube ===-->
										<div class="modal fade" id="youtube<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													
													<!-- cabeçalho -->
													<div class="modal-header">
														
														<!-- botão fechar -->
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														
														<!-- ícone vídeo -->
														<img class="modal-picture modal-video" src="../image/icones/video_2x.png">
														
														<!-- titulo -->
														<h4 class="modal-title" id="myModalLabel">Video</h4>
													
													</div>
													
													<!-- link para o vídeo -->
													<div class="modal-body">
														<?php foreach ($value['youtube'] as $data) :?>
															<a class="modalVideo-item" href="<?php echo $data['link'];?>">
																<?php echo $data['name'];?>
															</a>
														<?php endforeach?>
													</div>

												</div>
											</div>
										</div>			
									</div>
								</div>
							</div>
						</div>

					</article>
				</section>
			<?php endforeach?>
		<?php endforeach?>

		<!-- realizadores -->
		<section class="conference-section hide" id="realizador">
			<article class="container">
				<div class="wrap">
					<div class="row">
						<div class="col-lg-12">

							<!-- section title! -->
							<div class="section-title">

								<!-- circulos -->
								<div class="section-title-circle"></div>
								
								<!-- titulo -->
								<h1 class="the-title"><?php echo $general['organization']; ?></h1>

							</div>
							
						</div>

						<!--=== logos realizadores! ===-->
						<div class="realizador-images">
							<img src="../image/realizadores/obec.png" style="height: 95px; margin-top: 15px">
							<img src="../image/realizadores/cegov.png">
							<img src="../image/realizadores/catavento.png">
							<img src="../image/realizadores/brasil.png">
							<img src="../image/realizadores/neccult.png">
						</div>				
					</div>
				</div>
			</article>
		</section>

	</body>
</html>