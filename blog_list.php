<?php get_header();?>

		<?php get_template_part('content','menu');?>

		<div id="main">

			<!-- blog_list -->
			<section id="blog_list" class="site-width">
				<h1 class="title">BLOG</h1>
				<div id="content" class="article">
					<article class="article-item">
						<h2 class="article-title"><a href="blog.html">サンプル記事１サンプル記事１</a></h2>
						<h3 style="font-size:80%;">crazy-wp　2014年11月10日　カテゴリー： ブログ</h3>
						<img src="img/photo2.jpeg" class="article-img">
						<p class="article-body">
							サンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメント
							サンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメント
						</p>
					</article>
					<article class="article-item">
						<h2 class="article-title"><a href="blog.html">サンプル記事２サンプル記事２</a></h2>
						<h3 style="font-size:80%;">crazy-wp　2014年11月10日　カテゴリー： ブログ</h3>
						<img src="img/photo4.jpeg" class="article-img">
						<p class="article-body">
							サンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメント
							サンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメント
						</p>
					</article>
					<article class="article-item">
						<h2 class="article-title"><a href="blog.html">サンプル記事３サンプル記事３</a></h2>
						<h3 style="font-size:80%;">crazy-wp　2014年11月10日　カテゴリー： ブログ</h3>
						<img src="img/photo5.jpeg" class="article-img">
						<p class="article-body">
							サンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメント
							サンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメントサンプルコメント
						</p>
					</article>
					<div class="pagenation">
						<ul>
							<li class="active">1</li>
							<li><a href="">2</a></li>
							<li class="next"><a href="">NEXT</a></li>
						</ul>
					</div>

					<?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();?>
                <article class="article-item">
						<h2 class="article-title"><a href=""><?php the_permalink();?><?php the_title();?></a></h2>
						<h3 style="font-size:80%;"><?php the_author_nickname();?><?php the_time("Y年m月j日");?><?php single_cat_title('カテゴリー:');?></h3>
						<img src="img/photo2.jpeg" class="article-img">
						<p class="article-body">
                            <?php the_content();?>
						</p>
					</article>
                <?php endwhile; ?>
				<?php if (function_exists("pagination")) pagination($addition_loop->max_num_pages); ?>
				</div>
				
                <?php get_sidebar();?>
			</section>


		</div>
		<?php get_footer();?>