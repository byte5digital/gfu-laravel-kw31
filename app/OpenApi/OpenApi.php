<?php

namespace App\OpenApi;

use OpenApi\Attributes\Info;

#[Info(
    title: 'GFU Test API',
    version: '0.0.1'
)]
#[OA\Server(url: 'http://localhost:{port}', description: 'Localhost DEMO Server', variables: [
    new OA\ServerVariable(serverVariable: 'port', default: '80', enum: ['80', '4000', '8000', '8080']),
])]
class OpenApi
{
}
