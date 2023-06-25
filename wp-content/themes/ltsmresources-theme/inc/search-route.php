<?php

add_action('rest_api_init', 'ltsmRegisterSearch');

function ltsmRegisterSearch() {
  register_rest_route('ltsm/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'ltsmSearchResults'
  ));
}

function ltsmSearchResults($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'grade', 'lesson', 'event'),
    's' => sanitize_text_field($data['term'])
  ));

  $results = array(
    'generalInfo' => array(),
    'grades' => array(),
    'lessons' => array(),
    'events' => array(),
  );

  while($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if (get_post_type() == 'post' OR get_post_type() == 'page') {
      array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'authorName' => get_the_author()
      ));
    }

    if (get_post_type() == 'grade') {
      $relatedLessons = get_field('related_lesson');

      if ($relatedLessons) {
        foreach($relatedLessons as $lesson) {
          array_push($results['lessons'], array(
            'title' => get_the_title($lesson),
            'permalink' => get_the_permalink($lesson)
          ));
        }
      }

      array_push($results['grades'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'image' => get_the_post_thumbnail_url(0, 'gradeLandscape')
      ));
    }

    if (get_post_type() == 'lesson') {
    
      array_push($results['lessons'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'id' => get_the_id()
      ));
    }

    if (get_post_type() == 'event') {
      $eventDate = new DateTime(get_field('event_date'));
      $description = null;
      if (has_excerpt()) {
        $description = get_the_excerpt();
      } else {
        $description = wp_trim_words(get_the_content(), 18);
      }

      array_push($results['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'month' => $eventDate->format('M'),
        'day' => $eventDate->format('d'),
        'description' => $description
      ));
    }
    
  }

  if ($results['lessons']) {
    $programsMetaQuery = array('relation' => 'OR');

    foreach($results['lessons'] as $item) {
      array_push($programsMetaQuery, array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . $item['id'] . '"'
        ));
    }

    $programRelationshipQuery = new WP_Query(array(
      'post_type' => array('grade', 'event'),
      'meta_query' => $programsMetaQuery
    ));

    while($programRelationshipQuery->have_posts()) {
      $programRelationshipQuery->the_post();

      if (get_post_type() == 'event') {
        $eventDate = new DateTime(get_field('event_date'));
        $description = null;
        if (has_excerpt()) {
          $description = get_the_excerpt();
        } else {
          $description = wp_trim_words(get_the_content(), 18);
        }

        array_push($results['events'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'month' => $eventDate->format('M'),
          'day' => $eventDate->format('d'),
          'description' => $description
        ));
      }

      if (get_post_type() == 'grade') {
        array_push($results['grades'], array(
          'title' => get_the_title(),
          'permalink' => get_the_permalink(),
          'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
        ));
      }

    }

    $results['grades'] = array_values(array_unique($results['grades'], SORT_REGULAR));
    $results['events'] = array_values(array_unique($results['events'], SORT_REGULAR));
  }


  return $results;

}