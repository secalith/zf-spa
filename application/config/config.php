<?php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'data/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Zend\I18n\ConfigProvider::class,
    \Zend\Form\ConfigProvider::class,
    \Zend\InputFilter\ConfigProvider::class,
    \Zend\Session\ConfigProvider::class,
    \Zend\Paginator\ConfigProvider::class,
    \Zend\Filter\ConfigProvider::class,
    \Navigation\ConfigProvider::class,
    \Zend\Hydrator\ConfigProvider::class,
    \Zend\Db\ConfigProvider::class,
    \Zend\Router\ConfigProvider::class,
    \Zend\Validator\ConfigProvider::class,
    // Include cache configuration
    new ArrayProvider($cacheConfig),

    // Default App module config
    App\ConfigProvider::class,
    Common\ConfigProvider::class,
    Route\ConfigProvider::class,
    Page\ConfigProvider::class,
    Template\ConfigProvider::class,
    Area\ConfigProvider::class,
    Block\ConfigProvider::class,
    Content\ConfigProvider::class,
    Form\ConfigProvider::class,
    Auth\ConfigProvider::class,
    User\ConfigProvider::class,
    View\ConfigProvider::class,
    TableData\ConfigProvider::class,
    Messenger\ConfigProvider::class,
//    Navigation\ConfigProvider::class,

    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),

    // Load development config if it exists
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
