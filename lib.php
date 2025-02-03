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
 * Callback implementations for Multi-Language Content (v2)
 *
 * @package    filter_multilang2
 * @copyright  2025 Mohammad Farouk <phun.for.physics@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Legacy callbacks for < 4.5
 * @return string
 */
function filter_multilang2_before_footer() {
    global $PAGE;
    $enabled = filter_is_enabled('multilang2') && !empty(get_config('filter_multilang2', 'clientfilter'));
    if ($enabled) {
        $PAGE->requires->js_call_amd('filter_multilang2/filter', 'init');
    }
    return '';
}