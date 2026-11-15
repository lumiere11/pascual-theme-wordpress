<?php
/**
 * Página no encontrada.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<section class="page-head"><div class="wrap"><h1>Esta página no existe</h1></div></section>
<div class="wrap section prose">
	<p>Puede que el enlace haya cambiado. Prueba desde el inicio o conoce nuestras marcas.</p>
	<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Ir al inicio</a></p>
</div>
<?php
get_footer();
