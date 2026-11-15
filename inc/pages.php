<?php
/**
 * Contenido de Valores, Historia, Certificaciones y Reconocimientos.
 * Edita aquí los textos; las plantillas están en template-parts/.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Slugs con plantilla propia => archivo en template-parts/. */
function pascual_inner_pages() {
	return array(
		'valores'         => 'valores',
		'historia'        => 'historia',
		'certificaciones' => 'certificaciones',
		'reconocimientos' => 'reconocimientos',
		'donde-comprar-mexico' => 'donde-comprar',
		'exportaciones'   => 'exportaciones',
	);
}

function pascual_h_img( $file ) {
	return esc_url( get_template_directory_uri() . '/assets/img/h/' . $file );
}

function pascual_valores() {
	return array(
		array( 'Solidaridad', 'Nos unimos a la causa de los demás: nos apoyamos y trabajamos juntos para alcanzar objetivos comunes.' ),
		array( 'Responsabilidad', 'Cumplimos nuestros compromisos y asumimos nuestras tareas con seriedad y diligencia.' ),
		array( 'Ayuda mutua', 'Fomentamos la colaboración y el apoyo entre las personas, para lograr metas compartidas.' ),
		array( 'Democracia', 'Respetamos el derecho al voto y la diversidad de ideas, en un ambiente incluyente y participativo.' ),
		array( 'Igualdad', 'Tratamos a todas las personas con humanidad y respeto, sin discriminar a nadie, y con las mismas oportunidades.' ),
		array( 'Equidad', 'Reconocemos el esfuerzo y la aportación de cada persona y la retribuimos según lo que le corresponde.' ),
	);
}

/** Orden cronológico. [ año, fecha, titular, párrafos[], imagen ] */
function pascual_historia() {
	return array(
		array(
			'1940',
			'Finales de los años 30 o principios de los 40',
			'Nace Pascual',
			array(
				'Pascual S.A. fue fundada por Rafael Víctor Jiménez Zamudio. Sus primeros productos fueron paletas; después vino el agua embotellada en garrafón y, por último, los refrescos Pascual.',
			),
			'historia-1940.webp',
		),
		array(
			'1950',
			'Década de 1950',
			'Fruta en tu refresco',
			array(
				'Las primeras instalaciones estuvieron en la colonia Anáhuac, luego en la San Rafael y, a principios de los 50, en la colonia Tránsito.',
				'Pato Pascual se promocionó con el lema «Fruta en tu refresco». En esa década nació Lulú, representada por una muñeca coqueta e inocente que marcó a toda una generación.',
			),
			'historia-1950.webp',
		),
		array(
			'1960',
			'Década de 1960',
			'Llega Boing!',
			array(
				'A principios de los 60 la empresa ya era reconocida en la industria de los refrescos y tenía instalaciones en México, Estados Unidos y Japón.',
				'Se lanzó Boing!, una bebida de frutas sin gas, y Rafael Jiménez obtuvo de Tetra Pak la exclusividad para envasarla. A finales de la década se adquirió la Planta Norte, antes de Canada Dry, junto con su franquicia.',
			),
			'historia-1960.webp',
		),
		array(
			'1982',
			'18 de marzo de 1982',
			'La huelga',
			array(
				'El gobierno decretó aumentos salariales de 10, 20 y 30 %. La mayoría de las empresas los aplicó, pero el dueño de Refrescos Pascual se negó. Los trabajadores buscaron apoyo en el Partido Mexicano de los Trabajadores y fueron a huelga, con lo que se paralizaron las dos plantas.',
				'El 31 de mayo se disparó en la planta Sur para romper la huelga: murieron dos trabajadores y varios resultaron heridos. El movimiento, con Demetrio Vallejo, los asesores y el Comité de Lucha, tomó las oficinas del séptimo piso de la Junta Federal de Conciliación y Arbitraje, obtuvo la titularidad del Contrato Colectivo de Trabajo y triunfó.',
				'A raíz de la huelga se perdieron la exclusividad de envasado con Tetra Pak y la franquicia de Canada Dry.',
			),
			'historia-1982.webp',
		),
		array(
			'1984',
			'27 de agosto de 1984',
			'Los bienes pasan a los trabajadores',
			array(
				'En una asamblea previa a una audiencia se acordó una solución alternativa al conflicto: los bienes de Refrescos Pascual S.A. pasarían a los trabajadores, que se comprometieron a trabajar bajo el sistema de cooperativa.',
			),
			'historia-1984.webp',
		),
		array(
			'1985',
			'27 de mayo de 1985',
			'Empieza la Cooperativa',
			array(
				'La Sociedad Cooperativa Trabajadores de Pascual S.C.L. inicia actividades con el «Proyecto Aguascalientes»: ocho camiones viajaron a ese estado para abastecerse, porque allí aún se producía Boing!, y regresaron al entonces Distrito Federal para reabrir y recuperar el mercado.',
				'Con el tiempo se volvió líder en bebidas carbonatadas, como Pato Pascual, Lulú y Mexicola, y también produce Boing, Néctasis, Agua Purificada Pascual, agua saborizada sin gas y Leche Pascual.',
			),
			'historia-1985.webp',
		),
	);
}

