<?php
/**
 * Portada de marca compartida. Usa $p, $d, $base, $pres, $hero.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="phero" style="--hero-bg: <?php echo esc_attr( pascual_brand_var( $p['slug'] ) ); ?>; --hero-fg: <?php echo esc_attr( pascual_brand_var( $p['slug'], true ) ); ?>;">
	<div class="wrap phero__inner">
		<div class="phero__copy">
			<nav class="crumbs" aria-label="Ruta"><a href="<?php echo esc_url( $base ); ?>">Inicio</a> <span aria-hidden="true">/</span> <a href="<?php echo esc_url( $base . '#marcas' ); ?>">Productos</a> <span aria-hidden="true">/</span> <span aria-current="page"><?php echo esc_html( $p['name'] ); ?></span></nav>
			<h1><?php echo esc_html( $p['name'] ); ?></h1>
			<p class="phero__tag"><?php echo esc_html( $p['tagline'] ); ?></p>
			<p class="phero__intro"><?php echo esc_html( $p['intro'] ); ?></p>
			<div class="hero__actions">
				<?php if ( $pres ) : ?>
					<a class="btn btn--solid" href="#presentaciones">Ver presentaciones</a>
				<?php endif; ?>
				<a class="btn btn--ghost" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Pedir en línea</a>
			</div>
		</div>
		<div class="phero__art">
			<img class="phero__product phero__product--<?php echo esc_attr( $p['slug'] ); ?>" src="<?php echo $hero; // phpcs:ignore ?>" alt="Producto <?php echo esc_attr( $p['name'] ); ?>" fetchpriority="high" decoding="async">
			<img class="phero__badge" src="<?php echo pascual_img( 'brand-' . $p['slug'] . '.webp' ); // phpcs:ignore ?>" alt="" width="110" height="110" decoding="async">
		</div>
	</div>
</section>
