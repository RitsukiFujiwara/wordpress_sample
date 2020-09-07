<?php get_header();?>

		<?php get_template_part('content','menu');?>

		<div id="main">

			<!-- blog_list -->
			<section id="blog_list" class="site-width">
				<h1 class="title">BLOG</h1>
				<div id="content" class="article">
				<?php get_template_part('loop');?>
				<?php if (function_exists("pagination")) pagination($addition_loop->max_num_pages); ?>
				</div>
				
                <?php get_sidebar();?>
			</section>


		</div>
		<?php get_footer();?>