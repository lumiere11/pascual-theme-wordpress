<?php
/**
 * Dónde comprar: plantas y sucursales, con buscador por ciudad o estado.
 * Variables de una fila: $loc (name, state, address, tel, map).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$d        = pascual_data();
$plantas  = pascual_plantas();
$estados  = pascual_sucursales_por_estado();
$total    = count( pascual_sucursales() );
$ih_title = 'Dónde comprar';
$ih_crumb = 'Dónde comprar';
$ih_top   = true;
$ih_lede  = $total . ' sucursales en ' . count( $estados ) . ' estados. Llama a la más cercana para surtir tu negocio o tu casa.';
include get_theme_file_path( 'template-parts/inner-hero.php' );

$pascual_loc_row = function ( $loc ) {
	?>
	<li class="loc" data-loc="<?php echo esc_attr( strtolower( remove_accents( $loc['name'] . ' ' . $loc['state'] ) ) ); ?>">
		<h3 class="loc__name"><?php echo esc_html( $loc['name'] ); ?></h3>
		<?php if ( $loc['address'] ) : ?>
			<p class="loc__addr"><?php echo esc_html( $loc['address'] ); ?></p>
		<?php endif; ?>
		<p class="loc__links">
			<a href="tel:<?php echo esc_attr( $loc['tel'] ); ?>"><?php echo pascual_icon( 'phone' ); // phpcs:ignore ?><?php echo esc_html( pascual_tel_fmt( $loc['tel'] ) ); ?></a>
			<a href="<?php echo esc_url( $loc['map'] ); ?>" target="_blank" rel="noopener"><?php echo pascual_icon( 'pin' ); // phpcs:ignore ?>Ver en el mapa<span class="screen-reader-text">: <?php echo esc_html( $loc['name'] ); ?></span></a>
		</p>
	</li>
	<?php
};
?>

<section class="section" data-locator>
	<div class="wrap">
		<div class="finder">
			<label for="loc-q">Busca tu ciudad o estado</label>
			<input id="loc-q" type="search" autocomplete="off" placeholder="Por ejemplo: Puebla" data-loc-q>
			<p class="finder__count" data-loc-count aria-live="polite"></p>
		</div>

		<div class="dir">
			<?php foreach ( $estados as $estado => $locs ) : ?>
				<section class="dir__group" data-loc-group>
					<h2 class="dir__state"><?php echo esc_html( $estado ); ?></h2>
					<ul class="dir__list">
						<?php
						foreach ( $locs as $loc ) {
							$pascual_loc_row( $loc );
						}
						?>
					</ul>
				</section>
			<?php endforeach; ?>
		</div>
		<p class="dir__empty" data-loc-empty hidden>No tenemos sucursal con ese nombre. Llámanos al <a href="tel:<?php echo esc_attr( $d['phone'][1] ); ?>"><?php echo esc_html( $d['phone'][0] ); ?></a> y te decimos dónde encontrar nuestros productos.</p>
	</div>
</section>

<section class="section section--tint">
	<div class="wrap">
		<header class="section__head">
			<h2>Plantas de producción</h2>
		</header>
		<ul class="dir__list dir__list--plants">
			<?php
			foreach ( $plantas as $loc ) {
				$pascual_loc_row( $loc );
			}
			?>
		</ul>
	</div>
</section>

<section class="section section--yellow">
	<div class="wrap buy">
		<div>
			<h2>¿Prefieres pedir en línea?</h2>
			<p>Haz tu pedido y recíbelo sin ir a la sucursal.</p>
		</div>
		<div class="buy__actions">
			<a class="btn btn--primary" href="<?php echo esc_url( $d['order_url'] ); ?>" target="_blank" rel="noopener">Hacer un pedido en línea</a>
		</div>
	</div>
</section>
<?php
get_footer();
