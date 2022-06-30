<!-- Loop allowing to show all the pages with content and the children of menus -->
<?php
  global $post;

  // if a page has children, display the children
  if( is_page() && $post->post_parent) {
    $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
  }
  else if (!($post->post_parent)) {
    $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=1');
  }

  if ($children) { ?>

  	<div class="entry-header">
  		<h1> <?php the_title(); ?></h1>
  	</div>
    <ul class="pageChildrenUl">
      <?php echo $children; ?>
    </ul>

  <?php }

  else // if not, display the content
  	{
  	get_template_part( 'template-parts/page/content', 'page' );
  	}


?>
