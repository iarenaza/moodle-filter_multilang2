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

namespace filter_multilang2;

/**
 * Class callbacks
 *
 * @package    filter_multilang2
 * @copyright  2025 Mohammad Farouk <phun.for.physics@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class callbacks {

    /**
     * Inject js if the filter is enabled to filter contents using ajax.
     * @param \core\hook\output\before_footer_html_generation $hook
     * @return void
     */
    public static function apply_client_filter(\core\hook\output\before_footer_html_generation $hook) {
        global $PAGE;
        $enabled = filter_is_enabled('multilang2') && !empty(get_config('filter_multilang2', 'clientfilter'));
        if ($enabled) {
            $PAGE->requires->js_call_amd('filter_multilang2/filter', 'init');
        }
    }
}
