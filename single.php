<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Deary
 */

$post_meta = get_post_meta($post->ID);

// Set accent color, use default black if not set
if (array_key_exists('nm_accent_color', $post_meta) && !empty($post_meta['nm_accent_color'])) {
    $accent_color = $post_meta['nm_accent_color'][0];
} else {
    $accent_color = '#000';
}

// Use multicolor title if set, regular title if not
if (array_key_exists('nm_multicolor_title', $post_meta) && !empty($post_meta['nm_multicolor_title'])) {
    $multicolor_title = $post_meta['nm_multicolor_title'][0];
    $title = preg_replace_callback('/%(.*?)%/s', function ($matches) use ($accent_color) {
        return '<span style="color:' . $accent_color . '">' . $matches[1] . '</span>';
    }, $multicolor_title);
} else {
    $title = $post->post_title;
}


get_header();
?>

	<main id="primary" class="site-main">
		
		<article class="nm-product">
			<div class="nm-product-top">
				<div class="nm-product-top-left">
					<div class="nm-product-title">
						<h1><?php echo $title;?></h1>
					</div>
					<div class="nm-product-content">
						<?php echo wpautop($post->post_content);?>
					</div>
				</div>
				<div class="nm-product-top-center">
					<div class="nm-product-image">
							<?php echo get_the_post_thumbnail($post); ?>
					</div>
				</div>
				<div class="nm-product-top-right">
					<?php if (array_key_exists('nm_quote', $post_meta)): ?>
						<div class="nm-product-quote">
							<p style="color:<?php echo $accent_color; ?>"><?php echo "\"" . $post_meta['nm_quote'][0] . "\""; ?></p>
						</div>
					<?php endif; ?>
				</div>
			</div>	
			<?php if (array_key_exists('nm_nutrition_facts', $post_meta)): ?>
			<div class="nm-product-bottom">
				<div class="nm-product-nutrition-facts">
					<?php echo wpautop($post_meta['nm_nutrition_facts'][0]); ?>
				</div>
			</div>
			<?php endif; ?>							
		</article>
	</main><!-- #main -->

<?php
get_footer();
