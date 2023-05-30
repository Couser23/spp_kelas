<?php
require 'vendor/autoload.php';

use GreenApi\RestApi\GreenApiClient;

define( "ID_INSTANCE", "1101808025" );
define( "API_TOKEN_INSTANCE", "166719f431a34b698c6ef26b70737489e3df3b8184c94562bc" );

$greenApi = new GreenApiClient( ID_INSTANCE, API_TOKEN_INSTANCE );

$result = $greenApi->sending->sendFileByUrl(
        '62895702118992@c.us', 'https://www.google.ru/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
        'googlelogo_color_272x92dp.png', 'P');

print_r(  $result->data );