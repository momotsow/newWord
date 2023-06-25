<?php

add_action('rest_api_init', 'ltsmLikeRoutes');

function ltsmLikeRoutes() {
  register_rest_route('ltsm/v1', 'manageLike', array(
    'methods' => 'POST',
    'callback' => 'createLike'
  ));

  register_rest_route('ltsm/v1', 'manageLike', array(
    'methods' => 'DELETE',
    'callback' => 'deleteLike'
  ));
}

function createLike($data) {
  if (is_user_logged_in()) {
    $grade = sanitize_text_field($data['gradeId']);

    $existQuery = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => 'liked_grade_id',
          'compare' => '=',
          'value' => $grade
        )
      )
    ));

    if ($existQuery->found_posts == 0 AND get_post_type($grade) == 'grade') {
      return wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => '2nd PHP Test',
        'meta_input' => array(
          'liked_grade_id' => $grade
        )
      ));
    } else {
      die("Invalid grade id");
    }

    
  } else {
    die("Only logged in users can create a like.");
  }

  
}

function deleteLike($data) {
  $likeId = sanitize_text_field($data['like']);
  if (get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like') {
    wp_delete_post($likeId, true);
    return 'Congrats, like deleted.';
  } else {
    die("You do not have permission to delete that.");
  }
}