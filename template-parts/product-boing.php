<?php
/**
 * Boing!: estantes de sabores por presentación. Recibe $product desde page.php.
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

	<section class="section" id="presentaciones">
		<div class="wrap">
			<header class="section__head section__head--left">
				<h2>Escoge tu sabor</h2>
				<p>Más de 10 sabores, en tres presentaciones.</p>
			</header>
			<?php foreach ( $pres as $x ) : ?>
				<?php
				$with    = array_filter( $x['flavors'], function ( $f ) { return ! empty( $f[1] ); } );
				$without = array_filter( $x['flavors'], function ( $f ) { return empty( $f[1] ); } );
				?>
				<article class="shelf">
					<header class="shelf__head">
						<h3><?php echo esc_html( $x['name'] ); ?> <span><?php echo esc_html( $x['size'] ); ?></span></h3>
						<?php if ( $x['packaging'] ) : ?><p><?php echo esc_html( $x['packaging'] ); ?></p><?php endif; ?>
					</header>
					<ul class="shelf__row" tabindex="0" aria-label="Sabores de <?php echo esc_attr( $x['name'] . ' ' . $x['size'] ); ?>">
						<?php foreach ( $with as $f ) : ?>
							<li>
								<img src="<?php echo pascual_p_img( $f[1] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] . ' sabor ' . $f[0] ); ?>" width="640" height="640" loading="lazy" decoding="async">
								<span><?php echo esc_html( $f[0] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php if ( $without ) : ?>
						<p class="shelf__more">También en: <?php echo esc_html( implode( ', ', array_map( function ( $f ) { return $f[0]; }, $without ) ) ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<?php include get_theme_file_path( 'template-parts/product-process.php' ); ?>

	<?php include get_theme_file_path( 'template-parts/product-recipes.php' ); ?>
	<?php include get_theme_file_path( 'template-parts/product-more.php' ); ?>
</div>

<?php
get_footer();
