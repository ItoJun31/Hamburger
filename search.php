<?php get_header(); ?>
<div class="p-heder-image--Cheeseburger">
  <h1>Menu:<br class="p-heder-ja"><span><?php the_search_query(); ?></span></h1>
  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/archive_header.png" alt="ロゴ画像">
</div>
</header>
<div class="l-section">
  <!--<div class="p-section"> -->
  <div class="p-section-Subheading">
  </div>
  <?php if (have_posts()) : ?>
    <?php
    if (isset($_GET['s']) && empty($_GET['s'])) {
      echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
    } else {
      echo '“' . $_GET['s'] . '”の検索結果：' . $wp_query->found_posts . '件'; // 検索キーワードと該当件数を表示
    }
    ?>
    <ul>
      <?php while (have_posts()) : the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php else : ?>
    検索結果が見つかりませんでした
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