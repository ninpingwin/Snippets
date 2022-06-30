<?php
		$cookies_to_display = true;
		if(isset($_COOKIE['info_cookies']) && !empty($_COOKIE['info_cookies'])){
			$cookies_to_display = false;
		}

		$_SESSION['cookies_to_display'] = $cookies_to_display;
		if((isset($_GET['cookies']) && $_GET['cookies']=='ok') || (isset($_SESSION['cookies_to_display']) && $_SESSION['cookies_to_display']==true )) { ?>

		<!-- Cookie Alert -->
		<div class="cookieBar" id="cookieBarId">
			<div class="content_wrap">
				<p>En poursuivant votre navigation, vous acceptez l'utilisation de cookies à des fins d'analyse et de services personnalisés.
				<span class="fontawesomeTimes" id="fake_popup_info"><i class="fa fa-times" aria-hidden="true"></i></span></p>
			</div>
		</div>

		<script type="text/javascript">
			(function($) {
				$(function() {
					$('#cookies_ok').on('click',function(e){
						e.preventDefault();
						accept_cookies();
					});
				});
			})(jQuery);


			function accept_cookies(){
			(function($) {
			var d = new Date();

			setCookie('info_cookies',d.toString(),365);
			$('.cookieBar').hide().remove();
			})(jQuery);
			}

			function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
			}
		</script>
		<?php } ?>
