<?php
/**
 * Portada.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$d       = pascual_data();
$base    = trailingslashit( home_url() );
$first   = $d['brands'][0];
$status  = isset( $_GET['contacto'] ) ? sanitize_key( wp_unslash( $_GET['contacto'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
$badfield = isset( $_GET['campo'] ) ? sanitize_key( wp_unslash( $_GET['campo'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
$labels  = array(
	'nombre'   => 'Escribe tu nombre.',
	'email'    => 'Revisa tu correo electrónico.',
	'telefono' => 'Escribe un teléfono válido (mínimo 8 dígitos).',
	'mensaje'  => 'Cuéntanos un poco más en tu mensaje.',
);
?>

<!-- HERO -->
<section class="hero" id="inicio" data-hero style="--hero-bg: <?php echo esc_attr( pascual_brand_var( $first['slug'] ) ); ?>; --hero-fg: <?php echo esc_attr( pascual_brand_var( $first['slug'], true ) ); ?>;" aria-roledescription="carrusel" aria-label="Nuestras marcas">
	<div class="wrap hero__inner">
		<div class="hero__copy">
			<h1>Bebidas de fruta hechas en México, desde hace más de 50&nbsp;años</h1>
			<p class="hero__lede">Elaboramos refrescos, aguas y leche con fruta natural y pulpa propia. Una empresa 100&nbsp;% mexicana, de trabajadores y para las familias.</p>
			<div class="hero__actions">
				<a class="btn btn--solid" href="#marcas">Ver productos</a>
			</div>
		</div>

		<div class="hero__stage">
			<?php foreach ( $d['brands'] as $i => $b ) : ?>
				<article class="slide<?php echo 0 === $i ? ' is-active' : ''; ?>" data-bg="<?php echo esc_attr( pascual_brand_var( $b['slug'] ) ); ?>" data-fg="<?php echo esc_attr( pascual_brand_var( $b['slug'], true ) ); ?>" role="group" aria-roledescription="diapositiva" aria-label="<?php echo esc_attr( ( $i + 1 ) . ' de ' . count( $d['brands'] ) . ': ' . $b['name'] ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
					<img class="slide__product slide__product--<?php echo esc_attr( $b['slug'] ); ?>" src="<?php echo pascual_img( 'prod-' . ( 'boing' === $b['slug'] ? 'boing' : $b['slug'] ) . '.webp' ); // phpcs:ignore ?>" alt="Producto <?php echo esc_attr( $b['name'] ); ?>" <?php echo 0 === $i ? 'fetchpriority="high"' : 'loading="lazy"'; ?> decoding="async">
					<div class="slide__card">
						<img src="<?php echo pascual_img( 'brand-' . $b['slug'] . '.webp' ); // phpcs:ignore ?>" alt="" width="72" height="72" loading="lazy" decoding="async">
						<div>
							<h2><?php echo esc_html( $b['name'] ); ?></h2>
							<p><?php echo esc_html( $b['blurb'] ); ?></p>
							<a href="<?php echo esc_url( $base . $b['slug'] . '/' ); ?>" tabindex="<?php echo 0 === $i ? '0' : '-1'; ?>">Conocer <?php echo esc_html( $b['name'] ); ?></a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="hero__controls">
		<button class="ctrl" type="button" data-prev aria-label="Marca anterior"><?php echo pascual_icon( 'prev' ); // phpcs:ignore ?></button>
		<div class="dots" role="tablist" aria-label="Elegir marca">
			<?php foreach ( $d['brands'] as $i => $b ) : ?>
				<button type="button" role="tab" class="dot<?php echo 0 === $i ? ' is-active' : ''; ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr( $b['name'] ); ?>"></button>
			<?php endforeach; ?>
		</div>
		<button class="ctrl" type="button" data-next aria-label="Marca siguiente"><?php echo pascual_icon( 'next' ); // phpcs:ignore ?></button>
		<button class="ctrl ctrl--pause" type="button" data-pause aria-pressed="false" aria-label="Pausar carrusel">❚❚</button>
	</div>
</section>

<!-- MARCAS -->
<section class="section section--tint" id="marcas">
	<div class="wrap">
		<header class="section__head">
			<h2>Sabores para cada momento</h2>
			<p>Conoce nuestras marcas y encuentra la presentación que va contigo.</p>
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

<!-- NOSOTROS + CIFRAS -->
<section class="section" id="nosotros">
	<div class="wrap split">
		<div class="split__media">
			<img src="<?php echo pascual_img( 'nosotros.webp' ); // phpcs:ignore ?>" alt="Personas de la Cooperativa Pascual trabajando" width="1200" height="1200" loading="lazy" decoding="async">
		</div>
		<div class="split__body">
			<h2>Una tradición de excelencia en bebidas</h2>
			<p>Tenemos más de medio siglo en la industria de refrescos en México. Combinamos tecnología avanzada con un equipo altamente calificado para elaborar bebidas de frutas de origen nacional con un sabor inigualable.</p>
			<p>Nuestra Cooperativa es un referente mundial en integración laboral, y nuestra ética y dedicación nos han hecho merecedores de reconocimientos nacionales e internacionales.</p>
			<a class="btn btn--primary" href="<?php echo esc_url( $base . 'nosotros/' ); ?>">Conoce nuestra historia</a>
		</div>
	</div>

	<div class="wrap">
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

<!-- PRODUCCIÓN -->
<section class="section section--tint" id="produccion">
	<div class="wrap split">
		<div class="split__media">
			<img src="<?php echo pascual_img( 'produccion.webp' ); // phpcs:ignore ?>" alt="Línea de producción de la Cooperativa Pascual" width="1200" height="1200" loading="lazy" decoding="async">
		</div>
		<div class="split__body">
			<h2>Fruta natural, pulpa propia</h2>
			<p>Somos una empresa 100&nbsp;% mexicana con más de 50 años de experiencia. Procesamos nuestros productos con fruta natural de la más alta calidad y elaboramos nuestra propia pulpa.</p>
			<dl class="facts">
				<div><dt>Fruta</dt><dd>Natural, de origen nacional.</dd></div>
				<div><dt>Pulpa</dt><dd>La procesamos nosotros, con equipo moderno.</dd></div>
				<div><dt>Experiencia</dt><dd>Pioneros en nuestro campo, con más de 50 años.</dd></div>
			</dl>
			<a class="btn btn--primary" href="<?php echo esc_url( $base . 'boing/#proceso' ); ?>">Ver cómo se elabora</a>
		</div>
	</div>
</section>

<!-- GALERÍA -->
<section class="section" id="galeria">
	<div class="wrap">
		<header class="section__head">
			<h2>Así se hace Pascual</h2>
		</header>
		<ul class="gallery">
			<?php foreach ( $d['gallery_alt'] as $i => $alt ) : ?>
				<li>
					<button type="button" class="gallery__item" data-full="<?php echo pascual_img( 'gal-' . ( $i + 1 ) . '.webp' ); // phpcs:ignore ?>" data-alt="<?php echo esc_attr( $alt ); ?>" aria-label="Ampliar: <?php echo esc_attr( $alt ); ?>">
						<img src="<?php echo pascual_img( 'gal-' . ( $i + 1 ) . '.webp' ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $alt ); ?>" width="800" height="598" loading="lazy" decoding="async">
					</button>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<dialog class="lightbox" data-lightbox aria-label="Imagen ampliada">
		<button type="button" class="lightbox__close" data-close aria-label="Cerrar"><?php echo pascual_icon( 'close' ); // phpcs:ignore ?></button>
		<img alt="">
	</dialog>
</section>

<!-- DÓNDE COMPRAR / COOPERATIVA -->
<section class="section section--yellow" id="comprar">
	<div class="wrap buy">
		<div>
			<h2>Encuentra Pascual cerca de ti</h2>
			<p>Consulta el directorio de puntos de venta en México o haz tu pedido en línea.</p>
		</div>
		<div class="buy__actions">
			<a class="btn btn--primary" href="<?php echo esc_url( $base . 'donde-comprar-mexico/' ); ?>">Ver dónde comprar</a>
			<a class="btn btn--outline-dark" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Hacer un pedido en línea</a>
		</div>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap">
		<header class="section__head">
			<h2>Mucho más que bebidas</h2>
		</header>
		<ul class="coop-grid">
			<li><a href="<?php echo esc_url( $base . 'centro-recreativo/' ); ?>"><strong>Centro Recreativo</strong><span>Espacios para los trabajadores y sus familias.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
			<li><a href="<?php echo esc_url( $base . 'fundacion-cultural/' ); ?>"><strong>Fundación Cultural</strong><span>Cultura y comunidad desde la Cooperativa.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
			<li><a href="<?php echo esc_url( $base . 'bolsa-de-trabajo/' ); ?>"><strong>Bolsa de trabajo</strong><span>Súmate al equipo de Pascual.</span><?php echo pascual_icon( 'arrow' ); // phpcs:ignore ?></a></li>
		</ul>
	</div>
</section>

<!-- CONTACTO -->
<section class="section" id="contacto">
	<div class="wrap contact">
		<div class="contact__info">
			<h2>Escríbenos</h2>
			<p>Valoramos tus dudas y sugerencias sobre nuestros productos. Te atendemos de forma personalizada.</p>
			<ul class="contact__list">
				<li><?php echo pascual_icon( 'phone' ); // phpcs:ignore ?><div><strong>Interior de la República</strong><a href="tel:<?php echo esc_attr( $d['phone'][1] ); ?>"><?php echo esc_html( $d['phone'][0] ); ?></a></div></li>
				<li><?php echo pascual_icon( 'phone' ); // phpcs:ignore ?><div><strong>CDMX y área metropolitana</strong><a href="tel:<?php echo esc_attr( $d['phone_local'][1] ); ?>"><?php echo esc_html( $d['phone_local'][0] ); ?></a></div></li>
				<li><?php echo pascual_icon( 'whatsapp' ); // phpcs:ignore ?><div><strong>WhatsApp</strong><a href="<?php echo esc_url( pascual_whatsapp_url() ); ?>" target="_blank" rel="noopener">Escríbenos por WhatsApp</a></div></li>
				<li><?php echo pascual_icon( 'mail' ); // phpcs:ignore ?><div><strong>Correo</strong><a href="mailto:<?php echo esc_attr( $d['email'] ); ?>"><?php echo esc_html( $d['email'] ); ?></a></div></li>
			</ul>
		</div>

		<form class="form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
			<?php if ( 'ok' === $status ) : ?>
				<div class="notice notice--ok" role="status">¡Gracias! Recibimos tu mensaje y te responderemos pronto.</div>
			<?php elseif ( 'invalido' === $status && isset( $labels[ $badfield ] ) ) : ?>
				<div class="notice notice--error" role="alert"><?php echo esc_html( $labels[ $badfield ] ); ?></div>
			<?php elseif ( 'espera' === $status ) : ?>
				<div class="notice notice--error" role="alert">Espera unos segundos antes de enviar otro mensaje.</div>
			<?php elseif ( 'error' === $status ) : ?>
				<div class="notice notice--error" role="alert">No pudimos enviar tu mensaje. Inténtalo de nuevo o llámanos al <?php echo esc_html( $d['phone'][0] ); ?>.</div>
			<?php endif; ?>

			<input type="hidden" name="action" value="pascual_contact">
			<?php wp_nonce_field( 'pascual_contact', 'pascual_nonce' ); ?>
			<div class="hp" aria-hidden="true"><label>No llenar este campo <input type="text" name="sitio_web" tabindex="-1" autocomplete="off"></label></div>

			<div class="field"><label for="f-nombre">Nombre completo <span aria-hidden="true">*</span></label><input id="f-nombre" name="nombre" type="text" autocomplete="name" required></div>
			<div class="field-row">
				<div class="field"><label for="f-email">Correo electrónico <span aria-hidden="true">*</span></label><input id="f-email" name="email" type="email" autocomplete="email" required></div>
				<div class="field"><label for="f-tel">Teléfono <span aria-hidden="true">*</span></label><input id="f-tel" name="telefono" type="tel" autocomplete="tel" required></div>
			</div>
			<div class="field"><label for="f-msg">Mensaje <span aria-hidden="true">*</span></label><textarea id="f-msg" name="mensaje" rows="5" required></textarea></div>
			<button class="btn btn--primary" type="submit">Enviar mensaje</button>
		</form>
	</div>
</section>

<?php
get_footer();
