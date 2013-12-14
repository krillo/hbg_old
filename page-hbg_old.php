<?php
/**
 * Template Name: Hbg
 * 
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>

<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">

    <?php /* The loop */ ?>
    <?php while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php if (has_post_thumbnail() && !post_password_required()) : ?>
            <div class="entry-thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->


        <?php printPostsPerCat('aktuellt', 1); ?>


        <?php
        include 'search.php';
        ?>        

        <div class="entry-content">
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
          <div>
            <?php
            if (get_field('tabs')) {
              include 'tabs.php';
            }
            ?>
          </div>
        </div><!-- .entry-content -->

        <footer class="entry-meta">
          <?php edit_post_link(__('Edit', 'twentythirteen'), '<span class="edit-link">', '</span>'); ?>
        </footer><!-- .entry-meta -->
      </article><!-- #post -->
      <?php comments_template(); ?>
    <?php endwhile; ?>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
