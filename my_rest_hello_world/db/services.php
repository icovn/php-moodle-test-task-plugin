<?php
// We defined the web service functions to install.
$functions = array(
    'local_rest_hello_world' => array(
        'classname'   => 'local_my_rest_hello_world',
        'methodname'  => 'hello_world',
        'classpath'   => 'local/my_rest_hello_world/externallib.php',
        'description' => 'Return Hello World FIRSTNAME. Can change the text (Hello World) sending a new text as parameter',
        'type'        => 'read',
    )
);
// We define the services to install as pre-build services. A pre-build service is not editable by administrator.
$services = array(
    'My service' => array(
        'functions' => array ('local_rest_hello_world'),
        'restrictedusers' => 0,
        'enabled'=>1,
    )
);