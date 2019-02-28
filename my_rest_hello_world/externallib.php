<?php
require_once($CFG->libdir . "/externallib.php");

class local_my_rest_hello_world extends external_api {
    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function hello_world_parameters() {
        return new external_function_parameters(
            array('welcomemessage' => new external_value(PARAM_TEXT, 'The welcome message. By default it is "Hello world,"', VALUE_DEFAULT, 'Hello world, '))
        );
    }
    /**
     * Returns welcome message
     * @return string welcome message
     */
    public static function hello_world($welcomemessage = 'Hello world, ') {
        global $USER;
        //Parameter validation
        //REQUIRED
        $params = self::validate_parameters(self::hello_world_parameters(),
            array('welcomemessage' => $welcomemessage));
        //Context validation
        //OPTIONAL but in most web service it should present
        $context = get_context_instance(CONTEXT_USER, $USER->id);
        self::validate_context($context);
        //Capability checking
        //OPTIONAL but in most web service it should present
        if (!has_capability('moodle/user:viewdetails', $context)) {
            throw new moodle_exception('cannotviewprofile');
        }


        // create the instance
        $print_evening = new \local_my_adhoc_tasks\task\print_evening();
        // set blocking if required (it probably isn't)
        // $domination->set_blocking(true);
        // add custom data
        $print_evening->set_custom_data(array(
            'data_key' => 'data value'
        ));
        // queue it
        \core\task\manager::queue_adhoc_task($print_evening);
        for ($x = 0; $x <= 10; $x++) {
            $print_morning = new \local_my_adhoc_tasks\task\print_morning();
            \core\task\manager::queue_adhoc_task($print_morning);
        }

        return $params['welcomemessage'] . $USER->firstname . 'OK';
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function hello_world_returns() {
        return new external_value(PARAM_TEXT, 'The welcome message + user first name');
    }
}