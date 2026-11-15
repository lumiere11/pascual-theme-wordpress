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
