<?php
/**
 * Mexicola: portada tipográfica y una sola receta destacada. Recibe $product desde page.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$d    = pascual_data();
$base = trailingslashit( home_url() );
$p    = $product;
$r    = ! empty( $p['recipes'][0] ) ? $p['recipes'][0] : null;
?>

<section class="mx" style="--hero-bg: <?php echo esc_attr( pascual_brand_var( $p['slug'] ) ); ?>; --hero-fg: <?php echo esc_attr( pascual_brand_var( $p['slug'], true ) ); ?>;">
	<div class="wrap mx__inner">
		<nav class="crumbs" aria-label="Ruta"><a href="<?php echo esc_url( $base ); ?>">Inicio</a> <span aria-hidden="true">/</span> <a href="<?php echo esc_url( $base . '#marcas' ); ?>">Productos</a> <span aria-hidden="true">/</span> <span aria-current="page"><?php echo esc_html( $p['name'] ); ?></span></nav>
		<h1 class="mx__word"><?php echo esc_html( $p['name'] ); ?></h1>
		<p class="mx__tag"><?php echo esc_html( $p['tagline'] ); ?></p>
		<p class="mx__intro"><?php echo esc_html( $p['intro'] ); ?></p>
		<div class="hero__actions">
			<a class="btn btn--primary" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Pedir en línea</a>
			<a class="btn btn--ghost" href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Dónde comprar</a>
		</div>
		<img class="mx__bottle" src="<?php echo pascual_img( 'prod-mexicola.webp' ); // phpcs:ignore ?>" alt="Botella de Mexicola" fetchpriority="high" decoding="async">
	</div>
</section>

<div class="pbody" style="--accent: var(--red); --accent-ink: var(--white);">
	<?php if ( $r ) : ?>
	<section class="section" id="receta">
		<div class="wrap feature">
			<figure class="feature__photo">
				<img src="<?php echo pascual_p_img( $r[2] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $r[0] ); ?>" width="560" height="997" loading="lazy" decoding="async">
			</figure>
			<div class="feature__body">
				<p class="feature__kicker">Receta con Mexicola</p>
				<h2><?php echo esc_html( $r[0] ); ?></h2>
				<p class="lead"><?php echo esc_html( $r[1] ); ?></p>
				<a class="btn btn--primary" href="<?php echo esc_url( pascual_recipe_url( $r ) ); ?>">Ver la receta</a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php include get_theme_file_path( 'template-parts/product-more.php' ); ?>
</div>

<?php
get_footer();
