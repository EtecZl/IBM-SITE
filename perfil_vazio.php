<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Perfil de Usuario</title>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="perfil.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="assets/css/vazio.css" media="screen" />  
	  <link rel="icon" type="image/x-icon" href="assets/CSS/vazio.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<!--Plugin de Ver Libras-->
	<div vw class="enabled">
		<div vw-access-button class="active"></div>
		<div vw-plugin-wrapper>
		  <div class="vw-plugin-top-wrapper"></div>
		</div>
	  </div>
	  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
	  <script>
		new window.VLibras.Widget('https://vlibras.gov.br/app');
	  </script>
	  <!--fim do Ver Libras-->
	</head>
		
	<body>
<!-- NAVBAR -->
<?php include 'includes/header.php'; ?>


	<div class="container">
		<h1> Perfil </h1>
		<p>Sua foto</p>
			<img class="avatar" src="Imagens/perfil_vazio/avatar.png" alt="Avatar">	
		
		<div class="about"> 
			<h1>Sobre mim</h1>
			<p>Este é o seu peril contendo os seus dados cadastrados</p>
		</div>
		
		<div>
			<h2>Detalhes</h2>
			<p>Cadastro não concluido, por favor realize a baixo</p>

            <a href="login.php">Cadastre-se aqui</a><br><br>
			
			<a href="https://instagram.com/completlar_?igshid=YmMyMTA2M2Y="><img src="perfil sem nada/ico_insta.png" class="ico"/></a>
			<a href="https://twitter.com/CompletLar?t=wTeYryoob2z9lquFUQ7utA&s=09"><img src="perfil sem nada/ico_twitter.png"  class="ico"/></a>
<a href="https://twitter.com/CompletLar?t=wTeYryoob2z9lquFUQ7utA&s=09"><img src="perfil sem nada/ico_facebook.png" class="ico"/></a>
			
		</div>
		
		

	</div>
	
	
	<!--Experimente por um filtro para deixar a imagem preto
 	e branca filter: grayscale(1); -->
	</body>
</html>