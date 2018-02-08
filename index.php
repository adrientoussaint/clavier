<?php
session_start();
if(!isset($_SESSION['user_id'])){
	$_SESSION['user_id']=0;
}

// var_dump($_SESSION);
// session_destroy();
$alphabet = ['a','z','e','r','t','y','u','i','o','p','q','s','d','f','g','h','j','k','l','m','w','x','c','v','b','n'];
$nb_fichier = 0;
if($dossier = opendir('./sounds')){
	while(false !== ($fichier = readdir($dossier))){
		if($fichier != '.' && $fichier != '..' && $fichier != 'default'){
			$nb_fichier++;
			$sounds[$nb_fichier]=$fichier;	
			$_SESSION['sounds'] = $sounds;		
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Patatap Circles</title>
	<script type="text/javascript" src="paper-full.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.core.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dropzone.css">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom">
      <div class="container">
        <a class="navbar-brand text-capitalize" href="#"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Launchboard'?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sr-only">(current)</span>
              </a>
            </li>
			<li class="nav-item">
				<form class="form-group form-inline" action="script/chargerProfil.php" method="post">
					<input type="text" class="form-control" name="profil" id="profil" placeholder="Nom de profil">	
					<input type="submit" class="btn btn-primary" id="go" value="Go !">
				</form>
			</li>		
			<li class="nav-item dropup">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-cog" aria-hidden="true"></i>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a id="configPerso" class="dropdown-item" data-toggle="modal" data-target="#configModal"><i class="fa fa-keyboard-o" aria-hidden="true"></i>&nbsp;Configurer les touches</a>	
					<hr>		
					<a class="dropdown-item" data-toggle="modal" data-target="#uploadSound"><i class="fa fa-file-audio-o" aria-hidden="true"></i>&nbsp;Ajouter des sons</a>	
					<?php if($_SESSION['user_id']!=0):?>
					<hr>
					<a id="backToBase" class="dropdown-item"><i class="fa fa-arrow-down" aria-hidden="true"></i>&nbsp;Touche par défaut</a>		
					<hr>
					<a id="getMyPref" class="dropdown-item" data-id="<?= $_SESSION['user_id']?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Recupérer mes préférences</a>							
					<?php endif;?>
				</div>
			</li>
          </ul>
        </div>
      </div>
    </nav>

	<canvas id="myCanvas" resize></canvas>

	<div class="modal fade" id="configModal" tabindex="-1" role="dialog" aria-labelledby="configModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="conf" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="configModalLabel">Configuration</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="script/makeconfig.php" method="post">
		<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control text-center" name="username" id="username" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''?>"placeholder="Nom du profil">
					<hr>
					<div class="container">
						<div class="row" id="rowConf">
							<?php foreach($alphabet as $key => $lettre):?>
								<p class="text-uppercase selconf text-center"><?= $lettre ?> 
								<select class="form-control" name="<?= $lettre ?>" id="<?= $lettre ?>">
									<?php foreach($sounds as $key => $fichier): ?>
									<option value="<?= $key ?>" id="<?= substr(-4,$fichier) ?>"><?= $fichier ?></option>
									<?php endforeach; ?>					
								</select></p>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
				<input type="submit" class="btn btn-primary" value="Sauver le profil">
			</div>
		</form>
		</div>
	</div>
	</div>
	<div class="modal fade" id="uploadSound" tabindex="-1" role="dialog" aria-labelledby="uploadSoundLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="uploadSoundLabel">Configuration</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form action="script/upload.php" enctype='multipart/form-data' class="dropzone"></form>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.reload()">Ok</button>
			</div>
		</div>
	</div>
	</div>
	<footer>
	<script src='https://code.jquery.com/jquery-3.1.0.js'></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="script/dropzone.js"></script>
	<script type="text/paperscript" src="script/papercanvas.js" canvas="myCanvas"></script>
	<script>
	$(document).ready(function(){
		var goclick = <?= (isset($_GET['goclick']) ? $_GET['goclick'] : 'false') ?>;
		if(goclick==true){
			setTimeout(function() {
				$('#getMyPref').trigger('click');
			}, 100);
		}
		$('canvas').width(window.innerWidth);
		$('canvas').height(window.innerHeight);
		var color = '#'+Math.floor(Math.random()*16777215).toString(16);
		var colorbutton = '#'+Math.floor(Math.random()*16777215).toString(16);
		
		$('canvas').css('background-color', color);	
		setTimeout(() => {
			$('.btn-primary').css('background-color', colorbutton );
			$('.btn-primary').css('border-color', colorbutton );
			$('.dropzone').css('border-color', colorbutton );
			$('a.navbar-brand').css('color', colorbutton );
		}, 100);
	})
	</script>
	</footer>
</body>
</html>
