<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Deary
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<article class="nm-product">
			<div class="nm-product-top">
				<div class="nm-product-title">
					<h1><?php echo $post->post_title;?></h1>
				</div>
				<div class="nm-product-content">
					<p><?php echo $post->post_content;?></p>
				</div>
			</div>
			<div class="nm-product-bottom">
				<div class="nm-product-image">
						<?php echo get_the_post_thumbnail($post); ?>
				</div>
				
					
				<?php if (isset(get_post_meta($post->ID)['nm_nutrition_facts']) && !empty(get_post_meta($post->ID)['nm_nutrition_facts'][0])): ?>
					
					<div class="nm-product-nutrition-facts">
					<?php
					foreach(get_post_meta($post->ID)['nm_nutrition_facts'] as $post_nutrition_facts) {
						echo $post_nutrition_facts;
					}
					?>
					</div>
				<?php endif; ?>
					
				
			</div>

		</article>

	</main><!-- #main -->

<?php
get_footer();

