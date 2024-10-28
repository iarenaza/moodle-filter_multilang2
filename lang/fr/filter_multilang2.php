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
 * Strings for component 'filter_multilang2', language 'fr'
 *
 * @package    filter_multilang2
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 *             2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filtername'] = 'Contenu Multilingue (v2)';
$string['parentlangbehaviour'] = 'Comportement des langues parentes.';
$string['parentlangbehaviour_desc'] = '<p>Lorsque le filtre vérifie
si un bloc de langue doit être affiché ou non, il essaie de faire
correspondre les langues spécifiées dans le bloc avec la langue
actuellement utilisée par l\'utilisateur affichant le contenu. Cette
correspondance peut être effectuée de trois manières différentes, que
le filtre appelle <em>comportement des langues parentes</em>:</p>
<ul>
<li><b>Utiliser toujours les langues parentes, à l\'exclusion de
\'en\'</b>. <em>Il s\'agit du comportement
traditionnel du plugin</em> et constitue la valeur par défaut du
paramètre. Lorsque ce comportement est sélectionné, le filtre utilise
à la fois les langues spécifiées dans le bloc de langue et tous les
parents de ces langues (de manière récursive vers le haut), pour
correspondre à la langue actuellement utilisée par
l\'utilisateur. Mais la langue anglaise (\'en\') n\'est jamais
considérée comme une langue parente dans ce cas et est supprimée de la
liste des langues parentes. Par exemple, un bloc de langue qui
spécifie \'en_kids\' dans la liste des langues <em>ne sera pas</em>
affiché si la langue actuellement utilisée par l\'utilisateur
affichant le contenu est \'en\'. Notez que la langue anglaise est
toujours utilisée par le filtre si elle est explicitement spécifiée
dans le bloc de langue (p.ex., <small><tt>{mlang en}Ce texte ci sera
affiché si la langue actuellement utilisée par l\'utilisateur
affichant le contenu est \'en\'{mlang}</tt></small>).</li>
<li><b>Utiliser toujours les langues parentes, y compris
\'en\'</b>. Ce comportement fonctionne comme "Utiliser toujours les
langues parentes, à l\'exclusion de \'en\'", mais ne supprime pas la
langue anglaise (\'en\') de la liste des langues parentes. Par
exemple, un bloc de langue qui spécifie \'en_kids\' dans la liste des
langues <em>sera</em> affiché si la langue actuellement utilisée par
l\'utilisateur affichant le contenu est \'en\'.</li>
<li><b>N\'utiliser jamais les langues parentes</b>. Comme son nom
l\'indique, les langues parents ne sont jamais utilisées pour
correspondre à la langue actuellement utilisée par l\'utilisateur
affichant le contenu. Le filtre se limite aux langues spécifiées
dans le bloc de langue.</li>
</ul>';
$string['parentlangdefault'] = 'Utiliser toujours les langues parentes, à l\'exclusion de \'en\' (comportement traditionnel).';
$string['parentlangalwaysen'] = 'Utiliser toujours les langues parentes, y compris \'en\'.';
$string['parentlangnever'] = 'N\'utiliser jamais les langues parentes.';
$string['pluginname'] = 'Filtre de Contenu Multilingue (v2)';
$string['privacy:metadata'] = 'Le plugin Filtre Contenu Multilingue (v2) n’enregistre aucune donnée personnelle.';
