<?php

get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/banner.png') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All grades!!!!</h1>
  </div>  
</div>

<div class="container container--narrow page-section">
<ul class="link-list min-list">

<?php
  while(have_posts()) {
    the_post(); ?>
    
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php }
  echo paginate_links();
?>
</ul>

</div>
<div>
  <p>less grad</p>
  <?php
     $relatedLessons = get_field('related_programs');
      
     if ($relatedLessons) {
       echo '<hr class="section-break">';
       echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
       echo '<ul class="link-list min-list">';
       foreach($relatedLessons as $lesson) { ?>
         <li><a href="<?php echo get_the_permalink($lesson); ?>"><?php echo get_the_title($lesson); ?></a></li>
       <?php }
       echo '</ul>';
     }

?>
</div>

<?php 
get_footer();

?>