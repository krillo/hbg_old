<div class="alert notice">
  <div class="msg">
    <?php the_field('notice') ?>
    <?php if (get_field('notice_link')): ?>
    <?php $post_obj = get_field('notice_link'); ?>
      <a title="<?php echo $post_obj->post_title; ?>" href="<?php echo $post_obj->guid; ?>" target="_blank"><?php echo $post_obj->post_title; ?></a>
    <?php endif; ?>
  </div>
</div>
