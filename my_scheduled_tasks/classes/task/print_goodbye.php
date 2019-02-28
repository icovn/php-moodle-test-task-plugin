<?php
namespace local_my_scheduled_tasks\task;

class print_goodbye extends \core\task\scheduled_task
{
    public function get_name() {
        return get_string('print_goodbye', 'local_my_scheduled_tasks');
    }

    public function execute() {
        printf('Goodbye start at ' . date("h:i:sa") . "\n");
        $sleep = mt_rand(1, 10);
        printf('Goodbye sleeps: %d' . date("g:i:sa") . "\n", $sleep);
        sleep($sleep);
        printf('Goodbye end at ' . date("h:i:sa") . "\n");
    }
}