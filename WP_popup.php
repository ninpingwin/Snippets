<?php
// CODE TO GET THE POPUP WORKING

@session_start();
$_SESSION['site_info'] = '';
$popup_actif = -1; // indique si au moins un popup est actif

// args
$args = array(
  'numberposts' => 1,
  'post_type' => 'popup',
  'meta_key' => 'activation',
  'meta_value' => '1',
);

// get results
$the_query = new WP_Query( $args );

// The Loop
?>
<?php if( $the_query->have_posts() ): ?>

  <?php while ( $the_query->have_posts() ) : $the_query->the_post();
      $popup_actif = get_the_ID();
    ?>
  <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query();  // Restore global post data stomped by the_post().


if(($_SESSION['site_info']!='ok' && ( $popup_actif>0 )) ||  $_GET['test']=='kapsicum' ||  $_GET['visualisation']=='popup'){ ?>
<script type="text/javascript">
// Activate fancyBox
jQuery(function($) {
$("#fake_popup_info_link")
    .fancybox({
        padding : 0,
  scrolling : "no"
    });
// Launch fancyBox on first element
$("#fake_popup_info_link").trigger('click');
});
</script>
<?php
$_SESSION['site_info'] = 'ok';
} ?>


</head>

<body <?php body_class(); ?>>

<div id="fake_popup_info" style="display:none;">
  <a id="fake_popup_info_link" href="#popup-info">Popup du site</a>
  <div id="popup-info">

<?php // if activé ?>
<?php /*if( get_field('activation', $popup_actif) ){  */ ?>
    <?php if( get_field('lien', $popup_actif) ) { ?><a href="<?php the_field('lien', $popup_actif); ?>"><?php } ?>
    <!--img src="<?php the_field('image', $popup_actif); ?>" style="display:block; border:none;" title="<?php the_field('titre', $popup_actif); ?>" alt="<?php the_field('titre', $popup_actif); ?>" /-->
  <?php if( get_field('lien', $popup_actif) ) { ?></a><?php } ?>

  <div id="titre-texte" class="<?php the_field('position_du_titre', $popup_actif); ?> <?php the_field('couleur', $popup_actif); ?>">
    <?php if( get_field('afficher_le_titre', $popup_actif) )
    { ?>
      <?php if( get_field('lien', $popup_actif) ) { ?><a href="<?php the_field('lien', $popup_actif); ?>"><?php } ?><h1><?php the_field('titre', $popup_actif); ?></h1><?php if( get_field('lien', $popup_actif) ) { ?></a><?php } ?>
    <?php } ?>

    <?php if( get_field('afficher_le_texte', $popup_actif) )
    { ?>
      <?php if( get_field('lien', $popup_actif) ) { ?><a href="<?php the_field('lien', $popup_actif); ?>"><?php } ?><h2><?php the_field('texte', $popup_actif); ?></h2><?php if( get_field('lien', $popup_actif) ) { ?></a><?php } ?>
    <?php } ?>

    <?php if( get_field('afficher_le_bouton', $popup_actif) )
    { ?>
      <?php if( get_field('lien', $popup_actif) ) { ?><a class="bouton <?php the_field('style_du_bouton', $popup_actif); ?>" href="<?php the_field('lien', $popup_actif); ?>"><?php } ?><?php the_field('bouton', $popup_actif); ?><?php if( get_field('lien', $popup_actif) ) { ?></a><?php } ?>
    <?php } ?>

  </div>

<?php /* } */ ?>
