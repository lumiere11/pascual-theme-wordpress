<?php
/**
 * Reconocimientos.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$ih_title = 'Reconocimientos';
$ih_crumb = 'Reconocimientos';
$ih_lede  = 'Algunos de los premios que ha recibido la Cooperativa a lo largo de su trayectoria, por su compromiso con la excelencia y la calidad.';
include get_theme_file_path( 'template-parts/inner-hero.php' );
$trofeos = pascual_trofeos();
?>

<section class="section">
	<div class="wrap awards">
		<figure class="awards__photo">
			<img src="<?php echo pascual_h_img( 'trofeo.webp' ); // phpcs:ignore ?>" alt="Trofeo Azteca de la Cooperativa Pascual: medalla dorada sobre base negra y mármol" width="600" height="600" loading="eager" decoding="async">
		</figure>
		<div>
			<h2><?php echo esc_html( count( $trofeos ) ); ?> trofeos</h2>
			<ul class="award-list">
				<?php foreach ( $trofeos as $t ) : ?>
					<li><?php echo esc_html( $t ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
<?php
get_footer();
