<script>
  jQuery(document).ready(function($) {
    $("#proc-tabs").tabs();
  });
</script>
<div id="proc-tabs" style="overflow:hidden;">
  <ul>
    <?php if (get_field('rubrik1')): ?><li><a href="#tabs-1"><?php the_field('rubrik1'); ?></a></li><?php endif; ?>
    <?php if (get_field('rubrik2')): ?><li><a href="#tabs-2"><?php the_field('rubrik2'); ?></a></li><?php endif; ?>
    <?php if (get_field('rubrik3')): ?><li><a href="#tabs-3"><?php the_field('rubrik3'); ?></a></li><?php endif; ?>
    <?php if (get_field('rubrik4')): ?><li><a href="#tabs-4"><?php the_field('rubrik4'); ?></a></li><?php endif; ?>
    <?php if (get_field('rubrik5')): ?><li><a href="#tabs-5"><?php the_field('rubrik5'); ?></a></li><?php endif; ?>
  </ul>
  <?php if (get_field('rubrik1')): ?>
  <div id="tabs-1">
    <p><?php the_field('text1'); ?></p>
  </div>
  <?php endif; ?>
  <?php if (get_field('rubrik2')): ?>
  <div id="tabs-2">
    <p><?php the_field('text2'); ?></p>
  </div>
  <?php endif; ?>
  <?php if (get_field('rubrik3')): ?>
  <div id="tabs-3">
    <p><?php the_field('text3'); ?></p>
  </div>
  <?php endif; ?>
  <?php if (get_field('rubrik4')): ?>
  <div id="tabs-4">
    <p><?php the_field('text4'); ?></p>
  </div>
  <?php endif; ?>
  <?php if (get_field('rubrik5')): ?>
  <div id="tabs-5">
    <p><?php the_field('text5'); ?></p>
  </div>
  <?php endif; ?>
</div>
