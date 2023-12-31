<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
     ?>
    

    <div class="container container--narrow page-section">
          
      <div class="generic-content">
        <div class="row group">
        <?php the_post_thumbnail('lessonLandscape'); ?>

          <div class="two-thirds">
          <div class="generic-content"><?php the_content(); ?></div>
          </div>

          <div class="one-third">
            <?php

              $likeCount = new WP_Query(array(
                'post_type' => 'like',
                'meta_query' => array(
                  array(
                    'key' => 'liked_lesson_id',
                    'compare' => '=',
                    'value' => get_the_ID()
                  )
                )
              ));

              $existStatus = 'no';

              if (is_user_logged_in()) {
                $existQuery = new WP_Query(array(
                  'author' => get_current_user_id(),
                  'post_type' => 'like',
                  'meta_query' => array(
                    array(
                      'key' => 'liked_lesson_id',
                      'compare' => '=',
                      'value' => get_the_ID()
                    )
                  )
                ));

                if ($existQuery->found_posts) {
                  $existStatus = 'yes';
                }
              }

              

            ?>

            <span class="like-box" data-like="<?php if (isset($existQuery->posts[0]->ID)) echo $existQuery->posts[0]->ID; ?>" data-lesson="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
              <i class="fa fa-heart-o" aria-hidden="true"></i>
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
            </span>
          </div>

        </div>
      </div>



    </div>
    
  <?php }

  get_footer();

?>