<?php
/**
 * Página Nosotros.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$d    = pascual_data();
$base = trailingslashit( home_url() );
?>

<?php
$ih_title = 'Una tradición de excelencia en la industria de bebidas';
$ih_crumb = 'Nosotros';
$ih_top   = true;
$ih_lede  = 'Más de medio siglo elaborando bebidas de fruta mexicanas, con tecnología avanzada y un equipo altamente calificado.';
include get_theme_file_path( 'template-parts/inner-hero.php' );
?>

<section class="section">
	<div class="wrap split">
		<div class="split__media">
			<img src="<?php echo pascual_img( 'nosotros.webp' ); // phpcs:ignore ?>" alt="Instalaciones de la Cooperativa Pascual" width="1200" height="1200" loading="lazy" decoding="async">
		</div>
		<div class="split__body">
			<h2>Una cooperativa 100&nbsp;% mexicana</h2>
			<p>Tenemos más de medio siglo en la industria de refrescos en México. Nuestro éxito está en combinar tecnología avanzada con un equipo altamente calificado para elaborar bebidas de frutas de origen nacional con un sabor inigualable.</p>
			<p>La Cooperativa ha creado un entorno empresarial y productivo de gran dinamismo, y es un referente mundial en integración laboral. Nuestra ética profesional y dedicación a las actividades productivas nos han hecho merecedores de reconocimientos y premios nacionales e internacionales.</p>
			<p>Al comprar fruta mexicana, también apoyamos al campo de nuestro país.</p>
		</div>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap">
		<header class="section__head">
			<h2>Misión y visión</h2>
		</header>
		<div class="mv">
			<article class="mv__card">
				<h3>Misión</h3>
				<p>Elaborar, distribuir y comercializar bebidas naturales, nutritivas y saludables.</p>
			</article>
			<article class="mv__card mv__card--blue">
				<h3>Visión</h3>
				<p>Seguir siendo una cooperativa 100&nbsp;% mexicana y ampliar nuestra participación en los mercados nacional e internacional de bebidas de fruta, néctares, refrescos, agua purificada y lácteos, siempre con el compromiso de la calidad.</p>
			</article>
		</div>

		<ul class="stats" data-stats>
			<?php foreach ( $d['stats'] as $s ) : ?>
				<li class="stat">
					<strong class="stat__num" data-count="<?php echo esc_attr( $s[0] ); ?>"><?php echo esc_html( $s[0] ); ?></strong>
					<span class="stat__label"><?php echo esc_html( $s[1] ); ?></span>
					<span class="stat__hint"><?php echo esc_html( $s[2] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section">
	<div class="wrap">
		<header class="section__head">
			<h2>La Cooperativa por dentro</h2>
		</header>
		<ul class="coop-grid coop-grid--4">
			<li><a href="<?php echo esc_url( $base . 'valores/' ); ?>"><strong>Valores</strong><span>Lo que nos guía cada día.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
			<li><a href="<?php echo esc_url( $base . 'historia/' ); ?>"><strong>Historia</strong><span>Más de 50 años de camino.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
			<li><a href="<?php echo esc_url( $base . 'certificaciones/' ); ?>"><strong>Certificaciones</strong><span>Nuestro compromiso con la calidad.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
			<li><a href="<?php echo esc_url( $base . 'reconocimientos/' ); ?>"><strong>Reconocimientos</strong><span>Premios nacionales e internacionales.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
		</ul>
	</div>
</section>

<section class="section section--blue">
	<div class="wrap split split--reverse">
		<div class="split__body">
			<h2>Cooperativa Pascual: ¡Garantía de Calidad!</h2>
			<p>Procesamos nuestra propia pulpa con fruta natural y mantenemos Control de Calidad en cada etapa.</p>
			<a class="btn btn--solid" href="<?php echo esc_url( $base . '#produccion' ); ?>">Ver el proceso</a>
		</div>
		<div class="split__media">
			<img src="<?php echo pascual_img( 'produccion.webp' ); // phpcs:ignore ?>" alt="Línea de producción de la Cooperativa Pascual" width="1200" height="1200" loading="lazy" decoding="async">
		</div>
	</div>
</section>

<section class="section section--yellow">
	<div class="wrap buy">
		<div>
			<h2>¿Hablamos?</h2>
			<p>Estamos aquí para atender tus dudas y sugerencias.</p>
		</div>
		<div class="buy__actions">
			<a class="btn btn--primary" href="<?php echo esc_url( $base . '#contacto' ); ?>">Escríbenos</a>
			<a class="btn btn--outline-dark" href="tel:<?php echo esc_attr( $d['phone'][1] ); ?>"><?php echo esc_html( $d['phone'][0] ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
