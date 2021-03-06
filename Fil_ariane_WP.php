<?php // Breadcrumb navigation
 if (is_page() && !is_front_page() || is_single() || is_category())
 {
     echo '<ul>';
     echo '<li><a title="Home - Your website" rel="nofollow" href="http://yourwebsite.com/">Home</a></li>';

     if (is_page()) {
         $ancestors = get_post_ancestors($post);

         if ($ancestors) {
             $ancestors = array_reverse($ancestors);
             foreach ($ancestors as $crumb) {
             echo '<li><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li>';
             }
         }
     }

     if (is_single()) {
         $category = get_the_category();
         echo '<li><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li>';
      }

     if (is_category()) {
         $category = get_the_category();
         echo '<li>'.$category[0]->cat_name.'</li>';
     }

     // Current page
     if (is_page() || is_single()) {
         echo '<li>'.get_the_title().'</li>';
     }
     echo '</ul>';
 }


 elseif (is_front_page()) {
     // Front page
     echo '<ul>';
     echo '<li><a title="Home - Your website" rel="nofollow" href="http://yourwebsite.com/">Home</a></li>';
     echo '</ul>';
 }
?>
