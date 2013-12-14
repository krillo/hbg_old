<?php
// Template Name: HBG Full Width
get_header();
?>
<div id="content" class="full-width">
  <?php while (have_posts()): the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php
      global $data;
      if (!$data['featured_images_pages'] && has_post_thumbnail()):
        ?>
        <div class="image">
        <?php the_post_thumbnail('full'); ?>
        </div>
        <?php endif; ?>
      <div class="post-content">
        <?php
        if (get_field('notice')) {
          include 'notice.php';
        }
        ?>
          <?php the_content(); ?>
        <div>
          <?php
          if (get_field('feedback')) {
            include 'overlay_feedback.php';
          }
          ?>
        </div>
        <div class="proc-tabs">
          <?php
          if (get_field('tabs')) {
            include 'tabs.php';
          }
          ?>
        </div>

      <?php wp_link_pages(); ?>
      </div>
      <?php if ($data['comments_pages']): ?>
        <?php wp_reset_query(); ?>
        <?php comments_template(); ?>
    <?php endif; ?>
    </div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>