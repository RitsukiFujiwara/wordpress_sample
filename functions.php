<?php
$custom_header_defaults = array(
    'default-image' => get_bloginfo('template_url').'/images/headers/logo.png',
    'header-text' => false,
);
add_theme_support('custom-header',$custom_header_defaults);

// カスタムメニュー使用
register_nav_menu('mainmenu','メインメニュー');


//カスタムフィールドの作り方で追加
function pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1;
        }
    }
    if(1 != $pages){
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";

        if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged -1)."'>Prev</a></li>\n";
        for ($i = 1; $i <= $pages; $i++){
            if(1 != $pages &&( !($i >= $paged+range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo($paged == $i)? "<li class=\"active\">".$i."<\li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }
    if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
    echo "</ul>\n";
    echo "</div>\n";
    }
}
?>