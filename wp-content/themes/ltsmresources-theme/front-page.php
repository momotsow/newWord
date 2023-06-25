<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/Group28.png') ?>);"></div>
  <div class="page-banner__content container container--narrow">
  </div>  
</div>

<h1>Events</h1>
  <!-- Grades -->
  <ul class="link-list min-list">

    <?php 

      $homepageEvents = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'event'
      ));

      while($homepageEvents->have_posts()) {
        $homepageEvents->the_post(); ?>
        <div class="event-summary">
          
          <div class="event-summary__content">
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          </div>
        </div>
      <?php }
    ?>
  </ul>

<h1>Grades</h1>
  <!-- Grades -->
  <ul class="min-list">

  <?php 

          $homepageGrades = new WP_Query(array(
            'posts_per_page' => 50,
            'post_type' => 'grade'
          ));

          while($homepageGrades->have_posts()) {
            $homepageGrades->the_post(); ?>
            <div class="card">
             
              <div class="event-summary__content">
              <li><h2><?php the_title(); ?></h2></li>
              <li>Books & Learning Materials here</li>

              </div>
              <a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading</a>

            </div>
          <?php }
        ?>


          </ul>

<h1>Latest lessons</h1>
  <!-- lessons -->
  <ul class="link-list min-list">

  <?php 

          $homepageLessons = new WP_Query(array(
            'posts_per_page' => 50,
            'post_type' => 'lesson'
          ));

          while($homepageLessons->have_posts()) {
            $homepageLessons->the_post(); ?>
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <?php the_post_thumbnail('lessonPortrait'); ?>
                </div>
                
                <div class="event-summary__content">
                
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
              </div>
              
              </div>
            </div>
          <?php }
        ?>


          </ul>
          
<?php get_footer();

?>