<?php
/**
 * Pascual Mejorado — funciones del tema.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PASCUAL_VER', '1.3.0' );

require_once get_template_directory() . '/inc/products.php';
require_once get_template_directory() . '/inc/pages.php';

/**
 * Datos del sitio en un solo lugar. Edita aquí teléfonos, enlaces, marcas y cifras.
 */
function pascual_data() {
	$data = array(
		'name_short'  => 'Cooperativa Pascual',
		'name_legal'  => 'Sociedad Cooperativa Trabajadores de Pascual, S.C.L.',
		'phone'       => array( '800 727 2825', '8007272825' ),
		'phone_local' => array( '(55) 5132 0856', '5551320856' ),
		// Número tal como estaba en el sitio original. Revisar: un número móvil
		// de México para wa.me normalmente lleva 52 al inicio (ej. 525522727053).
		'whatsapp'    => '15522727053',
		'email'       => 'contacto@pascual.com.mx',
		'address'     => 'Clavijero No. 60, Col. Tránsito, C.P. 06820, Cuauhtémoc, Ciudad de México',
		'order_url'   => 'https://pascualcontigo.com/es/',
		'social'      => array(
			'facebook' => 'https://www.facebook.com/PatoPascualoficial/',
			'x'        => 'https://twitter.com/PatoPascual1',
			'youtube'  => 'https://www.youtube.com/channel/UCT1w-Yr1SD5NsSuzOoWcZlg',
		),
		'stats'       => array(
			array( 37, 'Presentaciones', 'una para cada situación' ),
			array( 4, 'Tipos de envase', 'pensados para tu comodidad' ),
			array( 9, 'Marcas', 'cada una con identidad propia' ),
			array( 30, 'Sucursales', 'cerca de ti en todo el país' ),
		),
		// bg = color de fondo en el carrusel, fg = color del texto sobre ese fondo.
		'brands'      => array(
			array( 'slug' => 'boing', 'name' => 'Boing!', 'bg' => '#ffcc00', 'fg' => '#0b2a4a', 'blurb' => 'Bebida con pulpa de fruta, en latas y presentaciones para todos los días.' ),
			array( 'slug' => 'leche-pascual', 'name' => 'Leche Pascual', 'bg' => '#5ac8fa', 'fg' => '#0b2a4a', 'blurb' => 'La leche de siempre, de la Cooperativa Pascual.' ),
			array( 'slug' => 'lulu', 'name' => 'Lulu', 'bg' => '#005fab', 'fg' => '#ffffff', 'blurb' => 'Sabor frutal para disfrutar en cualquier momento.' ),
			array( 'slug' => 'pato-pascual', 'name' => 'Pato Pascual', 'bg' => '#c8102e', 'fg' => '#ffffff', 'blurb' => 'Una marca con más de medio siglo en la mesa de las familias mexicanas.' ),
			array( 'slug' => 'agua-pascual', 'name' => 'Agua Pascual', 'bg' => '#bce4fa', 'fg' => '#0b2a4a', 'blurb' => 'Aguas de sabor: natural, jamaica, manzana y más.' ),
			array( 'slug' => 'mexicola', 'name' => 'Mexicola', 'bg' => '#1a0a0a', 'fg' => '#ffffff', 'blurb' => 'El refresco de cola hecho en México.' ),
		),
		'gallery_alt' => array(
			'Trabajadoras clasificando fruta en la línea de producción',
			'Selección de fruta en planta',
			'Proceso de elaboración de pulpa de fruta',
			'Línea de producción de la Cooperativa Pascual',
			'Equipo de la cooperativa en planta',
			'Control de calidad de la fruta',
		),
	);
	return apply_filters( 'pascual_data', $data );
}

/**
 * Modo oscuro: aplica el tema antes de pintar la página para que no parpadee.
 * Usa la elección guardada del visitante; si no hay, la del dispositivo.
 */
