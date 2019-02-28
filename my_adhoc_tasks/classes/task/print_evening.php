<?php
namespace local_my_adhoc_tasks\task;

class print_evening extends \core\task\adhoc_task
{
    public function execute() {
        printf('Good evening start at ' . date("h:i:sa"));
        $sleep = mt_rand(1, 10);
        printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), "EVENING", $sleep);
        sleep($sleep);

        /// SETUP - NEED TO BE CHANGED
        $token = 'd861e55b5a5a2e6ee2ce6269ee09362b';
        $domainname = 'http://bluekara.me';
        /// FUNCTION NAME
        $functionname = 'local_rest_hello_world';
        /// PARAMETERS
        $welcomemsg = 'Hello, ';
        $serverurl = $domainname . '/webservice/xmlrpc/server.php'. '?wstoken=' . $token;
        $curl = new \local_my_adhoc_tasks\client\curl;
        $post = xmlrpc_encode_request($functionname, array($welcomemsg));
        $resp = xmlrpc_decode($curl->post($serverurl, $post));

        printf('Good evening end at ' . date("h:i:sa"));
    }
}