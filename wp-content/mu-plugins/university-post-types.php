<?php

function ltsm_post_types() {
  // Campus Post Type
  register_post_type('campus', array(
    'capability_type' => 'campus',
    'map_meta_cap' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'campuses'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Campuses',
      'add_new_item' => 'Add New Campus',
      'edit_item' => 'Edit Campus',
      'all_items' => 'All Campuses',
      'singular_name' => 'Campus'
    ),
    'menu_icon' => 'dashicons-location-alt'
  ));
  
  // Event Post Type
  register_post_type('event', array(
    'capability_type' => 'event',
    'map_meta_cap' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

//Program => Lesson
register_post_type('lesson', array(
  'show_in_rest' => true,
  'supports' => array('title', 'editor', 'thumbnail'),
  'rewrite' => array('slug' => 'lessons'),
  'has_archive' => true,
  'public' => true,
  'labels' => array(
    'name' => 'Lessons',
    'add_new_item' => 'Add New Lesson',
    'edit_item' => 'Edit Lesson',
    'all_items' => 'All Lessons',
    'singular_name' => 'Lesson'
  ),
  'menu_icon' => 'dashicons-awards'
));

 // Professor Post Type => Grade
 register_post_type('grade', array(
  'show_in_rest' => true,
  'supports' => array('title', 'editor', 'thumbnail'),
  'rewrite' => array('slug' => 'grades'),
  'has_archive' => true,
  'public' => true,
  'labels' => array(
    'name' => 'Grades',
    'add_new_item' => 'Add New Grade',
    'edit_item' => 'Edit Grade',
    'all_items' => 'All Grades',
    'singular_name' => 'Grade'
  ),
  'menu_icon' => 'dashicons-welcome-learn-more'
));

  // Note Post Type
  register_post_type('note', array(
    'capability_type' => 'note',
    'map_meta_cap' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'public' => false,
    'show_ui' => true,
    'labels' => array(
      'name' => 'Notes',
      'add_new_item' => 'Add New Note',
      'edit_item' => 'Edit Note',
      'all_items' => 'All Notes',
      'singular_name' => 'Note'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));

  // Like Post Type
  register_post_type('like', array(
    'supports' => array('title'),
    'public' => false,
    'show_ui' => true,
    'labels' => array(
      'name' => 'Likes',
      'add_new_item' => 'Add New Like',
      'edit_item' => 'Edit Like',
      'all_items' => 'All Likes',
      'singular_name' => 'Like'
    ),
    'menu_icon' => 'dashicons-heart'
  ));
}

add_action('init', 'ltsm_post_types');