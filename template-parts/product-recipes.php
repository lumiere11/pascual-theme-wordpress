<?php
/**
 * Recetas de la marca. Usa $p.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( ! empty( $p['recipes'] ) ) : ?>
<section class="section section--tint" id="recetas">
	<div class="wrap">
		<header class="section__head">
			<h2>Sácale más sabor a tu <?php echo esc_html( preg_replace( '/!$/', '', $p['name'] ) ); ?></h2>
		</header>
		<ul class="recipes">
			<?php foreach ( $p['recipes'] as $r ) : ?>
				<li class="recipe"><a href="<?php echo esc_url( pascual_recipe_url( $r ) ); ?>">
					<img src="<?php echo pascual_p_img( $r[2] ); // phpcs:ignore ?>" alt="<?php echo esc_attr( $r[0] ); ?>" width="560" height="747" loading="lazy" decoding="async">
					<div class="recipe__body">
						<h3><?php echo esc_html( $r[0] ); ?></h3>
						<p><?php echo esc_html( $r[1] ); ?></p>
						<span class="recipe__cta">Ver receta</span>
					</div></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php endif; ?>
