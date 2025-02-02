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

namespace filter_multilang2\external;

use core\context;
use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use core_external\external_multiple_structure;
use filter_multilang2\text_filter;

/**
 * Class filter
 *
 * @package    filter_multilang2
 * @copyright  2025 Mohammad Farouk <phun.for.physics@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter extends external_api {
    /**
     * Parameters external descriptions for ::filter_content
     * @return external_function_parameters
     */
    public static function filter_content_parameters(): external_function_parameters {
        return new external_function_parameters([
            'data' => new external_multiple_structure(
                new external_value(PARAM_RAW, 'somedata to be filtered')
            ),
            'contextid' => new external_value(PARAM_INT),
        ]);
    }
    /**
     * Filter the array of data passed to the function
     * @param array $data
     * @param int $contextid
     * @return string[]
     */
    public static function filter_content($data, $contextid): array {
        $params = self::validate_parameters(self::filter_content_parameters(), compact('data', 'contextid'));
        $context = context::instance_by_id($contextid, MUST_EXIST);
        self::validate_context($context);
        $filter = new text_filter();
        $data = array_map(function($text)use($filter): string {
            if (clean_param($text, PARAM_TEXT) != $text) {
                return $text;
            }
            return $filter->filter($text);
        }, $params['data']);
        return $data;
    }
    /**
     * Description of return types of ::filter_content
     * @return external_multiple_structure
     */
    public static function filter_content_returns(): external_multiple_structure {
        return new external_multiple_structure(
            new external_value(PARAM_TEXT, 'filtered data')
            );
    }
}
