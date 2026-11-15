<?php
/**
 * Plantilla general (noticias, archivos, búsqueda y entradas).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<section class="page-head">
	<div class="wrap">
		<h1>
			<?php
			if ( is_home() && ! is_front_page() ) {
				single_post_title();
			} elseif ( is_archive() ) {
				the_archive_title();
			} elseif ( is_search() ) {
				printf( 'Resultados para: %s', esc_html( get_search_query() ) );
			} else {
				echo 'Noticias';
			}
			?>
		</h1>
	</div>
</section>

<div class="wrap section">
	<?php if ( have_posts() ) : ?>
		<div class="post-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="post-card__img" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php the_post_thumbnail( 'pascual-card', array( 'loading' => 'lazy' ) ); ?></a>
					<?php endif; ?>
					<div class="post-card__body">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28, '…' ) ); ?></p>
						<a class="more" href="<?php the_permalink(); ?>">Leer más</a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => 'Anterior', 'next_text' => 'Siguiente' ) ); ?>
	<?php else : ?>
		<div class="empty">
			<h2><?php echo is_search() ? esc_html( sprintf( 'No hay resultados para «%s»', get_search_query() ) ) : 'Todavía no hay publicaciones'; ?></h2>
			<p>Prueba con otra palabra o explora el sitio.</p>
			<?php get_search_form(); ?>
			<p class="empty__links"><a href="<?php echo esc_url( home_url( '/#marcas' ) ); ?>">Productos</a> <a href="<?php echo esc_url( home_url( '/category/recetas/' ) ); ?>">Recetas</a> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></p>
		</div>
	<?php endif; ?>
</div>
<?php
get_footer();
