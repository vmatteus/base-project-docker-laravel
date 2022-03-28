<?php
/** For documentation, see https://github.com/needle-project/laravel-rabbitmq */
return [
    'connections' => [
        'connectionA' => [
            'hostname' => '172.18.0.1',
            'port'     => '5672',
            'username' => 'rabbitmq',
            'password' => 'rabbitmq',
        ],
    ],
    'exchanges' => [
        'exchangeA' => [
            'connection' => 'connectionA',
			'name' => 'amq.direct',
			'attributes' => [
				'exchange_type' => 'topic'
			]
        ]
	],
    'queues' => [
        'queueB' => [
            'connection' => 'connectionA',
            'name' => 'queueB',
			'attributes' => [
				'bind' => [
                    ['exchange' => 'foo_bar', 'routing_key' => '*']
                ]
			]
        ]
    ],
    'publishers' => [
        'aPublisherName' => 'exchangeA'
    ],
    'consumers' => [
        'aConsumerName' => [
            'queue' => 'queueB',
            'message_processor' => \App\Services\CliOutputProcessor::class
        ]
    ]
];
