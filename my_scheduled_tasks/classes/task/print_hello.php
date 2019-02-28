<?php
namespace local_my_scheduled_tasks\task;

class print_hello extends \core\task\scheduled_task
{
    public function get_name() {
        return get_string('print_hello', 'local_my_scheduled_tasks');
    }

    public function execute() {
        printf('Hello start at ' . date("h:i:sa"));
        $sleep = mt_rand(1, 10);
        printf('Hello sleeps: %d' . date("g:i:sa") . "\n", $sleep);
        sleep($sleep);
        printf('Hello end at ' . date("h:i:sa"));
    }
}