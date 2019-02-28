<?php
namespace local_my_adhoc_tasks\task;

class print_morning extends \core\task\adhoc_task
{
    public function execute() {
        printf('Good morning start at ' . date("h:i:sa"));
        $sleep = mt_rand(1, 10);
        printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), "MORNING", $sleep);
        sleep($sleep);
        printf('Good morning end at ' . date("h:i:sa"));
    }
}