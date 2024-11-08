<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'filter_multilang2', language 'es'
 *
 * @package    filter_multilang2
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 *             2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filtername'] = 'Contenido Multi-Idioma (v2)';
$string['parentlangalwaysen'] = 'Usar idiomas padre siempre, incluído \'en\'.';
$string['parentlangbehaviour'] = 'Comportamiento de idiomas padre';
$string['parentlangbehaviour_desc'] = '<p>Para decidir si debe
visualizar o no un bloque de idioma, el filtro trata de emparejar los
idiomas especificados en dicho bloque con el idioma actual utilizado
por el usuario que está visualizando el contenido. Este emparejamiento
se puede realizar de tres formas diferentes, a las que el filtro llama
<em>comportamiento de idiomas padre</em>:</p>
<ul>
<li><b>Usar idiomas padre siempre, excluído \'en\'</b>. <em>Este es el
comportamiento tradicional del plugin</em>, y es el valor
predeterminado para el ajuste. Cuando se selecciona este
comportamiento, el filtro usa tanto los idiomas especificados en el
bloque, como los idiomas padre de éstos (de forma recursiva hasta la
cima), para emparejar el idioma actual utilizado por el usuario que
está visualizando el contenido. Pero el idioma Inglés (\'en\') nunca
se considera un idioma padre en este caso, y se elimina de la lista de
idiomas padre. Por ejemplo, si un bloque de idioma especifica
\'en_kids\' en su lista de idiomas, entonces dicho bloque <em>no</em>
se mostrará si el idioma actual del usuario que visualiza el contenido
es \'en\'. Nótese que el filtro sí usará el idioma Inglés si éste se
especifica <em>explícitamente</em> en el bloque de idioma (p.ej.,
<small><tt>{mlang en}Este texto sí se mostrará si el idioma actual del
usuario que visualiza el contenido es
\'en\'{mlang}</tt></small>).</li>
<li><b>Usar idiomas padre siempre, incluído \'en\'</b>. Este
comportamiento funciona como "Usar idiomas padre siempre, excluído
\'en\'", pero no elimina el idioma Inglés (\'en\') de la lista de
idiomas padre. Así por ejemplo, si un bloque de idioma especifica
\'en_kids\' en su lista de idiomas, entonces dicho bloque <em>sí</em>
se mostrará si el idioma actual del usuario que visualiza el contenido
es \'en\'.</li>
<li><b>No usar idiomas padre nunca</b>. Como su nombre indica, este
comportamiento nunca usa los idiomas padre para emparejar el idioma
actual utilizado por el usuario que está visualizando el contenido. El
filtro se limita a usar únicamente los idiomas especificados en el
bloque de idioma.</li> </ul>';
$string['parentlangdefault'] = 'Usar idiomas padre siempre, excluído \'en\' (comportamiento tradicional).';
$string['parentlangnever'] = 'No usar idiomas padre nunca.';
$string['pluginname'] = 'Filtro Contenido Multi-Idioma (v2)';
$string['privacy:metadata'] = 'El plugin del filtro de Contenido Multi-idioma (v2) no almacena ningún dato personal.';
