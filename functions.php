<?php

$custom_header_defaults = array(
    'default-image' => get_bloginfo('template_url').'/images/headers/logo.png',
    'header-text' => false,
);
add_theme_support('custom-header',$custom_header_defaults);

register_nav_menu('mainmenu','メインメニュー');

function pagenation($pages = '', $range = 2){
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

add_action('admin_menu','add_custom_inputbox');
add_action('save_post','save_custom_postdata');

function add_custom_inputbox(){
    add_meta_box('top_img_id','トップ画像URL入力欄','custom_area4','page','normal');
    add_meta_box('about_id','ABOUT入力欄','custom_area','page','normal');
    add_meta_box('recruit_id','RECRUIT入力欄','custom_area2','page','normal');
    add_meta_box('map_id','map入力欄','custom_area3','page','normal');
}

function custom_area(){
    global $post;
    echo 'コメント　：<textarea cols="50" rows="5" name="about_msg">'.get_post_meta($post->ID,'about',true).'</textarea><br>';
}

function custom_area2(){
    global $post;

    echo '<table>';
    for($i = 1; $i<= 8; $i++){
        echo '<tr><td>info'.$i.':</td><td><input cols="50" rows="5" name="recruit_info'.$i.'" value="'.get_post_meta($post->ID,'recruit_info'.$i,true).'"></td></tr>';
    }
    echo '</table>';
}
function custom_area3(){
    global $post;
    echo 'マップ　：<textarea cols="50" rows="5" name="map">'.get_post_meta($post->ID,'map'.$i,true).'</textarea><br>';
}

function custom_area4(){
    global $post;
    echo 'トップ画像URL　：<input type="text" name="img_top" value="'.get_post_meta($post->ID,'img-top',true).'">';
}

function save_custom_postdata($post_id){
    $about_msg = '';
    $recruit_data = '';
    $map = '';
    $img_top = '';


    if(isset($_POST['img_top'])){
        $img_top = $_POST['img_top'];
    }

    if($img_top != get_post_meta($post_id,'img_top',true)){
        update_post_meta($post_id, 'img_top',$img_top);
    }elseif($img_top == ''){
        delete_post_meta($post_id,'img_top',get_post_meta($post_id,'img_top',true));
    }

    if(isset($_POST['about_msg'])){
        $about_msg = $_POST['about_msg'];
    }

    if($about_msg != get_post_meta($post_id,'about',true)){
        update_post_meta($post_id, 'about',$about_msg);
    }elseif($about_msg == ''){
        delete_post_meta($post_id,'about',get_post_meta($post_id,'about',true));
    }

    for($i = 1 ; $i <= 8; $i++){
        if(isset($_POST['recruit_info'.$i])){
            $recruit_data = $_POST['recruit_info'.$i];
        }
    
        if($recruit_data != get_post_meta($post_id,'recruit_info'.$i,true)){
            update_post_meta($post_id, 'recruit_info'.$i,$recruit_data);
        }elseif($recruit_data== ''){
            delete_post_meta($post_id,'recruit_info'.$i,get_post_meta($post_id,'recruit_info'.$i,true));
        }
    }

    if(isset($_POST['map'])){
        $map = $_POST['map'];
    }

    if($map != get_post_meta($post_id,'map',true)){
        update_post_meta($post_id, 'map',$map);
    }elseif($map == ''){
        delete_post_meta($post_id,'map',get_post_meta($post_id,'map',true));
    }
}
