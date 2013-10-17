<?php

class local_generator_controller_default extends mr_controller {
    public function require_capability() {
        /*switch ($this->action) {
            case 'process':
                require_capability('local/joulegrader:grade', $this->get_context());
                break;
            case 'view':
            default:
                if (!has_capability('local/joulegrader:grade', $this->get_context())) {
                    require_capability('local/joulegrader:view', $this->get_context());
                }
        }*/
    }


    /**
     * Controller Initialization
     *
     */
    public function init() {
        global $PAGE;
    }

    /**
     * Main view action
     *
     * @return string - the html for the view action
     */
    public function view_action() {
        global $OUTPUT, $PAGE, $COURSE;
        return 'empty';
    }
}
