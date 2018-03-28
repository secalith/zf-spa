<?php

namespace Messenger;

use Common\ConfigProvider as CommonConfigProvider;
/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider extends CommonConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'application' => $this->getApplicationConfig(),
        ];
    }

    public function getDependencies()
    {
        return [
            'factories'  => [
                \Messenger\Action\ChatStatusAction::class => Action\ChatStatusFactory::class,
                \Messenger\Action\ChatCreateAction::class => Action\ChatCreateFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'messenger'    => [__DIR__ . '/../templates/messenger'],
            ],
        ];
    }

    public function getApplicationConfig()
    {
        return [
            'module' => [
                'route' => [
                    'message' => [
                        'database' => [
                            'db' => [
                                'table' => 'messages',
                            ],
                        ],
                        'gateway' => [
                            "adapter" => "Application\Db\LocalAdapter",
//                                "adapter" => "Application\Db\DatabaseAdapter",
                            'service' => ["name"=>"Message\\Gateway",],
                            'hydrator' => [
                                "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                "map" => [
                                    "uid" => "uid",
                                    "email" => "email",
                                    "full_name" => "full_name",
                                    "password" => "password",
                                    "status" => "status",
                                    "date_created" => "date_created",
                                    "pwd_reset_token" => "pwd_reset_token",
                                    "pwd_reset_token_creation_date" => "pwd_reset_token_creation_date",
                                ],
                            ],
                        ], // gateway
                    ], // message
                ], // route
                'form' => [
                    'message.chat.create' => [
                        'post' => [
                            [
                                'name' => 'message_chat_create',
                                'fdqn' => \Message\Form\CreateChatForm::class,
                            ],
                        ],
                    ],
                ], // form
            ], // module
        ];
    }

}
