# Pascual Mejorado — tema de WordPress

## Instalar
1. Haz un respaldo del sitio actual.
2. WordPress > Apariencia > Temas > Añadir nuevo > Subir tema > `pascual-mejorado.zip` > Activar.
3. (Opcional) Apariencia > Menús: crea un menú y asígnalo a "Menú principal". Si no, usa el que viene en el tema.
4. Ajustes > Lectura: "Tu página de inicio muestra" > Tus últimas entradas (el tema ya trae su propia portada, `front-page.php`).

## Editar datos
Todo está en `functions.php`, función `pascual_data()`: teléfonos, WhatsApp, correo, dirección, redes, cifras y marcas (colores, textos).

## Páginas de producto y Nosotros (v1.1)
El tema las dibuja solo cuando la página existe con estos enlaces permanentes (slug): `boing`, `pato-pascual`, `lulu`, `leche-pascual`, `agua-pascual`, `mexicola` y `nosotros`. Con el diseño nuevo, el contenido de esas páginas sale del código, no del editor de WordPress.
- Presentaciones, sabores, empaques y recetas: `inc/products.php`.
- Fotos: `assets/img/p/`. Los sabores sin foto aparecen como etiqueta sin imagen.
- Misión y visión de Nosotros: `template-parts/nosotros.php`.

## Valores, Historia, Certificaciones y Reconocimientos (v1.2)
Mismos slugs que el sitio actual: `valores`, `historia`, `certificaciones`, `reconocimientos`. Textos y listas en `inc/pages.php` (la ISO 9001 está en `template-parts/certificaciones.php`). Fotos en `assets/img/h/`.
- **Certificado ISO**: el que muestra el sitio indica vigencia del 4 de septiembre de 2018 al 4 de septiembre de 2021. Sustituir `assets/img/h/iso.webp` por el vigente.
- **Reconocimientos**: el sitio original no trae año, organismo ni foto de cada trofeo (solo una). Se muestran los 11 nombres; agregar esos datos en `pascual_trofeos()` cuando existan.
- **Historia**: ordené los hitos de más antiguo a más reciente y escribí los titulares. Revisar el relato de 1982 con quien corresponda.

## Modo oscuro (v1.3)
El sitio abre en claro u oscuro según el dispositivo del visitante, y el botón de sol/luna de la cabecera permite cambiarlo; la elección se recuerda en ese navegador. La paleta oscura está al final de `assets/css/main.css` (bloque "Modo oscuro"). Los colores de marca no cambian.

## Dónde comprar (v1.4)
La página con slug `donde-comprar-mexico` muestra el directorio de sucursales y plantas, con buscador por ciudad o estado. Los datos están en `inc/pages.php`: `pascual_sucursales()` y `pascual_plantas()`.
- **Villahermosa** va sin dirección: en el sitio original repite la de Tizayuca. Agregar la correcta en `pascual_sucursales()`.
- La portada dice 30 sucursales y el directorio tiene 26. Ajustar la cifra en `pascual_data()` o completar la lista.

## Exportaciones (v1.5)
La página con slug `exportaciones` usa `template-parts/exportaciones.php`. La del sitio original está vacía, así que solo dice lo publicado en el comunicado "Plan de expansión 2019-2020": exportación a Estados Unidos y relaciones comerciales en exploración con Centro y Sudamérica. Faltan y hay que pedir a la Cooperativa:
- Países a los que se exporta hoy y qué marcas.
- Correo o teléfono del área de exportaciones (por ahora usa el contacto general).
- Si el dato de 2019 sigue vigente.

## Pendientes a revisar
- **Frases de marca inventadas**: el sitio no tenía lema para Lulu ("Más sabor para compartir"). Revisar también los textos de introducción de cada marca.
- **Cifras de Nosotros**: el sitio original mostraba 0 en trabajadores y plantas; usé las cifras de la portada.
- **Valores, Historia, Certificaciones y Reconocimientos** siguen con el diseño de página interna genérico.
- **WhatsApp**: el número original (`15522727053`) parece no llevar el prefijo `52` de México. Confirmar el correcto.
- **"9 marcas"**: la portada muestra 6. Ajustar la cifra o agregar las otras 3.
- **Correo del formulario**: llega a `contacto@pascual.com.mx`. Para que se entregue, el servidor debe poder enviar correo (recomendado: plugin WP Mail SMTP).
- Los textos de cada marca (`blurb`) son propuestas: revisar con Mercadotecnia.
- Las páginas internas (Nosotros, Valores, Historia, boing, lulu, etc.) siguen siendo las del sitio actual; este tema solo les da el diseño de página interna.
