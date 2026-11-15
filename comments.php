<?php
/**
 * Comentarios de entradas.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( post_password_required() ) {
	return;
}
?>
<section class="comments" id="comentarios">
	<?php if ( have_comments() ) : ?>
		<h2><?php echo esc_html( sprintf( _n( '%s comentario', '%s comentarios', get_comments_number(), 'pascual' ), number_format_i18n( get_comments_number() ) ) ); ?></h2>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 0,
				)
			);
			?>
		</ol>
		<?php the_comments_navigation( array( 'prev_text' => 'Comentarios anteriores', 'next_text' => 'Comentarios nuevos' ) ); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="comments__closed">Los comentarios están cerrados.</p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'          => 'Deja un comentario',
			'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h2>',
			'comment_notes_before' => '<p class="comments__note">Tu correo no se publica. Los campos obligatorios llevan *.</p>',
			'label_submit'         => 'Publicar comentario',
			'class_submit'         => 'btn btn--primary',
			'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
			'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		)
	);
	?>
</section>
