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
 * Strings for component 'filter_multilang2', language 'en'
 *
 * @package    filter_multilang2
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 *             2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filtername'] = 'Multi-Language Content (v2)';
$string['parentlangbehaviour'] = 'Parent languages behaviour';
$string['parentlangbehaviour_desc'] = '<p>When the filter checks whether
a language block has to be displayed or not, it tries to match the
languages specified in the block with the current language used by the
user displaying the content. This matching can be done in three
different ways, that the filter calls <em>parent languages
behaviour</em>:</p>
<ul>
<li><b>Always use parent languages, excluding \'en\'</b>. <em>This is
the traditional behaviour of the plugin</em>, and is the default value
for the setting. When this behaviour is selected, the filter uses both
the languages specified in the language block, and all the parents of
those languages (recursively to the top), to match the current
language used by the user. But the English language (\'en\') is never
considered a parent language in this case, and is removed from the
parent list. E.g., a language block that specifies \'en_kids\' in the
language list will not be displayed if the current language used by
the user displaying the content is \'en\'. Notice that the English
language is still used by the filter if it is <em>explicitly</em>
specified in the language blocks (e.g., <small><tt>{mlang en}This text will
be shown when the current language used by the user displaying the
content is \'en\'{mlang})</tt></small>.</li>
<li><b>Always use parent languages, including \'en\'</b>. Which works
as "Always use parent languages, excluding \'en\'", but does not
remove the English (\'en\') language from the parent languages
list. E.g., a language block that specifies \'en_kids\' in the
language list <em>will be</em> displayed if the current language used
by the user displaying the content is \'en\'.</li>
<li><b>Never use parent languages</b>. As the name implies, parent
languages are never used to match the current language used by the
user displaying the content. The filter restricts itself to the
languages specified in the language block.</li> </ul>';
$string['parentlangdefault'] = 'Always use parent languages, excluding \'en\' (traditional behaviour).';
$string['parentlangalwaysen'] = 'Always use parent languages, including \'en\'.';
$string['parentlangnever'] = 'Never use parent languages.';
$string['pluginname'] = 'Multi-Language Content (v2) Filter';
$string['privacy:metadata'] = 'The Multi-Language Content (v2) Filter plugin does not store any personal data.';
