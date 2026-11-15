<?php
/**
 * Cabecera: barra superior de contacto + menú principal.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$d = pascual_data();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#contenido">Saltar al contenido</a>

<div class="topbar">
	<div class="wrap topbar__inner">
		<p class="topbar__text"><span class="topbar__label">Atención a clientes:</span> <a href="tel:<?php echo esc_attr( $d['phone'][1] ); ?>"><strong><?php echo esc_html( $d['phone'][0] ); ?></strong></a> <span class="topbar__local">CDMX: <a href="tel:<?php echo esc_attr( $d['phone_local'][1] ); ?>"><?php echo esc_html( $d['phone_local'][0] ); ?></a></span></p>
		<ul class="topbar__social">
			<li><a href="<?php echo esc_url( pascual_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo pascual_icon( 'whatsapp' ); // phpcs:ignore ?></a></li>
			<?php foreach ( $d['social'] as $net => $url ) : ?>
				<li><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( ucfirst( $net ) ); ?>"><?php echo pascual_icon( $net ); // phpcs:ignore ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<header class="site-header" id="top">
	<div class="wrap site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $d['name_short'] ); ?> — inicio">
			<?php if ( has_custom_logo() ) : ?>
				<?php echo wp_kses_post( get_custom_logo() ); ?>
			<?php else : ?>
				<img src="<?php echo pascual_img( 'logo.webp' ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $d['name_short'] ); ?>" width="64" height="64">
			<?php endif; ?>
		</a>

		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-principal">
			<span class="nav-toggle__bars" aria-hidden="true"></span>
			<span class="screen-reader-text">Menú</span>
		</button>

		<nav class="nav" id="menu-principal" aria-label="Menú principal">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'nav__list',
						'depth'          => 2,
					)
				);
			} else {
				pascual_fallback_menu();
			}
			?>
			<a class="btn btn--primary nav__cta" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Hacer un pedido</a>
		</nav>

		<button class="theme-toggle" type="button" data-theme-toggle aria-label="Cambiar a modo oscuro" hidden>
			<?php echo pascual_icon( 'moon' ) . pascual_icon( 'sun' ); // phpcs:ignore ?>
		</button>
	</div>
</header>

<main id="contenido">
