<?php get_header(); ?>
<div class="p-heder-image-single">
  <h1><?php the_title(); ?></h1>
  <?php the_post_thumbnail('small'); ?>
</div>
</header>
<div class="l-section">
  <div class="p-section">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
  </div>
</div>
<?php endwhile;
    else :
?>
<p>表示する記事がありません</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>