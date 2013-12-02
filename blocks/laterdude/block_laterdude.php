<?php

class block_laterdude extends block_base {
    const PLACEHOLDERID = 'block_laterdude_placeholder';

    public function init() {
        $this->title = get_string('pluginname', __CLASS__);
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        if (has_capability('block/laterdude:view', context_system::instance())) {
            global $PAGE;
            $params = array('id' => self::PLACEHOLDERID);
            $PAGE->requires->yui_module('moodle-block_laterdude-later',
                                        'M.block_laterdude.later.init',
                                        array($params),
                                        null,
                                        true);
            $this->content->text = html_writer::empty_tag('div', $params);
        }

        return $this->content;
    }
}
