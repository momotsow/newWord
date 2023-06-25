<?php
/**
 * Plugin Name: Quiz Plugin
 * Description: A WordPress plugin for creating multiple-choice quizzes.
 * Version: 1.0.0
 * Author: Paper Instrument
 * Author URI: Your Website
 */

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'quiz_enqueue_scripts');

function quiz_enqueue_scripts() {
    wp_enqueue_script('quiz-script', plugin_dir_url(__FILE__) . 'quiz-script.js', array('jquery'), '1.0', true);
    wp_localize_script('quiz-script', 'quizSettings', array(
        'apiUrl' => rest_url('quiz-plugin/v1/questions')
    ));
}

// Register REST API endpoints
add_action('rest_api_init', 'register_quiz_endpoints');

function register_quiz_endpoints() {
    register_rest_route('quiz-plugin/v1', '/questions', array(
        'methods' => 'GET',
        'callback' => 'get_quiz_questions',
    ));

    register_rest_route('quiz-plugin/v1', '/check-answers', array(
        'methods' => 'POST',
        'callback' => 'check_quiz_answers',
    ));
}

// Get quiz questions
function get_quiz_questions() {
    $json_file_path = plugin_dir_path(__FILE__) . 'data/quiz-questions.json';
    $quiz_questions = file_get_contents($json_file_path);
    $quiz_questions = json_decode($quiz_questions, true);

    return $quiz_questions;
}

// Check quiz answers
function check_quiz_answers(WP_REST_Request $request) {
    $json_file_path = plugin_dir_path(__FILE__) . 'data/quiz-questions.json';
    $quiz_questions = file_get_contents($json_file_path);
    $quiz_questions = json_decode($quiz_questions, true);

    $userAnswers = $request->get_json_params();

    $results = array();

    foreach ($quiz_questions as $index => $question) {
        $correctAnswers = $question['correctAnswers'];
        $userAnswer = $userAnswers[$index];

        $isCorrect = in_array($userAnswer, $correctAnswers);
        $results[$index] = $isCorrect;
    }

    return array(
        'results' => $results
    );
}
