<?php
// Template Name: HBG Home Full Width
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
        <?php printPostsPerCat('aktuellt', 1); ?>
        <?php include 'search.php'; ?>       
        <?php the_content(); ?>
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
