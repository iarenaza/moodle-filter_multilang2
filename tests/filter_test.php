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
 * Based on unit tests from filter_multilang, by The Open University
 *
 * @package    filter_multilang2
 * @category   test
 * @copyright  2014 onwards Damyon Wiese
 * @copyright  2016 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @copyright  2019 onwards The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace filter_multilang2;

use filter_multilang2;

/**
 * Unit tests for Multi-Language v2 filter.
 *
 * Test that the filter produces the right content depending
 * on the current browsing language.
 *
 * @package    filter_multilang2
 * @category   test
 * @covers     \filter_multilang2
 */
class filter_test extends \advanced_testcase {

    /**
     * Setup the test framework
     *
     * @return void
     */
    protected function setUp():void {
        parent::setUp();

        $this->resetAfterTest(true);

        // Enable multilang2 filter at top level.
        filter_set_global_state('multilang2', TEXTFILTER_ON);
    }

    /**
     * Setup parent language relationship.
     *
     * @param string $child the child language, e.g. 'fr_ca'.
     * @param string $parent the parent language, e.g. 'fr'.
     */
    protected function setup_parent_language(string $child, string $parent) {
        global $CFG;

        $langfolder = $CFG->dataroot . '/lang/' . $child;
        check_dir_exists($langfolder);
        $langconfig = "<?php\n\$string['parentlanguage'] = '$parent';";
        file_put_contents($langfolder . '/langconfig.php', $langconfig);
    }

    /**
     * Data provider for multi-language filtering tests.
     */
    public function multilang2_test_cases() {
        require_once(dirname(__FILE__) . '/actual_test_cases.php');
        return multilang2_actual_test_cases();
    }

    /**
     * Tests the filtering of multi-language strings.
     *
     * @dataProvider multilang2_test_cases
     *
     * @param string $expectedoutput The expected filter output.
     * @param string $input the input that is filtererd.
     * @param string $targetlang the laguage to set as the current languge .
     * @param array $parentlangs Array child lang => parent lang. E.g. ['es_co' => 'es', 'es_mx' => 'es'].
     */
    public function test_filtering($expectedoutput, $input, $targetlang, $parentlangs = []) {
        global $SESSION;
        $SESSION->forcelang = $targetlang;

        foreach ($parentlangs as $child => $parent) {
            $this->setup_parent_language($child, $parent);
        }

        $filtered = format_text($input, FORMAT_HTML, array('context' => \context_system::instance()));
        $this->assertEquals($expectedoutput, $filtered);
    }
}
