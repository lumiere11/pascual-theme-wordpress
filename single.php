<?php
/**
 * Entrada individual: noticia o receta (con anterior/siguiente, relacionadas y comentarios).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
while ( have_posts() ) :
	the_post();

	$is_recipe = false;
	foreach ( get_the_category() as $cat ) {
		if ( 0 === strpos( $cat->slug, 'receta' ) ) {
			$is_recipe = true;
		}
	}
	$related = pascual_related_posts( get_the_ID(), $is_recipe );
	?>
	<section class="page-head">
		<div class="wrap">
			<p class="page-head__meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p>
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<div class="wrap section">
		<article <?php post_class( 'prose' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="prose__thumb"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<?php the_content(); ?>
		</article>

		<?php
		the_post_navigation(
			array(
				'in_same_term' => $is_recipe,
				'taxonomy'     => 'category',
				'prev_text'    => '<span class="post-nav__label">Anterior</span><span class="post-nav__title">%title</span>',
				'next_text'    => '<span class="post-nav__label">Siguiente</span><span class="post-nav__title">%title</span>',
				'screen_reader_text' => $is_recipe ? 'Más recetas' : 'Más noticias',
			)
		);
		?>

		<?php if ( $related->have_posts() ) : ?>
			<section class="related" aria-labelledby="related-title">
				<h2 id="related-title"><?php echo $is_recipe ? 'Más recetas' : 'Más noticias'; ?></h2>
				<ul class="related__grid">
					<?php
					while ( $related->have_posts() ) :
						$related->the_post();
						?>
						<li class="recipe"><a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'pascual-card', array( 'loading' => 'lazy' ) ); ?>
							<?php endif; ?>
							<div class="recipe__body">
								<h3><?php the_title(); ?></h3>
								<span class="recipe__cta"><?php echo $is_recipe ? 'Ver receta' : 'Leer más'; ?></span>
							</div></a>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</section>
		<?php endif; ?>

		<p class="prose__back prose__back--center"><?php if ( $is_recipe ) : ?><a href="<?php echo esc_url( home_url( '/category/recetas/' ) ); ?>">Ver todas las recetas</a><?php else : ?><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/' ) ); ?>">Ver todas las noticias</a><?php endif; ?></p>

		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</div>
	<?php
endwhile;
get_footer();