function pascual_theme_boot() {
	echo "<script>(function(){var t;try{t=localStorage.getItem('pascual-theme');}catch(e){}if(t!=='light'&&t!=='dark'){t=window.matchMedia&&matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light';}document.documentElement.setAttribute('data-theme',t);})();</script>\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'pascual_theme_boot', 0 );

/**
 * Colores de marca como tokens CSS (--brand-boing, --brand-boing-ink, ...), tomados de pascual_data().
 */
function pascual_brand_tokens() {
	$css = '';
	foreach ( pascual_data()['brands'] as $b ) {
		$bg  = sanitize_hex_color( $b['bg'] );
		$fg  = sanitize_hex_color( $b['fg'] );
		$css .= '--brand-' . sanitize_key( $b['slug'] ) . ':' . $bg . ';--brand-' . sanitize_key( $b['slug'] ) . '-ink:' . $fg . ';';
	}
	echo '<style id="pascual-brand-tokens">:root{' . $css . '}</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'pascual_brand_tokens', 4 );

function pascual_brand_var( $slug, $ink = false ) {
	return 'var(--brand-' . sanitize_key( $slug ) . ( $ink ? '-ink' : '' ) . ')';
}

function pascual_img( $file ) {
	return esc_url( get_template_directory_uri() . '/assets/img/' . $file );
}

function pascual_whatsapp_url( $text = 'Hola, me gustaría tener más información acerca de Cooperativa Pascual.' ) {
	$d = pascual_data();
	return 'https://wa.me/' . rawurlencode( $d['whatsapp'] ) . '?text=' . rawurlencode( $text );
}

/**
 * Íconos SVG en línea (sin librerías externas).
 */
function pascual_icon( $name ) {
	$icons = array(
		'phone'     => '<path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1z"/>',
		'whatsapp'  => '<path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm5.2 14c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.2-.7-2.7-1.1-4.4-3.8-4.5-4-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.2.1.3 0 .5l-.3.5-.4.4c-.1.2-.3.3-.1.6.2.3.7 1.2 1.5 1.9 1 .9 1.9 1.2 2.2 1.3.3.1.4.1.6-.1l.8-1c.2-.3.4-.2.6-.1l1.9.9c.3.1.5.2.5.3.1.2.1.8-.1 1.4z"/>',
		'facebook'  => '<path d="M13.5 22v-8h2.7l.5-3.2h-3.2V8.7c0-.9.4-1.7 1.8-1.7h1.5V4.2S15.5 4 14.4 4c-2.6 0-4.1 1.5-4.1 4.3v2.5H7.5V14h2.8v8z"/>',
		'x'         => '<path d="M17.5 3h3.1l-6.8 7.7L21.8 21h-6.3l-4.9-6.4L5 21H1.9l7.3-8.3L1.5 3h6.4l4.4 5.8zm-1.1 16.2h1.7L6.9 4.7H5.1z"/>',
		'youtube'   => '<path d="M21.6 7.2a2.5 2.5 0 0 0-1.8-1.8C18.200 5 12 5 12 5s-6.200 0-7.800.4A2.500 2.500 0 0 0 2.400 7.200C2 8.800 2 12 2 12s0 3.200.4 4.800a2.500 2.500 0 0 0 1.800 1.800C5.800 19 12 19 12 19s6.200 0 7.800-.4a2.500 2.500 0 0 0 1.800-1.800C22 15.200 22 12 22 12s0-3.200-.4-4.800zM10 15V9l5.200 3z"/>',
		'arrow'     => '<path d="M5 12h14m-6-6 6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'mail'      => '<path d="M3 5h18a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm9 7.200L4 7.500V17h16V7.500z"/>',
		'pin'       => '<path d="M12 2a7 7 0 0 0-7 7c0 5.200 7 13 7 13s7-7.800 7-13a7 7 0 0 0-7-7zm0 9.500A2.500 2.500 0 1 1 12 6.500a2.500 2.500 0 0 1 0 5z"/>',
		'prev'      => '<path d="M15 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2.500" stroke-linecap="round" stroke-linejoin="round"/>',
		'next'      => '<path d="M9 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.500" stroke-linecap="round" stroke-linejoin="round"/>',
		'close'     => '<path d="M6 6l12 12M18 6 6 18" fill="none" stroke="currentColor" stroke-width="2.500" stroke-linecap="round"/>',
		'leaf'      => '<path d="M20 4C10 4 4 9 4 15c0 2 1 4 2.500 5 .5-4 3-8 8-10-4 3-6 6-6.500 10.500C14 21 20 17 20 4z"/>',
		'flag'      => '<path d="M5 3v18M5 4h12l-2 4 2 4H5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'moon'      => '<path d="M20.500 14.500A8.500 8.500 0 0 1 9.500 3.500a8.500 8.500 0 1 0 11 11z"/>',
		'sun'       => '<circle cx="12" cy="12" r="4.500"/><path d="M12 2v2.500M12 19.500V22M2 12h2.500M19.500 12H22M4.900 4.900l1.800 1.800M17.300 17.300l1.800 1.800M4.900 19.100l1.800-1.800M17.300 6.700l1.800-1.800" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
		'pause'     => '<path d="M7 5h3.500v14H7zM13.500 5H17v14h-3.500z"/>',
		'play'      => '<path d="M8 5l11 7-11 7z"/>',
		'gear'      => '<path d="M12 8.500A3.500 3.500 0 1 0 12 15.500 3.500 3.500 0 0 0 12 8.500zm8.500 4.500-1.600.9a7 7 0 0 1 0 1.200l1.600.9-1.500 2.600-1.800-.5a7 7 0 0 1-1 .6L15.800 21h-3l-.4-1.800a7 7 0 0 1-1-.6l-1.800.5-1.500-2.600 1.600-.9a7 7 0 0 1 0-1.200L7 12l1.500-2.600 1.800.5a7 7 0 0 1 1-.6L12.800 7h3l.4 1.800a7 7 0 0 1 1 .6l1.800-.5z" fill="none" stroke="currentColor" stroke-width="1.600" stroke-linejoin="round"/>',
	);
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	return '<svg class="icon icon--' . esc_attr( $name ) . '" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false" fill="currentColor">' . $icons[ $name ] . '</svg>';
}

/**
 * Configuración del tema.
 */
function pascual_setup() {
	load_theme_textdomain( 'pascual', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 80, 'flex-width' => true, 'flex-height' => true ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_image_size( 'pascual-card', 800, 520, true );
	register_nav_menus(
		array(
			'primary' => 'Menú principal',
			'footer'  => 'Menú del pie de página',
		)
	);
}
add_action( 'after_setup_theme', 'pascual_setup' );

function pascual_assets() {
	wp_enqueue_style(
		'pascual-fonts',
		'https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;700&family=Source+Sans+3:wght@400;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'pascual-main', get_template_directory_uri() . '/assets/css/main.css', array( 'pascual-fonts' ), PASCUAL_VER );
	wp_enqueue_script( 'pascual-main', get_template_directory_uri() . '/assets/js/main.js', array(), PASCUAL_VER, array( 'in_footer' => true, 'strategy' => 'defer' ) );
}
add_action( 'wp_enqueue_scripts', 'pascual_assets' );

function pascual_preconnect( $urls, $relation ) {
	if ( 'preconnect' === $relation ) {
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'pascual_preconnect', 10, 2 );

/**
 * Favicon (si no hay uno definido en Apariencia > Personalizar).
 */
function pascual_favicon() {
	if ( has_site_icon() ) {
		return;
	}
	echo '<link rel="icon" href="' . pascual_img( 'favicon.png' ) . '" type="image/png">' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'pascual_favicon', 5 );

/**
 * Meta descripción y datos estructurados (SEO básico).
 */
function pascual_seo() {
	$d = pascual_data();
	if ( is_front_page() ) {
		$desc = 'Cooperativa Pascual: más de 50 años elaborando bebidas de fruta mexicanas. Boing!, Pato Pascual, Lulu, Leche Pascual, Agua Pascual y Mexicola.';
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	} elseif ( is_singular() ) {
		$desc = has_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( get_the_content() ), 30, '…' );
		if ( $desc ) {
			echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
		}
	}
	if ( is_front_page() ) {
		$ld = array(
			'@context'     => 'https://schema.org',
			'@type'        => 'Organization',
			'name'         => $d['name_legal'],
			'alternateName' => $d['name_short'],
			'url'          => home_url( '/' ),
			'logo'         => get_template_directory_uri() . '/assets/img/logo.webp',
			'email'        => $d['email'],
			'telephone'    => '+52' . $d['phone_local'][1],
			'address'      => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => 'Clavijero No. 60, Col. Tránsito',
				'postalCode'      => '06820',
				'addressLocality' => 'Cuauhtémoc, Ciudad de México',
				'addressCountry'  => 'MX',
			),
			'sameAs'       => array_values( $d['social'] ),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput
	}
}
add_action( 'wp_head', 'pascual_seo', 6 );

/**
 * Menú de respaldo con la estructura del sitio original, sin enlaces muertos.
 * Si asignas un menú en Apariencia > Menús, se usa ese.
 */
function pascual_fallback_menu() {
	$d    = pascual_data();
	$base = trailingslashit( home_url() );
	echo '<ul class="nav__list">';
	echo '<li class="menu-item menu-item-has-children"><a href="' . esc_url( $base . '#marcas' ) . '">Productos</a><ul class="sub-menu sub-menu--brands">';
	foreach ( $d['brands'] as $b ) {
		printf(
			'<li class="menu-item"><a href="%s"><img src="%s" alt="" width="44" height="44" loading="lazy" decoding="async"><span>%s</span></a></li>',
			esc_url( $base . $b['slug'] . '/' ),
			pascual_img( 'brand-' . $b['slug'] . '.webp' ), // phpcs:ignore
			esc_html( $b['name'] )
		);
	}
	echo '</ul></li>';
	echo '<li class="menu-item"><a href="' . esc_url( $base . 'donde-comprar-mexico/' ) . '">Dónde comprar</a></li>';
	echo '<li class="menu-item menu-item-has-children"><a href="' . esc_url( $base . 'nosotros/' ) . '">Pascual</a><ul class="sub-menu">';
	foreach ( array( 'nosotros' => 'Nosotros', 'valores' => 'Valores', 'historia' => 'Historia', 'certificaciones' => 'Certificaciones', 'reconocimientos' => 'Reconocimientos' ) as $slug => $label ) {
		echo '<li class="menu-item"><a href="' . esc_url( $base . $slug . '/' ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul></li>';
	echo '<li class="menu-item"><a href="' . esc_url( $base . 'exportaciones/' ) . '">Exportaciones</a></li>';
	echo '<li class="menu-item"><a href="' . esc_url( $base . 'noticias/' ) . '">Noticias</a></li>';
	echo '<li class="menu-item"><a href="' . esc_url( $base . 'contacto/' ) . '">Contacto</a></li>';
	echo '</ul>';
}

/**
 * Formulario de contacto: validación, nonce, trampa anti-spam y envío con wp_mail().
 */
function pascual_handle_contact() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$redirect = remove_query_arg( array( 'contacto', 'campo' ), $redirect );
	$fail     = function ( $code, $field = '' ) use ( $redirect ) {
		$url = add_query_arg( array_filter( array( 'contacto' => $code, 'campo' => $field ) ), $redirect ) . '#contacto';
		wp_safe_redirect( $url );
		exit;
	};

	if ( ! isset( $_POST['pascual_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['pascual_nonce'] ) ), 'pascual_contact' ) ) {
		$fail( 'error' );
	}
	// Campo trampa: los bots lo llenan, las personas no lo ven.
	if ( ! empty( $_POST['sitio_web'] ) ) {
		wp_safe_redirect( add_query_arg( 'contacto', 'ok', $redirect ) . '#contacto' );
		exit;
	}

	$name    = isset( $_POST['nombre'] ) ? sanitize_text_field( wp_unslash( $_POST['nombre'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['telefono'] ) ? sanitize_text_field( wp_unslash( $_POST['telefono'] ) ) : '';
	$message = isset( $_POST['mensaje'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ) ) : '';

	if ( '' === $name ) {
		$fail( 'invalido', 'nombre' );
	}
	if ( ! is_email( $email ) ) {
		$fail( 'invalido', 'email' );
	}
	if ( strlen( preg_replace( '/\D/', '', $phone ) ) < 8 ) {
		$fail( 'invalido', 'telefono' );
	}
	if ( strlen( $message ) < 5 ) {
		$fail( 'invalido', 'mensaje' );
	}

	// Límite simple: un envío por IP cada 30 segundos.
	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'x';
	$key = 'pascual_rl_' . md5( $ip );
	if ( get_transient( $key ) ) {
		$fail( 'espera' );
	}
	set_transient( $key, 1, 30 );

	$d       = pascual_data();
	$to      = apply_filters( 'pascual_contact_to', $d['email'] );
	$subject = 'Contacto desde el sitio web: ' . $name;
	$body    = "Nombre: $name\nEmail: $email\nTeléfono: $phone\n\nMensaje:\n$message\n";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>' );

	if ( wp_mail( $to, $subject, $body, $headers ) ) {
		wp_safe_redirect( add_query_arg( 'contacto', 'ok', $redirect ) . '#contacto' );
		exit;
	}
	delete_transient( $key ); // Si falló el envío, permite reintentar de inmediato.
	$fail( 'error' );
}
add_action( 'admin_post_nopriv_pascual_contact', 'pascual_handle_contact' );
add_action( 'admin_post_pascual_contact', 'pascual_handle_contact' );

/**
 * Quita extras innecesarios del <head> para ahorrar peso.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );

/**
 * Entradas relacionadas: misma categoría; si faltan, completa con otras recetas.
 */
function pascual_related_posts( $post_id, $is_recipe = false, $count = 3 ) {
	$ids  = array();
	$cats = wp_get_post_categories( $post_id );
	if ( $cats ) {
		$q = new WP_Query(
			array(
				'category__in'        => $cats,
				'post__not_in'        => array( $post_id ),
				'posts_per_page'      => $count,
				'ignore_sticky_posts' => true,
				'fields'              => 'ids',
				'no_found_rows'       => true,
			)
		);
		$ids = $q->posts;
	}
	if ( $is_recipe && count( $ids ) < $count ) {
		$q   = new WP_Query(
			array(
				'category_name'       => 'recetas',
				'post__not_in'        => array_merge( array( $post_id ), $ids ),
				'posts_per_page'      => $count - count( $ids ),
				'ignore_sticky_posts' => true,
				'fields'              => 'ids',
				'no_found_rows'       => true,
			)
		);
		$ids = array_merge( $ids, $q->posts );
	}
	return new WP_Query(
		array(
			'post__in'            => $ids ? $ids : array( 0 ),
			'orderby'             => 'post__in',
			'posts_per_page'      => $count,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
}

/** Comentarios sin el campo "Web" (atrae spam y no aporta en recetas). */
add_filter(
	'comment_form_default_fields',
	function ( $fields ) {
		unset( $fields['url'] );
		return $fields;
	}
);

/** La página de Noticias no mezcla recetas, que tienen su propia sección. */
add_action(
	'pre_get_posts',
	function ( $q ) {
		if ( ! is_admin() && $q->is_main_query() && $q->is_home() ) {
			$cat = get_category_by_slug( 'recetas' );
			if ( $cat ) {
				$q->set( 'category__not_in', array_merge( array( $cat->term_id ), get_term_children( $cat->term_id, 'category' ) ) );
			}
		}
	}
);

/** Títulos de archivo sin el prefijo "Categoría:". */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
