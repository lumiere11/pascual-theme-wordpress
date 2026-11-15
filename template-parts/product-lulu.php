<?php
/**
 * Lulu: un sabor a la vez, en grande. Recibe $product desde page.php.
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

	<?php $x = $pres[0]; ?>
	<section class="section" id="presentaciones">
		<div class="wrap">
			<header class="section__head">
				<h2>Elige un sabor</h2>
				<p><?php echo esc_html( $x['name'] . ' ' . $x['size'] ); ?> · <?php echo esc_html( mb_strtolower( $x['packaging'] ) ); ?></p>
			</header>
			<div class="showcase" data-panel>
				<div class="showcase__stage">
					<img src="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" data-default="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] ); ?>" width="640" height="640" loading="lazy" decoding="async" data-main>
				</div>
				<ul class="swatches" aria-label="Sabores de <?php echo esc_attr( $x['name'] ); ?>">
					<?php foreach ( $x['flavors'] as $f ) : ?>
						<li>
							<button type="button" class="chip--pick" data-img="<?php echo pascual_p_img( $f[1] ); // phpcs:ignore ?>" data-alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] . ' sabor ' . $f[0] ); ?>" aria-pressed="false"><?php echo esc_html( $f[0] ); ?></button>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<?php include get_theme_file_path( 'template-parts/product-recipes.php' ); ?>

	<?php include get_theme_file_path( 'template-parts/product-more.php' ); ?>
</div>

<?php
get_footer();
