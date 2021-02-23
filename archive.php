<?php get_header(); ?>
<div class="p-heder-image--Cheeseburger">
  <h1>Menu:<br class="p-heder-ja"><span><?php
                                        if (is_category()) {
                                          echo single_cat_title();
                                        } elseif (is_tag()) {
                                          echo single_tag_title();
                                        }
                                        ?>
    </span></h1>
  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/archive_header.png" alt="ロゴ画像">
</div>
</header>

<div class="l-section">
  <!--<div class="p-section"> -->
  <div class="p-section-Subheading">
    <h2>小見出しが入ります</h2>
    <p>
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>
    </p>
  </div>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="p-section-menu">
        <!--section-1-->
        <div class="c-section-menu-left">
          <?php the_post_thumbnail('small'); ?>
        </div>
        <div class="c-section-menu-right">
          <h2><?php the_title(); ?></h2>
          <h3>小見出しが入ります</h3>
          <p>
            <?php the_excerpt(); ?>
          </p>
          <div class="c-menu-right-detail">
            <a href='<?php the_permalink(); ?>'>詳しく見る</a>
          </div>
        </div>
      </div>
    <?php endwhile;
  else :
    ?><p>表示する記事がありません</p>
  <?php endif; ?>

  <div class="l-pageswitching">
    <!--ページの切り替え"> -->
    <div class="p-pageswitching">
      <div class="c-pageswitching-left">
        <?php if (function_exists("wp_pagenavi")) : ?>
          <?php wp_pagenavi(); ?>
        <?php endif; ?>
      </div>
    </div>

    <!--ページの切り替え-sm -->
    <div class="p-pageswitching-sm">
      <?php
      $link = get_previous_posts_link('&lt;&lt;  前へ');
      if ($link) {
        $link = str_replace('<a', '<a class="c-pageswitching-left-2"', $link);
        echo $link;
      }
      ?>

      <?php
      $link = get_next_posts_link('次へ &gt;&gt;');
      if ($link) {
        $link = str_replace('<a', '<a class="c-pageswitching-right-1"', $link);
        echo $link;
      }
      ?>
    </div>
  </div>

</div>
</div>
<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>