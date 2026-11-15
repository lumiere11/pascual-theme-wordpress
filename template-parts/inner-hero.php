<?php
/**
 * Encabezado sobrio de páginas internas. Variables: $ih_title, $ih_lede, $ih_crumb.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="ihero">
	<div class="wrap">
		<nav class="crumbs" aria-label="Ruta"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a> <span aria-hidden="true">/</span> <?php if ( empty( $ih_top ) ) : ?><a href="<?php echo esc_url( home_url( '/nosotros/' ) ); ?>">Nosotros</a> <span aria-hidden="true">/</span> <?php endif; ?><span aria-current="page"><?php echo esc_html( $ih_crumb ); ?></span></nav>
		<h1><?php echo esc_html( $ih_title ); ?></h1>
		<p class="ihero__lede"><?php echo esc_html( $ih_lede ); ?></p>
	</div>
</section>
