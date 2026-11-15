<?php
/**
 * Exportaciones.
 *
 * La página del sitio original está vacía. Lo único publicado por la Cooperativa sobre el tema
 * es el comunicado "Plan de expansión 2019-2020": exporta a Estados Unidos y explora relaciones
 * comerciales con Centro y Sudamérica. Aquí no se afirma nada más: faltan países, marcas que
 * se exportan y un contacto propio del área (ver README).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$d        = pascual_data();
$base     = trailingslashit( home_url() );
$plantas  = pascual_plantas();
$ih_title = 'Exportaciones';
$ih_crumb = 'Exportaciones';
$ih_top   = true;
$ih_lede  = 'Exportamos nuestras bebidas a Estados Unidos y exploramos relaciones comerciales con Centro y Sudamérica.';
include get_theme_file_path( 'template-parts/inner-hero.php' );
$mailto = 'mailto:' . $d['email'] . '?subject=' . rawurlencode( 'Exportaciones' );
?>

<section class="section">
	<div class="wrap made">
		<div>
			<h2>¿Quieres distribuir Pascual en tu país?</h2>
			<p class="lead">Escríbenos con el país, las marcas que te interesan y el volumen aproximado. Te responde el equipo de la Cooperativa.</p>
			<p><a class="btn btn--primary" href="<?php echo esc_url( $mailto ); ?>">Escribir a exportaciones</a></p>
		</div>
		<ul class="contact__list">
			<li><?php echo pascual_icon( 'mail' ); // phpcs:ignore ?><div><strong>Correo</strong><a href="<?php echo esc_url( $mailto ); ?>"><?php echo esc_html( $d['email'] ); ?></a></div></li>
			<li><?php echo pascual_icon( 'phone' ); // phpcs:ignore ?><div><strong>Teléfono (desde fuera de México)</strong><a href="tel:+52<?php echo esc_attr( $d['phone_local'][1] ); ?>">+52 <?php echo esc_html( str_replace( array( '(', ')' ), '', $d['phone_local'][0] ) ); ?></a></div></li>
			<li><?php echo pascual_icon( 'pin' ); // phpcs:ignore ?><div><strong>Oficinas</strong><span><?php echo esc_html( $d['address'] ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap">
		<header class="section__head">
			<h2>Hecho en dos plantas en México</h2>
			<p>Toda la producción sale de las plantas de la Cooperativa.</p>
		</header>
		<dl class="facts">
			<?php foreach ( $plantas as $p ) : ?>
				<div><dt><?php echo esc_html( $p['name'] ); ?></dt><dd><?php echo esc_html( $p['address'] ); ?></dd></div>
			<?php endforeach; ?>
		</dl>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap">
		<header class="section__head">
			<h2>Nuestras marcas</h2>
		</header>
		<ul class="brand-grid">
			<?php foreach ( $d['brands'] as $b ) : ?>
				<li>
					<a class="brand-card" href="<?php echo esc_url( $base . $b['slug'] . '/' ); ?>">
						<img src="<?php echo pascual_img( 'brand-' . $b['slug'] . '.webp' ); // phpcs:ignore ?>" alt="" width="160" height="160" loading="lazy" decoding="async">
						<span><?php echo esc_html( $b['name'] ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php
get_footer();
