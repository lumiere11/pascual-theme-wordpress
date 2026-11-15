<?php
/**
 * Página de producto. Recibe $product desde page.php.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$d     = pascual_data();
$base  = trailingslashit( home_url() );
$p     = $product;
$pres  = $p['presentations'];
$hero  = $p['hero_img'] ? pascual_p_img( $p['hero_img'] ) : pascual_img( 'prod-' . $p['slug'] . '.webp' );
$has_f = false;
foreach ( $pres as $x ) {
	if ( ! empty( $x['flavors'] ) ) {
		$has_f = true;
	}
}
?>

<?php include get_theme_file_path( 'template-parts/product-hero.php' ); ?>

<div class="pbody" style="--accent: <?php echo esc_attr( pascual_brand_var( $p['slug'] ) ); ?>; --accent-ink: <?php echo esc_attr( pascual_brand_var( $p['slug'], true ) ); ?>;">
<?php if ( $pres ) : ?>
<section class="section" id="presentaciones">
	<div class="wrap">
		<header class="section__head">
			<h2><?php echo esc_html( count( $pres ) > 1 ? 'Elige tu presentación' : 'Presentación' ); ?></h2>
			<?php if ( $has_f ) : ?><p>Toca un sabor para ver su empaque.</p><?php endif; ?>
		</header>

		<?php if ( count( $pres ) > 1 ) : ?>
			<div class="tabs" role="tablist" aria-label="Presentaciones de <?php echo esc_attr( $p['name'] ); ?>" data-tabs>
				<?php foreach ( $pres as $i => $x ) : ?>
					<button type="button" role="tab" id="tab-<?php echo (int) $i; ?>" class="tab<?php echo 0 === $i ? ' is-active' : ''; ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-controls="panel-<?php echo (int) $i; ?>"><?php echo esc_html( $x['name'] ); ?> <small><?php echo esc_html( $x['size'] ); ?></small></button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php foreach ( $pres as $i => $x ) : ?>
			<div class="pres" id="panel-<?php echo (int) $i; ?>" role="<?php echo count( $pres ) > 1 ? 'tabpanel' : 'group'; ?>"<?php echo count( $pres ) > 1 ? ' aria-labelledby="tab-' . (int) $i . '"' : ''; ?> data-panel>
				<div class="pres__media">
					<img src="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" data-default="<?php echo pascual_p_img( $x['img'] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] ); ?>" width="640" height="640" loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>" decoding="async" data-main>
				</div>
				<div class="pres__body">
					<h3><?php echo esc_html( $x['name'] ); ?> <span><?php echo esc_html( $x['size'] ); ?></span></h3>
					<?php if ( $x['packaging'] ) : ?>
						<p class="pres__pack"><strong>Empaque:</strong> <?php echo esc_html( $x['packaging'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $x['flavors'] ) ) : ?>
						<h4>Sabores</h4>
						<ul class="chips">
							<?php foreach ( $x['flavors'] as $f ) : ?>
								<li>
									<?php if ( $f[1] ) : ?>
										<button type="button" class="chip chip--pick" data-img="<?php echo pascual_p_img( $f[1] ); // phpcs:ignore ?>" data-alt="<?php echo esc_attr( $x['name'] . ' ' . $x['size'] . ' sabor ' . $f[0] ); ?>" aria-pressed="false"><?php echo esc_html( $f[0] ); ?></button>
									<?php else : ?>
										<span class="chip"><?php echo esc_html( $f[0] ); ?></span>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<a class="btn btn--primary" href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Dónde comprar</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
<?php else : ?>
<section class="section" id="presentaciones">
	<div class="wrap prose prose--center">
		<h2>Encuéntralo cerca de ti</h2>
		<p>Consulta presentaciones y puntos de venta en el directorio, o llámanos al <a href="tel:<?php echo esc_attr( $d['phone'][1] ); ?>"><?php echo esc_html( $d['phone'][0] ); ?></a>.</p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Dónde comprar</a></p>
	</div>
</section>
<?php endif; ?>

<?php if ( ! empty( $p['process'] ) ) : ?>
<section class="section" id="proceso">
	<div class="wrap process">
		<figure class="process__photo">
			<img src="<?php echo pascual_img( 'gal-1.webp' ); // phpcs:ignore ?>" alt="Trabajadoras seleccionando manzanas en una banda de la planta" width="800" height="598" loading="lazy" decoding="async">
		</figure>
		<div class="process__body">
			<h2>Así elaboramos la pulpa</h2>
			<ol class="flow">
				<?php foreach ( pascual_process_steps() as $n => $s ) : ?>
					<li>
						<span class="ring" aria-hidden="true"><?php echo (int) ( $n + 1 ); ?></span>
						<div><h3><?php echo esc_html( $s[0] ); ?></h3><p><?php echo esc_html( $s[1] ); ?></p></div>
					</li>
				<?php endforeach; ?>
			</ol>
			<p class="process__note">Control de Calidad supervisa cada etapa.</p>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( ! empty( $p['recipes'] ) ) : ?>
<section class="section section--tint" id="recetas">
	<div class="wrap">
		<header class="section__head">
			<h2>Sácale más sabor a tu <?php echo esc_html( preg_replace( '/!$/', '', $p['name'] ) ); ?></h2>
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
