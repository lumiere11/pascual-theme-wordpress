<?php
/**
 * Leche Pascual: portada, una frase grande con su ficha y dos recetas. Recibe $product desde page.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$d    = pascual_data();
$base = trailingslashit( home_url() );
$p    = $product;
$x    = $p['presentations'][0];
?>

<section class="phero" style="--hero-bg: <?php echo esc_attr( pascual_brand_var( $p['slug'] ) ); ?>; --hero-fg: <?php echo esc_attr( pascual_brand_var( $p['slug'], true ) ); ?>;">
	<div class="wrap phero__inner">
		<div class="phero__copy">
			<nav class="crumbs" aria-label="Ruta"><a href="<?php echo esc_url( $base ); ?>">Inicio</a> <span aria-hidden="true">/</span> <a href="<?php echo esc_url( $base . '#marcas' ); ?>">Productos</a> <span aria-hidden="true">/</span> <span aria-current="page"><?php echo esc_html( $p['name'] ); ?></span></nav>
			<h1><?php echo esc_html( $p['name'] ); ?></h1>
			<p class="phero__intro"><?php echo esc_html( $p['intro'] ); ?></p>
			<div class="hero__actions">
				<a class="btn btn--solid" href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Dónde comprar</a>
				<a class="btn btn--ghost" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Pedir en línea</a>
			</div>
		</div>
		<div class="phero__art">
			<img class="phero__product phero__product--<?php echo esc_attr( $p['slug'] ); ?>" src="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] ); ?>" fetchpriority="high" decoding="async">
			<img class="phero__badge" src="<?php echo pascual_img( 'brand-' . $p['slug'] . '.webp' ); // phpcs:ignore ?>" alt="" width="110" height="110" decoding="async">
		</div>
	</div>
</section>

<div class="pbody" style="--accent: <?php echo esc_attr( pascual_brand_var( $p['slug'] ) ); ?>; --accent-ink: <?php echo esc_attr( pascual_brand_var( $p['slug'], true ) ); ?>;">
	<section class="section statement" id="calidad">
		<div class="wrap">
			<h2><?php echo esc_html( $p['tagline'] ); ?></h2>
			<dl class="spec">
				<div><dt>Tipo</dt><dd>Entera</dd></div>
				<div><dt>Presentación</dt><dd><?php echo esc_html( $x['size'] ); ?></dd></div>
			</dl>
		</div>
	</section>

	<?php if ( ! empty( $p['recipes'] ) ) : ?>
	<section class="section section--tint" id="recetas">
		<div class="wrap">
			<header class="section__head">
				<h2>Recetas con Leche Pascual</h2>
			</header>
			<ul class="recipes">
				<?php foreach ( $p['recipes'] as $r ) : ?>
					<li class="recipe"><a href="<?php echo esc_url( pascual_recipe_url( $r ) ); ?>">
						<img src="<?php echo pascual_p_img( $r[2] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $r[0] ); ?>" width="560" height="747" loading="lazy" decoding="async">
						<div class="recipe__body">
							<h3><?php echo esc_html( $r[0] ); ?></h3>
							<p><?php echo esc_html( $r[1] ); ?></p>
						<span class="recipe__cta">Ver receta</span>
						</div></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php endif; ?>

	<?php include get_theme_file_path( 'template-parts/product-more.php' ); ?>
</div>

<?php
get_footer();
