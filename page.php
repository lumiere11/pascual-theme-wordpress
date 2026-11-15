<?php
/**
 * Páginas internas (Nosotros, Valores, Historia, etc.).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Páginas con diseño propio: marcas (boing, lulu, ...) y Nosotros.
$pascual_slug = get_post_field( 'post_name', get_queried_object_id() );
$product      = pascual_product( $pascual_slug );
if ( $product ) {
	$pascual_tpl = ! empty( $product['layout'] ) && file_exists( get_theme_file_path( 'template-parts/product-' . $product['layout'] . '.php' ) ) ? 'product-' . $product['layout'] : 'product';
	include get_theme_file_path( 'template-parts/' . $pascual_tpl . '.php' );
	return;
}
$pascual_inner = pascual_inner_pages();
if ( isset( $pascual_inner[ $pascual_slug ] ) ) {
	include get_theme_file_path( 'template-parts/' . $pascual_inner[ $pascual_slug ] . '.php' );
	return;
}
if ( 'nosotros' === $pascual_slug ) {
	include get_theme_file_path( 'template-parts/nosotros.php' );
	return;
}

get_header();
while ( have_posts() ) :
	the_post();
	?>
	<section class="page-head">
		<div class="wrap"><h1><?php the_title(); ?></h1></div>
	</section>
	<div class="wrap section">
		<article <?php post_class( 'prose' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="prose__thumb"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<?php the_content(); ?>
		</article>
	</div>
	<?php
endwhile;
get_footer();
