<?php
/**
 * Valores.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$ih_title = 'Valores';
$ih_crumb = 'Valores';
$ih_lede  = 'En Cooperativa Pascual valoramos y promovemos seis principios. Son los mismos con los que trabajamos entre nosotros y con quienes nos compran.';
include get_theme_file_path( 'template-parts/inner-hero.php' );
?>

<section class="section">
	<div class="wrap">
		<ol class="values">
			<?php foreach ( pascual_valores() as $v ) : ?>
				<li class="value">
					<h2><?php echo esc_html( $v[0] ); ?></h2>
					<p><?php echo esc_html( $v[1] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap prose prose--center">
		<p class="lead">Estos valores nos dan una cultura de respeto, colaboración y justicia en todo lo que hacemos, y guían un trato ético y equitativo hacia nuestros colaboradores, clientes y la comunidad.</p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/historia/' ) ); ?>">Conoce nuestra historia</a></p>
	</div>
</section>
<?php
get_footer();
