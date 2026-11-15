<?php
/**
 * Agua Pascual: escalera de tamaños y dos sabores. Recibe $product desde page.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$d    = pascual_data();
$base = trailingslashit( home_url() );
$p    = $product;
$pres = $p['presentations'];
$hero = $p['hero_img'] ? pascual_p_img( $p['hero_img'] ) : pascual_img( 'prod-' . $p['slug'] . '.webp' );

include get_theme_file_path( 'template-parts/product-hero.php' );
?>

<div class="pbody" style="--accent: <?php echo esc_attr( pascual_brand_var( $p['slug'] ) ); ?>; --accent-ink: <?php echo esc_attr( pascual_brand_var( $p['slug'], true ) ); ?>;">

	<?php
	$sizes  = array( $pres[2], $pres[1], $pres[0] ); // 350, 500, 1500 ml
	$flav   = array_values( $pres[1]['flavors'] );
	$packet = $pres[0]['packaging'];
	?>
	<section class="section" id="presentaciones">
		<div class="wrap">
			<header class="section__head section__head--left">
				<h2>Tres tamaños</h2>
				<p><?php echo esc_html( $packet ); ?> en todos.</p>
			</header>
			<ul class="ladder">
				<?php foreach ( $sizes as $x ) : ?>
					<li>
						<img src="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] ); ?>" width="640" height="640" loading="lazy" decoding="async">
						<strong><?php echo esc_html( $x['size'] ); ?></strong>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="section section--tint" id="sabores">
		<div class="wrap">
			<header class="section__head section__head--left">
				<h2>Con sabor</h2>
				<p>En presentación de <?php echo esc_html( $pres[1]['size'] ); ?>.</p>
			</header>
			<ul class="duo">
				<?php foreach ( $flav as $f ) : ?>
					<li>
						<img src="<?php echo pascual_p_img( $f[1] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( 'Agua Pascual 500 ml sabor ' . $f[0] ); ?>" width="640" height="640" loading="lazy" decoding="async">
						<strong><?php echo esc_html( $f[0] ); ?></strong>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php include get_theme_file_path( 'template-parts/product-more.php' ); ?>
</div>

<?php
get_footer();
