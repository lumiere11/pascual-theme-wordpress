<?php
/**
 * Historia: línea de tiempo en orden cronológico.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$ih_title = 'Nuestra historia';
$ih_crumb = 'Historia';
$ih_lede  = 'De una fábrica de paletas en los años cuarenta a una cooperativa de trabajadores que hoy elabora bebidas de fruta.';
include get_theme_file_path( 'template-parts/inner-hero.php' );
?>

<section class="section">
	<div class="wrap">
		<ol class="timeline">
			<?php foreach ( pascual_historia() as $i => $h ) : ?>
				<li class="tl">
					<div class="tl__year">
						<strong><?php echo esc_html( $h[0] ); ?></strong>
						<span><?php echo esc_html( $h[1] ); ?></span>
					</div>
					<div class="tl__body">
						<h2><?php echo esc_html( $h[2] ); ?></h2>
						<?php foreach ( $h[3] as $para ) : ?>
							<p><?php echo esc_html( $para ); ?></p>
						<?php endforeach; ?>
					</div>
					<figure class="tl__photo">
						<img src="<?php echo pascual_h_img( $h[4] ); // phpcs:ignore ?>" alt="Imagen de archivo: <?php echo esc_attr( $h[2] ); ?>" width="900" height="513" loading="<?php echo $i < 2 ? 'eager' : 'lazy'; ?>" decoding="async">
					</figure>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap prose prose--center">
		<p class="lead">Seguimos siendo una cooperativa 100&nbsp;% mexicana, comprometida con la calidad y la excelencia. Gracias a quienes nos eligen cada día.</p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/reconocimientos/' ) ); ?>">Ver reconocimientos</a></p>
	</div>
</section>
<?php
get_footer();
