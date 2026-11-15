<?php
/**
 * Proceso de la pulpa. Usa $p.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
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
