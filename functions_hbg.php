<?php

/**
 * Description: This is a customized functions.php for hbg intranet
 * 
 * Author: Kristian Erendi  <kristian@reptilo.se>
 * Author URI: http://reptilo.se
 * Date: 2013-11-28
 */
add_action('wp_enqueue_scripts', 'hbg_scripts');

/**
 * Enqueue some java scripts, only on front page
 * 
 * Author: Kristian Erendi 
 * URI: http://reptilo.se 
 * Date: 2013-10-22
 */
function hbg_scripts() {
wp_register_style('custom-style', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', array(), '20120208', 'all');
wp_enqueue_style('custom-style');
wp_register_style('feedback_form', get_bloginfo('stylesheet_directory') . '/hbg/feedback/form.css', array(), '20120208', 'all');
wp_enqueue_style('feedback_form');
wp_register_style('feedback_window', get_bloginfo('stylesheet_directory') . '/hbg/feedback/window.css', array(), '20120208', 'all');
wp_enqueue_style('feedback_window');
wp_register_style('font_awesome', get_bloginfo('stylesheet_directory') . '/hbg/font-awesome/css/font-awesome.min.css', array(), '20120208', 'all');
wp_enqueue_style('font_awesome');
wp_register_style('font_awesome_ie', get_bloginfo('stylesheet_directory') . '/hbg/font-awesome/css/font-awesome-ie7.min.css', array(), '20120208', 'all');
wp_enqueue_style('font_awesome_ie');
wp_register_style('hbg.css', get_bloginfo('stylesheet_directory') . '/hbg/css/hbg.css', array(), '20120208', 'all');
wp_enqueue_style('hbg.css');
//wp_enqueue_script('jquery-ui', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js', array('jquery'));
wp_enqueue_script('jquery.placeholder', get_bloginfo('stylesheet_directory') . '/hbg/js/jquery.placeholder.js', array('jquery'));
}

add_action('wp_ajax_rep_feedback', 'rep_feedback_callback');
add_action('wp_ajax_nopriv_rep_feedback', 'rep_feedback_callback');

function rep_feedback_callback() {
!empty($_REQUEST['pagename']) ? $pagename = addslashes($_REQUEST['pagename']) : $pagename = '';
!empty($_REQUEST['guid']) ? $guid = addslashes($_REQUEST['guid']) : $guid = '';
!empty($_REQUEST['type']) ? $type = addslashes($_REQUEST['type']) : $type = '';
!empty($_REQUEST['msg']) ? $msg = addslashes($_REQUEST['msg']) : $msg = '';
!empty($_REQUEST['email']) ? $email = addslashes($_REQUEST['email']) : $email = '';
//!empty($_REQUEST['to_email']) ? $to_email = addslashes($_REQUEST['to_email']) : $to_email = 'hravdelningen@helsingborg.se';
!empty($_REQUEST['to_email']) ? $to_email = addslashes($_REQUEST['to_email']) : $to_email = 'krillo@gmail.com';

$subject = "Feedback på intranätet";
$message = <<<MSG
Feedback

Sidanamn: $pagename
Länk: $guid
Typ: $type
Email: $email
          
  
$msg

MSG;

$success = wp_mail($to_email, $subject, $message);
$response = json_encode(array('success' => $success, 'guid' => $guid));
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo $response;
die(); // this is required to return a proper result
}

function printPostsPerCat($category = 'aktuellt', $nbr = 1){
global $post;
$args = array('category_name' => $category, 'posts_per_page' => $nbr);
$loop = new WP_Query($args);
if ($loop->have_posts()):
while ($loop->have_posts()) : $loop->the_post();
//echo '<div class="">' . get_the_content() . '</div>';
$content = get_the_content();
$title = get_the_title();
$guid = get_the_guid();
$readingbox .= <<<RB
<div class="reading-box-container" id="reading-box-container-1">
  <section class="reading-box tagline-shadow" style="background-color:#f6f6f6 !important;border-width:1px;border-color:#f6f6f6!important;border-left-width:3px !important;border-left-color:#d62a1e!important;border-style:solid;">
    <a href="$guid" target="" class="continue button large darkgray">LÄS MER HÄR</a>
    <h2>Aktuellt just nu: $title</h2>
    <p> $content </p>
    <a href="$guid" target="" class="continue mobile-button button large darkgray">LÄS MER HÄR</a>
  </section>
</div>
RB;
    endwhile;
  endif;
  wp_reset_query();
  echo $readingbox;
}



/*
add_filter('the_content', 'bottom_of_every_post');

function bottom_of_every_post($content){
  $fileName = dirname(__FILE__) . "/overlay_feedback.php";
  echo $fileName;
  if ((is_page() || is_post()) && file_exists($fileName)) {
    $theFile = fopen($fileName, "r");
    $msg = fread($theFile, filesize($fileName));
    fclose($theFile);
    return $content . stripslashes($msg);
  } else {
    return $content;
  }
}
*/