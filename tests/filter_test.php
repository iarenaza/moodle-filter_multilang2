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
 * Tests for filter_multilang2.
 *
 * Based on unit tests from filter_text, by Damyon Wise.
 *
 * @package    filter_multilang2
 * @category   test
 * @copyright  2014 Damyon Wiese
 * @copyright  2016 Iñaki Arenaza & Mondragon Unibertsitatea
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/filter/multilang2/filter.php');

/**
 * Unit tests for Multi-Language v2 filter.
 *
 * Test that the filter produces the right content depending
 * on the current browsing language.
 *
 * @package    filter_multilang2
 * @category   test
 * @copyright  2014 Damyon Wiese
 * @copyright  2016 Iñaki Arenaza & Mondragon Unibertsitatea
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_multilang2_testcase extends advanced_testcase {

    /** @var object The filter plugin object to perform the tests on */
    protected $filter;

    /**
     * Setup the test framework
     *
     * @return void
     */
    protected function setUp() {
        parent::setUp();
        $this->resetAfterTest(true);
        $this->filter = new filter_multilang2(context_system::instance(), array());
    }

    /**
     * Perform the actual tests, once the unit test is set up.
     *
     * @return void
     */
    public function test_filter_multilang2() {
        global $CFG;

        $tests = array(
            array (
                'filterwithlang' => 'es',
                'before' => 'No multilang tags',
                'after'  => 'No multilang tags',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang es}Todo el texto está en español{mlang}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{MLANG es}Todo el texto está en español{MLANG}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{MLANG ES}Todo el texto está en español{MLANG}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{MlAnG Es}Todo el texto está en español{MlAnG}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => 'Some non-filtered content {mlang es}plus some content in Spanish (mejor dicho, en español){mlang}',
                'after'  => 'Some non-filtered content plus some content in Spanish (mejor dicho, en español)',
            ),
            array (
                'filterwithlang' => 'eu',
                'before' => '{mlang es}Algo en español{mlang}{mlang eu}Zerbait euskeraz{mlang}',
                'after'  => 'Zerbait euskeraz',
            ),
            array (
                'filterwithlang' => 'eu',
                'before' => 'Non-filtered {begin}{mlang es}En español{mlang}{mlang eu}Euskeraz{mlang}Non-filtered{end}',
                'after'  => 'Non-filtered {begin}EuskerazNon-filtered{end}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang}Bad filter syntax{mlang}',
                'after'  => '{mlang}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang-es}Bad filter syntax{mlang}',
                'after'  => '{mlang-es}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang_es}Bad filter syntax{mlang}',
                'after'  => '{mlang_es}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang _es}Este texto está en español{mlang}',
                'after'  => '',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang -es}Este texto está en español{mlang}',
                'after'  => '',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang}Bad filter syntax{mlang}{mlang es}Algo de español{mlang}',
                'after'  => '{mlang}Bad filter syntax{mlang}Algo de español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => 'Before {mlang}Bad filter syntax{mlang}{mlang es}Algo de español{mlang} After',
                'after'  => 'Before {mlang}Bad filter syntax{mlang}Algo de español After',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => 'Before {mlang non-existent-language}Some content{mlang} After',
                'after'  => 'Before  After',
            ),
            array (
                'filterwithlang' => 'en_us',
                'before' => 'Before {mlang en_us}Some content{mlang} After',
                'after'  => 'Before Some content After',
            ),
            array (
                'filterwithlang' => 'en_us',
                'before' => 'Before {mlang en-us}Some content{mlang} After',
                'after'  => 'Before Some content After',
            ),
            array (
                'filterwithlang' => 'en',
                'before' => 'Before {mlang fr}French{mlang}{mlang it}Italian{mlang}{mlang de}Deutsch{mlang} After',
                'after'  => 'Before  After',
            ),
            array (
                'filterwithlang' => 'en',
                'before' => 'Before {mlang fr}Frnçais{mlang}{mlang it}Italiano{mlang}{mlang de}Deutsch{mlang}' .
                            '{mlang other}България{mlang} Middle {mlang other}България{mlang}' .
                            '{mlang it}Italiano{mlang}{mlang de}Deutsch{mlang}{mlang fr}Français{mlang} After',
                'after' => 'Before България Middle България After',
            ),
            array (
                'filterwithlang' => 'en',
                'before' => '{mlang de}Deutsch {mlang}no other language declared',
                'after' => 'no other language declared',
            ),
            array (
                'filterwithlang' => 'en',
                'before' => '{mlang other}Other language{mlang}',
                'after' => 'Other language',
            ),
            array (
                'filterwithlang' => 'en',
                'before' => '{mlang other}Other language{mlang} Middle {mlang de}Deutsch{mlang}{mlang other}Other language{mlang}',
                'after' => 'Other language Middle Other language',
            ),
            array (
                'filterwithlang' => 'fr',
                'before' => '{mlang other}Hello!{mlang}{mlang es,es_mx}¡Hola!{mlang}
                             This text is common for all languages because it is outside of all lang blocks.
                             {mlang other}Bye!{mlang}{mlang it}Ciao!{mlang}',
                'after'  => 'Hello!
                             This text is common for all languages because it is outside of all lang blocks.
                             Bye!',
            ),
            array (
                'filterwithlang' => 'es_mx',
                'before' => '{mlang other}Hello!{mlang}{mlang es,es_mx}¡Hola!{mlang}
                             This text is common for all languages because it is outside of all lang blocks.
                             {mlang other}Bye!{mlang}{mlang it}Ciao!{mlang}',
                'after'  => '¡Hola!
                             This text is common for all languages because it is outside of all lang blocks.
                             ',
            ),
            array (
                'filterwithlang' => 'it',
                'before' => '{mlang other}Hello!{mlang}{mlang es,es_mx}¡Hola!{mlang}
                             This text is common for all languages because it is outside of all lang blocks.
                             {mlang other}Bye!{mlang}{mlang it}Ciao!{mlang}',
                'after'  => '
                             This text is common for all languages because it is outside of all lang blocks.
                             Ciao!',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang en,fr,es}Todo el texto está en español{mlang}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang   en   ,      fr,es    }Todo el texto está en español{mlang}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mLaNg   eN   ,      FR,Es    }Todo el texto está en español{mlang}',
                'after'  => 'Todo el texto está en español',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang   en  ,  ,  ,,,     fr,es,,     ,}Bad filter syntax{mlang}',
                'after'  => '{mlang   en  ,  ,  ,,,     fr,es,,     ,}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang   en   ,}Bad filter syntax{mlang}',
                'after'  => '{mlang   en   ,}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang   en,     }Bad filter syntax{mlang}',
                'after'  => '{mlang   en,     }Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang en  ,   }Bad filter syntax{mlang}',
                'after'  => '{mlang en  ,   }Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang   en,   ,  }Bad filter syntax{mlang}',
                'after'  => '{mlang   en,   ,  }Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang en,,es}Bad filter syntax{mlang}',
                'after'  => '{mlang en,,es}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before'  => '{mlang en  ,,  es  }Bad filter syntax{mlang}',
                'after'  => '{mlang en  ,,  es  }Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before'  => '{mlang en , , es}Bad filter syntax{mlang}',
                'after'  => '{mlang en , , es}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before'  => '{mlang en , , es , }Bad filter syntax{mlang}',
                'after'   => '{mlang en , , es , }Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang en,es,}Bad filter syntax{mlang}',
                'after'  => '{mlang en,es,}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang en , es , }Bad filter syntax{mlang}',
                'after'  => '{mlang en , es , }Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang,es}Bad filter syntax{mlang}',
                'after'  => '{mlang,es}Bad filter syntax{mlang}',
            ),
            array (
                'filterwithlang' => 'es',
                'before' => '{mlang ,es}Bad filter syntax{mlang}',
                'after'  => '{mlang ,es}Bad filter syntax{mlang}',
            ),
        );

        // As we need to switch languages to test the filter, store the current
        // language to restore it at the end the tests.
        $currlang = $CFG->lang;
        foreach ($tests as $test) {
            $CFG->lang = $test['filterwithlang'];
            $this->assertEquals($test['after'], $this->filter->filter($test['before']));
        }
        $CFG->lang = $currlang;
    }
}
