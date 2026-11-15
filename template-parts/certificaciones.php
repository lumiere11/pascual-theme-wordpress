<?php
/**
 * Certificaciones.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$ih_title = 'Certificaciones';
$ih_crumb = 'Certificaciones';
$ih_lede  = 'Nuestros procesos de calidad se revisan con una norma internacional.';
include get_theme_file_path( 'template-parts/inner-hero.php' );
?>

<section class="section">
	<div class="wrap cert">
		<figure class="cert__doc">
			<img src="<?php echo pascual_h_img( 'iso.webp' ); // phpcs:ignore ?>" alt="Certificado ISO 9001:2015 de la Sociedad Cooperativa Trabajadores de Pascual" width="900" height="1169" loading="eager" decoding="async">
			<figcaption>Certificado del sistema de gestión de calidad</figcaption>
		</figure>

		<div class="cert__body">
			<h2>ISO 9001:2015</h2>
			<p>Es una norma internacional que verifica los procesos administrativos y de calidad de una empresa, con el objetivo de lograr la mejora continua. Refleja nuestro compromiso con la calidad y con la satisfacción de nuestros clientes.</p>
			<dl class="facts">
				<div><dt>Plantas certificadas</dt><dd>San Juan del Río, Querétaro<br>Tizayuca, Hidalgo</dd></div>
				<div><dt>Alcance</dt><dd>Elaboración, envasado y distribución de bebidas de fruta, néctares, agua purificada y bebidas carbonatadas</dd></div>
			</dl>
			<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Pedir información</a></p>
		</div>
	</div>
</section>
<?php
get_footer();
