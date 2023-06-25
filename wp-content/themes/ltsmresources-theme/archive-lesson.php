<?php

get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/banner.png') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All Lessons!!!!</h1>
    
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
  <p>dfhgj</p>
</div>
<?php get_footer();

?>