function pascual_trofeos() {
	return array(
		'Trofeo Azteca',
		'Trofeo Azteca de Oro',
		'Trofeo Azul',
		'Trofeo BIZ',
		'Trofeo de Oro',
		'Trofeo Excelencia Europa',
		'Trofeo Internacional',
		'Trofeo Pascual',
		'Trofeo Prestigio Comercial',
		'Trofeo Querétaro',
		'Trofeo Verde',
	);
}

/**
 * Dónde comprar: plantas y sucursales.
 * Datos tomados de pascual.com.mx/donde-comprar-mexico (nombre, dirección, teléfono y enlace al mapa).
 * 'state' lo agregamos para agrupar. Villahermosa va sin dirección: en el sitio original
 * repite la de Tizayuca; falta confirmar la correcta.
 */
function pascual_plantas() {
	return array(
		array( 'name' => 'Planta San Juan del Río', 'state' => 'Querétaro', 'address' => 'Paseo Central No. 36, Fracc. Industrial Valle de Oro, C.P. 76802, San Juan del Río, Querétaro', 'tel' => '4272725544', 'map' => 'https://maps.app.goo.gl/FPiBGFPk19QqiQws5' ),
		array( 'name' => 'Planta Tizayuca', 'state' => 'Hidalgo', 'address' => 'Av. de las Diligencias No. 7, Colonia Tepojaco, C.P. 43810, Tizayuca, Hidalgo', 'tel' => '7797969210', 'map' => 'https://maps.app.goo.gl/K4yj9Q8SWvVGPekD8' ),
	);
}

