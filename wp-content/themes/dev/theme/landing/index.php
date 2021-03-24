  <!-- LANDING -->

  <?php if(false !== ($message = get_transient('message'))) :?>
    <div style="z-index:1" class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $message ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>
    </div>
  <?php delete_transient('message'); endif; ?>
  

  <div class="landing">
        <div class="landing-decoration"></div>
        <div class="landing-info">
            <h2 class="landing-txt2 mb30">Ouverture prochaine !</h2>
            <div class="logo">
            
                <img class="logo-size" src="https://espot.fr/wp-content/uploads/2020/10/logo-landing-paris.png">
            </div>
            <p class="landing-txt">1er lieu Grand Public sur 2000m²<br>Gaming & Esport</p>
            <p class="landing-txt2 mt30">150 rue de Rivoli<br>75001 Paris</p>
            <div class="mt50">
                <div class="row mt40">
                    <div class="col-md-4">
                        <div class="mb30">
                            <div class="badge-item-stat btn-espace">
                                <p class="badge-item-stat-title txt-case">150 postes de jeux<br>PC et Consoles</p>
                            </div>
                        </div>
                        <div class="mb30">
                            <div class="badge-item-stat btn-espace">
                                <p class="badge-item-stat-title txt-case">2 zones restauration/bar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb30">
                            <div class="badge-item-stat btn-espace">
                                <p class="badge-item-stat-title txt-case">Une arène pro<br>150 places</p>
                            </div>
                        </div>
                        <div class="mb30">
                            <div class="badge-item-stat btn-espace">
                                <p class="badge-item-stat-title txt-case">Boutique Gaming/Esport</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="mb30">
                            <div class="badge-item-stat btn-espace">
                                <p class="badge-item-stat-title txt-case">Salle réception<br>VIP</p>
                            </div>
                        </div>
                        <div class="mb30">
                            <div class="badge-item-stat btn-espace">
                                <p class="badge-item-stat-title txt-case">Et bien plus<br> encore !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="landing-form ">
            <div class="form-box login-register-form-element">
                <h2 class="form-box-title">Se tenir informé !</h2>
                <!-- FORM -->
                <?php if (function_exists('newsletter_form')) newsletter_form(1); ?>
                <!-- /FORM -->
                <p class="form-text center ">Vous recevrez toutes les infos concernant l'ouverture et les évènements en avant première.
                    <div class="social-links ">
                        <a class="social-link twitter " href="https://twitter.com/espotparis">
                            <img class="size-icon1" src="https://espot.fr/wp-content/uploads/2020/10/twitter.png">
                        </a>
                        <a class="social-link instagram " href="https://www.instagram.com/espotparis/">
                            <img class="size-icon1" src="https://espot.fr/wp-content/uploads/2020/10/instagram.png">
                        </a>
                    </div>
            </div>
        </div>
	  	<div class="container-fluid footer-2">
            <div class="row">
                <div class="col-md-12">
                    <p class="txt-f2">© 2020 ESpot SAS - <a class="txt-f2" href="mailto:contact@espot.fr ">contact@espot.fr</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /LANDING -->

