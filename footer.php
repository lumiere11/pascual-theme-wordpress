<?php
/**
 * Pie de página.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$d    = pascual_data();
$base = trailingslashit( home_url() );
?>
</main>

<footer class="site-footer">
	<div class="wrap footer__grid">
		<div class="footer__about">
			<img src="<?php echo pascual_img( 'logo.webp' ); // phpcs:ignore ?>" alt="" width="72" height="72" loading="lazy" decoding="async">
			<p><?php echo esc_html( $d['name_legal'] ); ?></p>
			<ul class="topbar__social topbar__social--footer">
				<li><a href="<?php echo esc_url( pascual_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo pascual_icon( 'whatsapp' ); // phpcs:ignore ?></a></li>
				<?php foreach ( $d['social'] as $net => $url ) : ?>
					<li><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( ucfirst( $net ) ); ?>"><?php echo pascual_icon( $net ); // phpcs:ignore ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<nav class="footer__col" aria-label="Productos">
			<h2>Productos</h2>
			<ul>
				<?php foreach ( $d['brands'] as $b ) : ?>
					<li><a href="<?php echo esc_url( $base . $b['slug'] . '/' ); ?>"><?php echo esc_html( $b['name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav class="footer__col" aria-label="La Cooperativa">
			<h2>La Cooperativa</h2>
			<ul>
				<li><a href="<?php echo esc_url( $base . 'nosotros/' ); ?>">Nosotros</a></li>
				<li><a href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Dónde comprar</a></li>
				<li><a href="<?php echo esc_url( $base . 'centro-recreativo/' ); ?>">Centro Recreativo</a></li>
				<li><a href="<?php echo esc_url( $base . 'fundacion-cultural/' ); ?>">Fundación Cultural</a></li>
				<li><a href="<?php echo esc_url( $base . 'bolsa-de-trabajo/' ); ?>">Bolsa de trabajo</a></li>
			</ul>
		</nav>

		<address class="footer__col footer__contact">
			<h2>Contacto</h2>
			<p><?php echo pascual_icon( 'phone' ); // phpcs:ignore ?> <a href="tel:<?php echo esc_attr( $d['phone'][1] ); ?>"><?php echo esc_html( $d['phone'][0] ); ?></a> <small>(todo el país)</small></p>
			<p><?php echo pascual_icon( 'phone' ); // phpcs:ignore ?> <a href="tel:<?php echo esc_attr( $d['phone_local'][1] ); ?>"><?php echo esc_html( $d['phone_local'][0] ); ?></a> <small>(CDMX)</small></p>
			<p><?php echo pascual_icon( 'mail' ); // phpcs:ignore ?> <a href="mailto:<?php echo esc_attr( $d['email'] ); ?>"><?php echo esc_html( $d['email'] ); ?></a></p>
			<p><?php echo pascual_icon( 'pin' ); // phpcs:ignore ?> <?php echo esc_html( $d['address'] ); ?></p>
		</address>
	</div>

	<div class="footer__legal">
		<div class="wrap">
			<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $d['name_legal'] ); ?> Todos los derechos reservados.
				<a href="<?php echo esc_url( $base . 'aviso-de-privacidad/' ); ?>">Aviso de privacidad</a>
				<a href="<?php echo esc_url( $base . 'aviso-de-privacidad/' ); ?>">Términos y condiciones</a>
			</p>
		</div>
	</div>
</footer>

<a class="wa-float" href="<?php echo esc_url( pascual_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="Escríbenos por WhatsApp"><?php echo pascual_icon( 'whatsapp' ); // phpcs:ignore ?></a>

<?php wp_footer(); ?>
</body>
</html>
