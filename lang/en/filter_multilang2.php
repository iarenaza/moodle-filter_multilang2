<?php
// This file is part of filter_multilang2 - https://moodle.org/
//
// filter_multilang2 is free software: you can redistribute it and/or
// modify it under the terms of the GNU General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// filter_multilang2 is distributed in the hope that it will be
// useful, but WITHOUT ANY WARRANTY; without even the implied warranty
// of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with filter_multilang2.  If not, see <https://www.gnu.org/licenses/>.

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
$string['parentlangalwaysen'] = 'Always use parent languages, including \'en\'.';
$string['parentlangbehaviour'] = 'Parent languages behaviour';
$string['parentlangbehaviour_desc'] = '
<p>
  In the descriptions below, "the user\'s active language" refers to
  the language that the user has configured as the active browsing
  language at a given moment. It can be the language that the user
  has configured in his or her profile, or the language that the
  user has temporarily set by choosing a different browsing language
  from Moodle\'s language menu.
</p>
<p>
  The descriptions below also use the term "language block". A
  language block is any content starting with a <code>{mlang
  XX}</code> tag (or <code>{mlang XX, YY, ZZ}</code>, etc.), and
  ending with a <code>{mlang}</code> tag.
</p>
<p>
  The filter determines whether a text in a language block should be
  displayed, or not, based on the language(s) specified in the
  language block, and the user\'s active language. This matching
  process can follow different approaches, known as "<em>parent
  languages behaviour</em>". There are three possible behaviours:
</p>
<ol>
  <li>
    <p>
      <b>Always use parent languages, excluding \'en\'.</b>
    </p>
    <p>
      This is the default setting, and the way the filter
      traditionally worked before. The filter takes the user\'s active
      language (e.g., \'<code>en_us_kids12</code>\') and computes its
      parent languages list. When computing the parent languages list,
      \'<code>en</code>\' is never included in that list.
    </p>
    <p>
      E.g, for \'<code>en_us_kids12</code>\', the parent languages
      list would only include \'<code>en_us</code>\', even if
      \'<code>en</code>\' is the parent language of
      \'<code>en_us</code>\'. Because \'<code>en</code>\' is always
      excluded from the parent languages list in this case. But if the
      user\'s active language was \'<code>fr_ca_kids12</code>\', the
      parent languages list would include \'<code>fr_ca</code>\' and
      \'<code>fr</code>\'.
    </p>
    <p>
      The filter then checks if any of the languages specified in the
      language block match either the user\'s active language, or any
      of the languages in the parent languages list. If any match is
      found, the language block is displayed. If no match is found,
      the language block is not displayed.
    </p>
    <p>
      <b>Example 1</b>: If the user\'s active language is
      \'<code>en_us_kids12</code>\', the parent languages list will
      include \'<code>en_us</code>\' only (as stated above). Thus, a
      language block like <code>{mlang en_us_kids12}Some content in
      en_us_kids12{mlang}</code> will be displayed. And so will a
      language block like <code>{mlang en_us}Some content in
      eu_us{mlang}</code>. But a language block like <code>{mlang
      en}Some content in en{mlang}</code> will not be displayed.
      Because \'<code>en</code>\' is excluded from the parent
      languages list, and thus it will neither match the user\'s
      active language, nor any language in parent languages list.
    </p>
    <p>
      <b>Example 2</b>: If the user\'s active language is
      \'<code>fr_ca_kids12</code>\', the parent languages list will
      include \'<code>fr_ca</code>\' and \'<code>fr</code>\'. Thus, a
      language block like <code>{mlang fr_ca_kids12}Some content in
      fr_ca_kids12{mlang}</code> will be displayed. And so will a
      language block like <code>{mlang fr_ca}Some content in
      fr_ca{mlang}</code>, and a language block like <code>{mlang
      fr}Some content in fr{mlang}</code>.
    </p>
    <p>
      <b>Note</b>: English can still be used explicitly in the
      language block. But the text of that language block will only be
      displayed when the user\'s active language is exactly
      \'<code>en</code>\'.
    </p>
  </li>
  <li>
    <p>
      <b>Always use parent languages, including \'en\'.</b>
    </p>
    <p>
      This setting works like the previous one, but it does not
      exclude the \'<code>en</code>\' language from the list of valid
      parent languages of the user\'s active language.
    </p>
    <p>
      <b>Example 1</b>: If the user\'s active language is
      \'<code>en_us_kids12</code>\', the parent languages list will
      include \'<code>en_us</code>\' and \'<code>en</code>\' (as in
      this case \'<code>en</code>\' will not be excluded from the list
      of valid parent languages). Thus, a language block
      like <code>{mlang en_us_kids12}Some content in
      en_us_kids12{mlang}</code> will be displayed. And so will
      language blocks like <code>{mlang en_us}Some content in
      en_us{mlang}</code> or <code>{mlang en}Some content in
      en{mlang}</code>.
    </p>
    <p>
      <b>Example 2</b>: If the user\'s active language is
      \'<code>fr_ca_kids12</code>\', the parent languages list will
      include \'<code>fr_ca</code>\' and \'<code>fr</code>\'. Thus, a
      language block like <code>{mlang fr_ca_kids12}Some content in
      fr_ca_kids12{mlang}</code> will be displayed. And so will
      language blocks like <code>{mlang fr_ca}Some content in
      fr_ca{mlang}</code> or <code>{mlang fr}Some content in
      fr{mlang}</code>. But a language block like <code>{mlang en}Some
      content in en{mlang}</code> will <b>not</b> be
      displayed. Because in this case, the \'<code>en</code>\'
      language is not a parent language of
      \'<code>fr_ca_kids12</code>\' (only \'<code>fr_ca</code>\' and
      \'<code>fr</code>\' are).
    </p>
  </li>
  <li>
    <p>
      <b>Never use parent languages.</b>
    </p>
    <p>
      As the name suggests, no parent languages are ever used. The
      filter only tries to match the language(s) listed in the
      language block to the user\'s current language, without
      considering any parent languages at all.
    </p>
    <p>
      <b>Example</b>: If the user\'s active language is
      \'<code>fr_ca_kids12</code>\', a language block
      like <code>{mlang fr_ca_kids12}Some content in
      fr_ca_kids12{mlang}</code> will be displayed. But language
      blocks like <code>{mlang fr_ca}Some content in
      fr_ca{mlang}</code> or <code>{mlang fr}Some content in
      fr{mlang}</code> will not be displayed.
    </p>
  </li>
</ol>';
$string['parentlangdefault'] = 'Always use parent languages, excluding \'en\' (traditional behaviour).';
$string['parentlangnever'] = 'Never use parent languages.';
$string['pluginname'] = 'Multi-Language Content (v2) Filter';
$string['privacy:metadata'] = 'The Multi-Language Content (v2) Filter plugin does not store any personal data.';
