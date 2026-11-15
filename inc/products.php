<?php
/**
 * Datos de las páginas de producto. Edita aquí presentaciones, sabores y recetas.
 *
 * Cada presentación: nombre, tamaño, empaque, imagen general ('img') y sabores.
 * Cada sabor: [ nombre, archivo de imagen o '' si no hay foto ]. Las imágenes viven en assets/img/p/.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function pascual_products() {
	$products = array(
		'boing'         => array(
			'layout'   => 'boing',
			'tagline'  => 'Disfruta lo mejor de México',
			'intro'    => 'Hecho con fruta natural, en más de 10 deliciosos sabores y en envase Tetra Pak ecofriendly de porción perfecta.',
			'hero_img' => 'boing-gemina-comp.webp',
			'process'  => true,
			'presentations' => array(
				array(
					'name'      => 'Boing Gemina',
					'size'      => '1000 ml',
					'packaging' => 'Caja de cartón con 12 piezas',
					'img'       => 'boing-gemina-comp.webp',
					'flavors'   => array(
						array( 'Mango', 'boing-gemina-1000ml-mango.webp' ),
						array( 'Guayaba', '' ),
						array( 'Fresa', 'boing-gemina-1000ml-fresa.webp' ),
						array( 'Piña', '' ),
						array( 'Naranja', 'boing-gemina-1000ml-naranja.webp' ),
						array( 'Uva', 'boing-gemina-1000ml-uva.webp' ),
						array( 'Uva arándano', 'boing-gemina-1000ml-uvaarandano.webp' ),
						array( 'Manzana', '' ),
						array( 'Durazno', '' ),
					),
				),
				array(
					'name'      => 'Boing Lata',
					'size'      => '340 ml',
					'packaging' => 'Charola de cartón con 4 six-packs',
					'img'       => 'boing-lata-comp.webp',
					'flavors'   => array(
						array( 'Mango', 'boing-lata-340ml-mango.webp' ),
						array( 'Guayaba', 'boing-lata-340ml-guayaba.webp' ),
						array( 'Fresa', 'boing-lata-340ml-fresa.webp' ),
						array( 'Uva', '' ),
						array( 'Durazno', '' ),
						array( 'Manzana', 'boing-lata-340ml-manzana.webp' ),
					),
				),
				array(
					'name'      => 'Boing Tetra Brick',
					'size'      => '200 ml',
					'packaging' => 'Caja de cartón con 24 piezas',
					'img'       => 'boing-tbrick-200ml-mango.webp',
					'flavors'   => array(
						array( 'Mango', 'boing-tbrick-200ml-mango.webp' ),
						array( 'Guayaba', 'boing-tbrick-200ml-guayaba.webp' ),
						array( 'Fresa', 'boing-tbrick-200ml-fresa.webp' ),
						array( 'Uva', 'boing-tbrick-200ml-uva.webp' ),
						array( 'Manzana', 'boing-tbrick-200ml-manzana.webp' ),
						array( 'Durazno', 'boing-tbrick-200ml-durazno.webp' ),
					),
				),
			),
			'recipes'  => array(
				array( 'Atole de guayaba', 'Ideal para Navidad o Día de Muertos.', 'r-boing-atole.webp', 'atole-guayaba-boing' ),
				array( 'Gelatina de fresas con crema', 'Gelatina cremosa con Boing de fresa. Se puede cuajar.', 'r-boing-gelatina.webp', 'gelatina-de-fresas-con-crema-boing' ),
				array( 'Pescado con adobo de guajillo y naranja', 'Filetes de pescado al horno con adobo de chile guajillo.', 'r-boing-pescado.webp', 'pescado-con-adobo-de-guajillo-y-naranja' ),
			),
		),
		'pato-pascual'  => array(
			'layout'   => 'pato',
			'tagline'  => 'Para disfrutar con amigos',
			'intro'    => 'Refrescos de sabores frutales en presentaciones de 600 y 300 ml.',
			'hero_img' => 'pato-600-comp.webp',
			'presentations' => array(
				array(
					'name'      => 'Pato Pascual',
					'size'      => '600 ml',
					'packaging' => 'Emplayado con 24 piezas',
					'img'       => 'pato-600-comp.webp',
					'flavors'   => array(
						array( 'Limón', 'pato-600ml-limon.webp' ),
						array( 'Frambuesa', 'pato-600ml-frambuesa.webp' ),
						array( 'Manzana', 'pato-600ml-manzana.webp' ),
						array( 'Piña', 'pato-600ml-pina.webp' ),
						array( 'Naranja', '' ),
						array( 'Uva', 'pato-600ml-uva.webp' ),
						array( 'Toronja', 'pato-600ml-toronja.webp' ),
					),
				),
				array(
					'name'      => 'Pato Pascual',
					'size'      => '300 ml',
					'packaging' => 'Emplayado con 24 piezas',
					'img'       => 'pato-300-comp.webp',
					'flavors'   => array(
						array( 'Frambuesa', 'pato-300ml-frambuesa.webp' ),
						array( 'Manzana', 'pato-300ml-manzana.webp' ),
						array( 'Naranja', 'pato-300ml-naranja.webp' ),
						array( 'Uva', 'pato-300ml-uva.webp' ),
					),
				),
			),
			'recipes'  => array(
				array( 'Vodka tamarindo y limón', 'Un coctel refrescante con concentrado de tamarindo y limón.', 'r-pato-vodka.webp', 'vodka-tamarindo-y-limon' ),
				array( 'Salchichas agridulces con Pato Pascual naranja', 'Salchichas salteadas con cebolla y chile en una salsa agridulce.', 'r-pato-salchichas.webp', 'salchichas-agridulces-con-pato-pascual-naranja' ),
				array( 'Paletas de fruta y limón', 'Paletas heladas de fruta mixta con limón.', 'r-pato-paletas.webp', 'paletas-de-fresa-y-limon' ),
			),
		),
		'lulu'          => array(
			'layout'   => 'lulu',
			'tagline'  => 'Más sabor para compartir',
			'intro'    => 'Siete sabores frutales en presentación familiar de 3 litros.',
			'hero_img' => 'lulu-comp.webp',
			'presentations' => array(
				array(
					'name'      => 'Lulú Pet',
					'size'      => '3000 ml',
					'packaging' => 'Emplayado con 6 piezas',
					'img'       => 'lulu-comp.webp',
					'flavors'   => array(
						array( 'Limón', 'lulu-3000ml-limon.webp' ),
						array( 'Frambuesa', 'lulu-3000ml-frambuesa.webp' ),
						array( 'Manzana', 'lulu-3000ml-manzana.webp' ),
						array( 'Piña', 'lulu-3000ml-pina.webp' ),
						array( 'Naranja', 'lulu-3000ml-naranja.webp' ),
						array( 'Uva', 'lulu-3000ml-uva.webp' ),
						array( 'Toronja', 'lulu-3000ml-toronja.webp' ),
					),
				),
			),
			'recipes'  => array(
				array( 'Cidra preparada con Lulú manzana', 'Una bebida de cidra para brindar en Año Nuevo.', 'r-lulu-cidra.webp', 'cidra-preparada-con-lulu-manzana' ),
				array( 'Gomitas de frambuesa con Lulú', 'Gomitas frutales y divertidas, fáciles de hacer en casa.', 'r-lulu-gomitas.webp', 'gomitas-de-frambuesa-con-lulu' ),
				array( 'Paloma con nieve de tequila y toronja', 'Una paloma fresca y festiva con nieve de toronja casera.', 'r-lulu-paloma.webp', 'paloma-con-nieve-de-tequila-y-toronja' ),
			),
		),
		'leche-pascual' => array(
			'layout'   => 'leche',
			'tagline'  => 'Gran calidad desde la granja hasta tu mesa',
			'intro'    => 'Leche entera de la Cooperativa Pascual para toda la familia.',
			'hero_img' => 'leche-1000.webp',
			'presentations' => array(
				array(
					'name'      => 'Leche Pascual Entera',
					'size'      => '1000 ml',
					'packaging' => '',
					'img'       => 'leche-1000.webp',
					'flavors'   => array(),
				),
			),
			'recipes'  => array(
				array( 'Natilla con Leche Pascual', 'Un postre espeso y cremoso hecho con leche, huevo y fécula.', 'r-leche-natilla.webp', 'natilla-con-leche-pascual' ),
				array( 'Gelatina de Leche Pascual', 'Gelatina de leche con crema, ideal para Semana Santa.', 'r-leche-gelatina.webp', 'gelatina-de-leche-pascual-pascua' ),
			),
		),
		'agua-pascual'  => array(
			'layout'   => 'agua',
			'tagline'  => 'Disfruta con los que más amas',
			'intro'    => 'Agua natural y aguas de sabor, en presentaciones para llevar contigo.',
			'hero_img' => 'agua-500ml.webp',
			'presentations' => array(
				array(
					'name'      => 'Agua Pascual Natural',
					'size'      => '1500 ml',
					'packaging' => 'Caja de cartón con 12 piezas',
					'img'       => 'agua-1500ml.webp',
					'flavors'   => array(),
				),
				array(
					'name'      => 'Agua Pascual',
					'size'      => '500 ml',
					'packaging' => 'Caja de cartón con 12 piezas',
					'img'       => 'agua-500ml.webp',
					'flavors'   => array(
						array( 'Jamaica', 'agua-500ml-jamaica.webp' ),
						array( 'Manzana', 'agua-500ml-manzana.webp' ),
					),
				),
				array(
					'name'      => 'Agua Pascual',
					'size'      => '350 ml',
					'packaging' => 'Caja de cartón con 12 piezas',
					'img'       => 'agua-350ml.webp',
					'flavors'   => array(),
				),
			),
			'recipes'  => array(),
		),
		'mexicola'      => array(
			'layout'   => 'mexicola',
			'tagline'  => 'Sabor a México',
			'intro'    => 'El refresco de cola hecho en México por la Cooperativa Pascual.',
			'hero_img' => '',
			'presentations' => array(),
			'recipes'  => array(
				array( 'Nieve de cereza y Mexicola', 'Un postre helado sin máquina de nieve, con cerezas en almíbar.', 'r-mexicola-nieve.webp', 'nieve-de-cereza-mexicola' ),
			),
		),
	);
	return apply_filters( 'pascual_products', $products );
}

/**
 * Devuelve los datos de un producto (marca + contenido) o false.
 */
function pascual_product( $slug ) {
	$products = pascual_products();
	if ( ! isset( $products[ $slug ] ) ) {
		return false;
	}
	$d = pascual_data();
	foreach ( $d['brands'] as $b ) {
		if ( $b['slug'] === $slug ) {
			return array_merge( $b, $products[ $slug ] );
		}
	}
	return false;
}

/** URL de la receta (entrada del blog) a partir de su slug, que va en la 4.ª posición. */
function pascual_recipe_url( $r ) {
	return ! empty( $r[3] ) ? home_url( '/' . $r[3] . '/' ) : '';
}

function pascual_p_img( $file ) {
	return esc_url( get_template_directory_uri() . '/assets/img/p/' . $file );
}

/**
 * Pasos del proceso de producción (se muestra en las marcas con 'process' => true).
 */
function pascual_process_steps() {
	return array(
		array( 'Selección', 'Elegimos fruta madura de distintas regiones de México.' ),
		array( 'Lavado y molienda', 'La fruta se lava y se muele.' ),
		array( 'Separación', 'Se retiran cáscara, semillas y residuos para obtener la pulpa.' ),
		array( 'Esterilizado y pasteurizado', 'Cuidamos el sabor y el color natural de la pulpa.' ),
	);
}
