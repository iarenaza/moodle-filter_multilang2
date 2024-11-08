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
 * Strings for component 'filter_multilang2', language 'eu'
 *
 * @package    filter_multilang2
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 *             2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filtername'] = 'Eduki eleaniztuna (2.bertsioa)';
$string['parentlangalwaysen'] = 'Beti erabili guraso-hizkuntzak, \'en\' barne.';
$string['parentlangbehaviour'] = 'guraso-hizkuntzen portaera';
$string['parentlangbehaviour_desc'] = '<p>Iragazkiak hizkuntza-bloke
bat bistaratu behar den ala ez egiaztatzen duenean, blokean
zehaztutako hizkuntzak edukia ikusten ari den erabiltzailea erabiltzen
ari den hizkuntzarekin lotzen saiatzen da. Bat-etortze hau hiru era
ezberdinetan egin daiteke. Iragazkiak hiru era horiei
<em>guraso-hizkuntzen portaera</em> deitzen die:</p>
<ul>

<li><b>Beti erabili guraso-hizkuntzak, \'en\' izan ezik</b>. <em>Hau
da pluginaren portaera tradizionala</em>, eta ezarpenaren balio
lehenetsia da. Jokabide hau hautatzen denean, iragazkiak
hizkuntza-blokean zehaztutako hizkuntzak eta hizkuntza horien
guraso-hizkuntza guztiak (errekurtsiboki hartuta) erabiltzen ditu,
edukia ikusten ari den erabiltzailea erabiltzen ari den hizkuntzarekin
bat etortzeko. Baina ingelesa (\'en\') ez da inoiz
guraso-hizkuntzatzat hartzen kasu honetan, eta guraso-hizkuntzen
zerrendatik kentzen da. Adibidez, hizkuntza-zerrendan \'en_kids\'
zehazten duen hizkuntza-bloke bat ez da bistaratuko edukia ikusten are
den erabiltzailea erabiltzen ari den hizkuntza \'en\' bada.  Hala eta
guztiz ere, iragazkiak ingelesa (\'en\') nahitaez erabiliko du
hizkuntza-blokean esplizituki zehazten bada. (adib., <small><tt>{mlang
en}Testu hau bistaratuko da edukia ikusten ari den erabiltzailea
erabiltzen ari den hizkuntza \'en\' bada{mlang}</tt></small>)</li>
<li><b>Beti erabili guraso-hizkuntzak, \'en\' barne </b>. "Beti erabili
guraso-hizkuntzak, \'en\' izan ezik" bezala funtzionatzen duena, baina
ez du ingelesa (\'en\') guraso-hizkuntzen zerrendatik kentzen.
Adibidez, hizkuntza-zerrendan \'en_kids\' zehazten duen
hizkuntza-bloke bat bistaratuko da edukia ikusten ari den
erabiltzailea erabiltzen ari den hizkuntza \'en\' bada.</li>
<li><b>Ez erabili inoiz guraso-hizkuntzak.</b> Izenak dioen bezala,
guraso-hizkuntzak ez dira inoiz erabiliko edukia ikusten ari den
erabiltzailea erabiltzen ari den hizkuntzarekin bat egiteko. Iragazkia
hizkuntza-blokean zehaztutako hizkuntzetara mugatzen da.</li>
</ul>';
$string['parentlangdefault'] = 'Beti erabili guraso-hizkuntzak, \'en\' izan ezik (portaera tradizionala).';
$string['parentlangnever'] = 'Ez erabili inoiz guraso-hizkuntzak.';
$string['pluginname'] = 'Eduki eleaniztunaren Iragazkia (2.bertsioa)';
$string['privacy:metadata'] = 'Eduki eleaniztunaren Iragazkia (2.bertsioa) pluginak ez du datu pertsonalik biltzen.';
