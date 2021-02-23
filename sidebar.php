<div class="l-outbar"></div>
<div class="l-sidebar">
        <div class="p-sidebar">
                <a href="#" class="p-batsu">×</a>
                　<a class="c-sidebar-title">Menu</a>
                <?php wp_nav_menu(
                        array(
                                'theme_location' => 'global_nav',
                                'menu_class' => 'p-sidebar-menu'
                        )
                );
                ?>
        </div>
</div>
<?php
if (is_active_sidebar('カテゴリーウィジェット')) :
        dynamic_sidebar('カテゴリーウィジェット');
else :
?>
        <div class="widget">
                <h2>No Widget</h2>
                <p>ウィジットは設定されていません。</p>
        </div>
<?php endif; ?>