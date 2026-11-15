<?php
/**
 * Cierre común de las páginas de marca: otras marcas y llamado a pedir. Usa $d, $base, $p.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section">
	<div class="wrap">
		<header class="section__head">
			<h2>Descubre el resto de la familia</h2>
		</header>
		<ul class="brand-grid brand-grid--small">
			<?php foreach ( $d['brands'] as $b ) : ?>
				<?php if ( $b['slug'] === $p['slug'] ) { continue; } ?>
				<li>
					<a class="brand-card" href="<?php echo esc_url( $base . $b['slug'] . '/' ); ?>">
						<img src="<?php echo pascual_img( 'brand-' . $b['slug'] . '.webp' ); // phpcs:ignore ?>" alt="" width="130" height="130" loading="lazy" decoding="async">
						<span><?php echo esc_html( $b['name'] ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section section--yellow">
	<div class="wrap buy">
		<div>
			<h2>Pide tu <?php echo esc_html( preg_replace( '/!$/', '', $p['name'] ) ); ?> favorito</h2>
			<p>Recíbelo hasta la puerta de tu hogar.</p>
		</div>
		<div class="buy__actions">
			<a class="btn btn--primary" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Pedir en línea</a>
			<a class="btn btn--outline-dark" href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Dónde comprar</a>
		</div>
	</div>
</section>

