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
$string['parentlangbehaviour'] = 'Guraso-hizkuntzen portaera';
$string['parentlangbehaviour_desc'] = '
<p>
  Iragazkia hizkuntza-bloke bat bistaratu behar den ala ez
  erabakitzeko blokean zehaztutako hizkuntzetan eta erabiltzailea
  erabiltzen ari den hizkuntzan (hemendik aurrera, "erabiltzailearen
  hizkuntza") oinarritzen da. Bat-etortze hau hiru era ezberdinetan
  egin daiteke. Iragazkiak hiru era horiei <em>guraso-hizkuntzen
  portaera</em> deitzen die:
</p>
<ol>
  <li>
    <b>Beti erabili guraso-hizkuntzak, \'en\' izan ezik.</b>
    <ul>
      <li>
        <em>Hau da pluginare portaera tradizionala</em>. Iragazkiak
        hizkuntza-blokean zehaztutako hizkuntzak <code>{mlang...}</code>,
        eta hizkuntza horien guraso-hizkuntza guztiak (erro
        hizkuntzara arte, <code>en</code> sartu gabe), erabiltzen
        ditu.
      </li>
      <li>
        Adibidez, hizkuntza-bloke batek <code>{mlang en_us_k12}...
        {mlang}</code> zehazten badu, hizkuntza-bloke hori bakarrik
        bistaratuko da erabiltzailearen hizkuntza <code>en_us_k12</code>
        edo <code>en_us</code> bada, baina ez <code>en</code> bada.
      <li>
        Oharra: Ingeles hizkuntza (<code>en</code>) erabiltzea beti
        posible da, baldin eta hura hizkuntza blokean esplizituki
        aipatzen bada. Adibidez, hizkuntza-bloke batek <code>{mlang
        en}This text will be shown when the user’s current language is
        \'en\'.{mlang}</code> zehazten badu, hizkuntza-bloke hori
        bistaratuko da erabiltzailearen hizkuntza <code>en</code>
        denean.</li>
    </ul>
  </li>
  <li>
    <b>Beti erabili guraso-hizkuntzak, \'en\' barne </b>
    <ul>
      <li>
        Ezarpen honek aurrekoaren bezala funtzionatzen du, baina
        baliozko guraso-hizkuntza gisa <code>en</code> erroa barne
        hartzen du.
      </li>
      <li>
        Adibidez, hizkuntza-bloke batek <code>{mlang en_us_k12}...
        {mlang}</code> zehazten badu, hizkuntza-bloke hori bistaratuko
        da erabiltzailearen hizkuntza <code>en_us_k12</code>,
        <code>en_us</code> edo <code>en</code> bada.
    </ul>
  </li>
  <li>
    <b>Ez erabili inoiz guraso-hizkuntzak.</b>
    <ul>
      <li>
        Izenak dioen bezala, guraso-hizkuntzak ez dira inoiz
        erabiliko. Iragazkia hizkuntza-blokean esplizituki zehaztutako
        hizkuntzetara mugatzen da, eta ez du inoiz guraso-hizkuntzarik
        kontuan hartzen.
      </li>
      <li>
        Adibidez, hizkuntza-bloke batek <code>{mlang en_us_k12}...
        {mlang}</code> zehazten badu, hizkuntza-bloke hori bakarrik
        bistaratuko da erabiltzailearen hizkuntza <code>en_us_k12</code>
        bada, baina ez <code>en_us</code> edo <code>en</code> bada.
      </li>
    </ul>
  </li>
</ol>';
$string['parentlangdefault'] = 'Beti erabili guraso-hizkuntzak, \'en\' izan ezik (portaera tradizionala).';
$string['parentlangnever'] = 'Ez erabili inoiz guraso-hizkuntzak.';
$string['pluginname'] = 'Eduki eleaniztunaren Iragazkia (2.bertsioa)';
$string['privacy:metadata'] = 'Eduki eleaniztunaren Iragazkia (2.bertsioa) pluginak ez du datu pertsonalik biltzen.';
