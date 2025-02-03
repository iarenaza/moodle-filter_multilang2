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
 * TODO describe module filter
 *
 * @module     filter_multilang2/filter
 * @copyright  2025 Mohammad Farouk <phun.for.physics@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import $ from 'jquery';
import Ajax from 'core/ajax';
import {eventTypes, notifyFilterContentRenderingComplete} from 'core_filters/events';

let elements = [];
let data = [];
let onRequest = false;
let queue = [];
let retryInterval;

/**
 * Queue filter event.
 * @param {CustomEvent} event
 */
function queueFilter(event = null) {
    queue.push({
        event: event,
        done: false,
    });
    runInterval();
}

/**
 * Rerun the interval to check for new data.
 */
function runInterval() {
    clearInterval(retryInterval);
    retryInterval = setInterval(processQueue, 500);
}

/**
 * Process the queue of filter requests.
 * @returns {void}
 */
function processQueue() {
    clearInterval(retryInterval);
    if (queue.length == 0) {
        return;
    }

    if (onRequest) {
        runInterval();
        return;
    }

    let item;
    for (let i = 0; i < queue.length; i++) {
        item = queue[i];
        if (item.done) {
            queue.splice(i, 1);
            continue;
        }

        if (item.event) {
            break;
        }

        item = null;
    }
    if (item) {
        runInterval();
        filter(item.event);
    }
}

/**
 * Process filtering.
 * @param {CustomEvent} event
 */
async function filter(event) {
    if (onRequest) {
        queueFilter(event);
        return;
    }

    onRequest = true;
    let contextid = M.cfg.contextid;
    let selector;
    if (event && event.originalEvent && event.originalEvent.detail.nodes) {
        selector = event.originalEvent.detail.nodes;
    } else {
        selector = ['body'];
    }

    $.each(selector, function(index, element) {
        // Get the element and its siblings.
        // Modal not including footer and header in the event.
        $(element).parent().children()
                  .find('*')
                  // Exclude some tricky.
                  .not('script, link, noscript, iframe, embed, input, head')
                  .each(function() {

            let current = $(this);
            if (current.children().length == 0 && current.text().toLowerCase().includes('mlang')) {
                elements.push(this);
                data.push(current.text());
            }
        });
    });

    let requests = Ajax.call([
        {
            methodname: 'filter_multilang2',
            args: {
                contextid: contextid,
                data: data,
                loginrequired: false,
            }
        }
    ]);

    let response = await requests[0];
    elements.forEach((element, index) => {
        $(element).text(response[index]);
    });

    // Trigger events of what elements changed.
    notifyFilterContentRenderingComplete(elements);

    elements = [];
    data = [];
    onRequest = false;
}

export const init = function() {
    // Wait for the page to fully loaded.
    $(filter);

    // Apply the filter again if content changed.
    $(document).on(eventTypes.filterContentUpdated, filter);
};