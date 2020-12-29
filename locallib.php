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
 * This file contains the definition for the library class for teamwork submission plugin
 *
 * This class provides all the functionality for the new assign module.
 *
 * @package assignsubmission_teamwork
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * library class for teamwork submission plugin extending submission plugin base class
 *
 * @package assignsubmission_teamwork
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class assign_submission_teamwork extends assign_submission_plugin {

    /**
     * Get the name of the online text submission plugin
     *
     * @return string
     */
    public function get_name() {
        return get_string('pluginname', 'assignsubmission_teamwork');
    }

    /**
     * Display teamwork word count in the submission status table
     *
     * @param stdClass $submission
     * @param bool $showviewlink - If the summary has been truncated set this to true
     * @return string
     */
    public function view_summary(stdClass $submission, &$showviewlink) {
        return \local_teamwork\common::get_user_team($this->assignment->get_context()->instanceid, $submission->userid);
    }

    public function is_enabled() {
        return $this->get_config('enabled') && $this->is_configurable();
    }
    
}


