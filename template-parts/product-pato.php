<?php
/**
 * Pato Pascual: dos tamaños frente a frente. Recibe $product desde page.php.
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
			<header class="section__head">
				<h2>Dos tamaños para elegir</h2>
				<p>Los sabores cambian según el tamaño.</p>
			</header>
			<div class="versus">
				<?php foreach ( $pres as $x ) : ?>
					<article class="versus__col">
						<img class="versus__img" src="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] ); ?>" width="640" height="640" loading="lazy" decoding="async">
						<h3><?php echo esc_html( $x['size'] ); ?></h3>
						<?php if ( $x['packaging'] ) : ?><p class="versus__pack"><?php echo esc_html( $x['packaging'] ); ?></p><?php endif; ?>
						<ul class="flavor-list">
							<?php foreach ( $x['flavors'] as $f ) : ?>
								<li>
									<?php if ( $f[1] ) : ?>
										<img src="<?php echo pascual_p_img( $f[1] ); // phpcs:ignore ?>" alt="" width="48" height="48" loading="lazy" decoding="async">
									<?php else : ?>
										<span class="flavor-list__blank" aria-hidden="true"></span>
									<?php endif; ?>
									<span><?php echo esc_html( $f[0] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php include get_theme_file_path( 'template-parts/product-recipes.php' ); ?>
	<?php include get_theme_file_path( 'template-parts/product-more.php' ); ?>
</div>

<?php
get_footer();