function pascual_sucursales() {
	return array(
		array( 'name' => 'Acapulco', 'state' => 'Guerrero', 'address' => 'Carretera Cayaco Pto. Marquez No. 40 Col. Piedra Roja, C.P. 39704', 'tel' => '7444683092', 'map' => 'https://maps.app.goo.gl/Dymm9Sw27HULMicn8' ),
		array( 'name' => 'Aguascalientes', 'state' => 'Aguascalientes', 'address' => 'Gregorio Ruiz V. 203, Cd. Industrial, Aguascalientes, C.P. 20290', 'tel' => '4499710757', 'map' => 'https://maps.app.goo.gl/XegJVBZ3PJpEUp2L7' ),
		array( 'name' => 'Atlacomulco', 'state' => 'Estado de México', 'address' => 'Silencio #200 Esq. J. Ma. Morelos. Santiago Acutzilapan, Atlacomulco, CP. 50483', 'tel' => '7121204428', 'map' => 'https://maps.app.goo.gl/8ZUqxPEKJb3TqrqLA' ),
		array( 'name' => 'Apizaco', 'state' => 'Tlaxcala', 'address' => 'Heroico Colegio Militar N. 515 Colonia Centro, Apizaco Tlaxcala C.P. 90300', 'tel' => '2414175949', 'map' => 'https://maps.app.goo.gl/chvKrzaMWs352GUh8' ),
		array( 'name' => 'Ciudad Madero', 'state' => 'Tamaulipas', 'address' => 'Carr. Tampico Mante #417-A Col. Tampico Altamira Cd. Altamira Tam, C.P 89609', 'tel' => '8332102549', 'map' => 'https://maps.app.goo.gl/oFeUGz4Gf25sC5WPA' ),
		array( 'name' => 'Celaya', 'state' => 'Guanajuato', 'address' => 'Carr. Celaya – Salvatierra Km 3, Fracc. Michinelas, Celaya Gto C.P. 38094', 'tel' => '4616182899', 'map' => 'https://maps.app.goo.gl/Z1KDE43sbXCnWcqc6' ),
		array( 'name' => 'Cuautla', 'state' => 'Morelos', 'address' => 'Nicolas Bravo Esq. I. Allende N°3 Parque Industrial Cuautla, Mcpio De Ayala,Mor. CP 62715', 'tel' => '7351222439', 'map' => 'https://maps.app.goo.gl/pzTP5cRNgVgXGPkq9' ),
		array( 'name' => 'Cuernavaca', 'state' => 'Morelos', 'address' => 'Av. Insurgentes No 19-A, Col. Centro C.P. 62550 Jiutepec, Morelos', 'tel' => '7773190745', 'map' => 'https://maps.app.goo.gl/EqEwcnXT2a37RTve9' ),
		array( 'name' => 'Guadalajara', 'state' => 'Jalisco', 'address' => 'San Pablo No. 100 Colonia Las Pintas CP 45690 El Salto, Jalisco', 'tel' => '3336892330', 'map' => 'https://maps.app.goo.gl/4ry47X1v9fRYCefZ9' ),
		array( 'name' => 'Iguala', 'state' => 'Guerrero', 'address' => 'Carr. Fed-Iguala Taxco Km. 2.5 Lt.9, Mz. V Col. Cd. Industrial Del Valle De Iguala C.P. 40025', 'tel' => '7333325202', 'map' => 'https://maps.app.goo.gl/SgQ3ehqRxuvx7u7Z7' ),
		array( 'name' => 'Izúcar de Matamoros', 'state' => 'Puebla', 'address' => 'Bvd. Revolución Barrio Sta. Cruz Tecoxco N°1729 Izucar de Matamoros, Puebla C.P. 74410', 'tel' => '2434365297', 'map' => 'https://maps.app.goo.gl/HjhxcQwwmf2LG1Sx9' ),
		array( 'name' => 'León', 'state' => 'Guanajuato', 'address' => 'Blvr Saturno #2822 Y 2824 Col. Hacienda San Miguel Guanajuato C.P 37288', 'tel' => '4771028387', 'map' => 'https://maps.app.goo.gl/3ZZVfZePG6rbNktN8' ),
		array( 'name' => 'Minatitlán', 'state' => 'Veracruz', 'address' => 'Berlin #33, Col. Nueva Mina, C.P. 96760, Minatitlan, Veracruz', 'tel' => '9222212929', 'map' => 'https://maps.app.goo.gl/ZpV8C7ixs9hUkwvc6' ),
		array( 'name' => 'Monterrey', 'state' => 'Nuevo León', 'address' => 'Morenita Mia #200-A Col. Res. Roble, San Nicolas de los Garza, N.L . C.P. 66414', 'tel' => '8183502480', 'map' => 'https://maps.app.goo.gl/bgyge12Tm5A2ZXhu5' ),
		array( 'name' => 'Morelia', 'state' => 'Michoacán', 'address' => 'Carpinteros de Paracho #703-B Col. 5 de Mayo, Morelia, Mich, CP. 58230', 'tel' => '4433248692', 'map' => 'https://maps.app.goo.gl/XYv7andb4cjuk9Lr9' ),
		array( 'name' => 'Pachuca', 'state' => 'Hidalgo', 'address' => 'Av. B L-20 Col. Parque Industrial Canacintra, Mcpio Mineral del Reforma, Hgo. CP. 42181', 'tel' => '7717163720', 'map' => 'https://maps.app.goo.gl/dNtWaQDmNAh2dnp6A' ),
		array( 'name' => 'Poza Rica', 'state' => 'Veracruz', 'address' => 'Calle Queretaro #500 Col. Mexico. C.P. 93310, Poza Rica de Hidalgo, Veracruz', 'tel' => '7828241015', 'map' => 'https://maps.app.goo.gl/BYmUTLrpXr6Pxdir8' ),
		array( 'name' => 'Puebla', 'state' => 'Puebla', 'address' => 'Cerrada de San Joaquin N°5 Col. Chachapa C.P 72990, Amozoc De Mota, Puebla', 'tel' => '2222860641', 'map' => 'https://maps.app.goo.gl/HaqBnbQHWX15fbej6' ),
		array( 'name' => 'Querétaro', 'state' => 'Querétaro', 'address' => 'Av. Paseo Constituyentes #1081, Col. El Pocito Corregidora, Querétaro. C.P.76902', 'tel' => '4422164272', 'map' => 'https://maps.app.goo.gl/fhKGvKfNxTf58eWd8' ),
		array( 'name' => 'Río Blanco', 'state' => 'Veracruz', 'address' => 'Camino Nacional Num. 7 Colonia Hospitalito Rio Blanco, Veracruz C.P. 94730', 'tel' => '2727275239', 'map' => 'https://maps.app.goo.gl/4N289X7r2xeNAJaL9' ),
		array( 'name' => 'San Juan del Río', 'state' => 'Querétaro', 'address' => 'Av. Universidad No.325 Col. Granjas Banthi, San Juan Del Rio, Queretaro, C.P. 76805', 'tel' => '4272641412', 'map' => 'https://maps.app.goo.gl/6EkVxcAcpwxur9xo8' ),
		array( 'name' => 'San Luis Potosí', 'state' => 'San Luis Potosí', 'address' => 'Carr. San Luis Matehuala, No. Km.2-180 Col. Urbana Central de Maquinaria, Soledad Dde Graciano Sanchez, S.L.P. C.P. 78434', 'tel' => '4448166839', 'map' => 'https://maps.app.goo.gl/ZSb5htgWL8iv1iDZ8' ),
		array( 'name' => 'Tizayuca', 'state' => 'Hidalgo', 'address' => 'Av. de las Diligencias No. 7 Colonia Tepojaco, Tizayuca Hgo. Cp. 43810', 'tel' => '7797969250', 'map' => 'https://maps.app.goo.gl/K4yj9Q8SWvVGPekD8' ),
		array( 'name' => 'Toluca', 'state' => 'Estado de México', 'address' => 'Av. del Cerrillo Lt. 2 Manzana 1 Parque Industrial El Cerrillo I, Lerma Mexico C.P. 52000', 'tel' => '7282852996', 'map' => 'https://maps.app.goo.gl/LK7jHbjGcE3TPL6D7' ),
		array( 'name' => 'Tulancingo', 'state' => 'Hidalgo', 'address' => 'Av. Fernando de la Peña #149 Col. Valle Verde C.P.43648 Tulancingo de Bravo Hidalgo', 'tel' => '7757427027', 'map' => 'https://maps.app.goo.gl/YDDpbtSgHLffsTUS7' ),
		array( 'name' => 'Villahermosa', 'state' => 'Tabasco', 'address' => '', 'tel' => '9931416707', 'map' => 'https://maps.app.goo.gl/MYXsYCkCyb4XJinJ9' ),
	);
}

/** Sucursales agrupadas por estado, en orden alfabético. */
function pascual_sucursales_por_estado() {
	$out = array();
	foreach ( pascual_sucursales() as $s ) {
		$out[ $s['state'] ][] = $s;
	}
	uksort( $out, function ( $a, $b ) { return strcmp( remove_accents( $a ), remove_accents( $b ) ); } );
	return $out;
}

/** 7444683092 -> 744 468 3092 */
function pascual_tel_fmt( $tel ) {
	$t = preg_replace( '/\D/', '', $tel );
	return 10 === strlen( $t ) ? substr( $t, 0, 3 ) . ' ' . substr( $t, 3, 3 ) . ' ' . substr( $t, 6 ) : $tel;
}
