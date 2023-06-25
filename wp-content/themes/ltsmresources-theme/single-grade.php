<?php
  
  get_header();

  while(have_posts()) {
    the_post(); ?>
    <div class="inner_banner" style="background-color:#DEE7F4;">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
    </div>

    <div class="container ">
          

      <!-- <div class="generic-content">
        <div class="row group">

          <div class="one-third">
            <?php the_post_thumbnail('gradePortrait'); ?>
          </div>

          <div class="two-thirds">
            <?php the_content(); ?>
          </div>

        </div>
      </div> -->

      <?php
        $relatedLessons = get_field('related_programs');
      
        if ($relatedLessons) {
          echo '<ul class="link-list min-list">';
          foreach($relatedLessons as $lesson) { ?>

            <div class="card" style="border: 1px solid red;">
              <div class="card-content">
                <div class="card-img">
                <?php echo get_the_post_thumbnail($lesson, 'lessonPortrait'); ?>
                </div>
                
                <div class="event-summary__content">
                
                <li><a href="<?php echo get_the_permalink($lesson); ?>">
                  <?php echo get_the_title($lesson); ?>
                </a></li>
              </div>
              
              </div>
            </div>
          <?php }
          echo '</ul>';
        }

      ?>

    </div>
    
  <?php }


  get_footer();

?>