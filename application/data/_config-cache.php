<?php
/**
 * This configuration cache file was generated by Zend\ConfigAggregator\ConfigAggregator
 * at 2018-02-19T17:51:06+00:00
 */
return array (
  'dependencies' => 
  array (
    'aliases' => 
    array (
      'HydratorManager' => 'Zend\\Hydrator\\HydratorPluginManager',
      'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterInterface',
      'HttpRouter' => 'Zend\\Router\\Http\\TreeRouteStack',
      'router' => 'Zend\\Router\\RouteStackInterface',
      'Router' => 'Zend\\Router\\RouteStackInterface',
      'RoutePluginManager' => 'Zend\\Router\\RoutePluginManager',
      'ValidatorManager' => 'Zend\\Validator\\ValidatorPluginManager',
      'Zend\\Expressive\\Delegate\\DefaultDelegate' => 'Zend\\Expressive\\Delegate\\NotFoundDelegate',
    ),
    'factories' => 
    array (
      'Zend\\Hydrator\\HydratorPluginManager' => 'Zend\\Hydrator\\HydratorPluginManagerFactory',
      'Zend\\Db\\Adapter\\AdapterInterface' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
      'Zend\\Router\\Http\\TreeRouteStack' => 'Zend\\Router\\Http\\HttpRouterFactory',
      'Zend\\Router\\RoutePluginManager' => 'Zend\\Router\\RoutePluginManagerFactory',
      'Zend\\Router\\RouteStackInterface' => 'Zend\\Router\\RouterFactory',
      'Zend\\Validator\\ValidatorPluginManager' => 'Zend\\Validator\\ValidatorPluginManagerFactory',
      'App\\Action\\HomePageAction' => 'App\\Action\\HomePageFactory',
      'Common\\Helper\\RouteHelper' => 'Common\\Helper\\RouteHelperFactory',
      'Common\\Helper\\RouteHelperMiddleware' => 'Common\\Helper\\RouteHelperMiddlewareFactory',
      'Route\\Table' => 'Route\\Service\\Factory\\RouteTableServiceFactory',
      'Route\\Gateway' => 'Route\\Service\\Factory\\RouteTableGatewayFactory',
      'Route\\Service' => 'Route\\Service\\Factory\\RouteServiceFactory',
      'Route\\Routes\\Table' => 'Route\\Service\\Factory\\RouteRoutesTableServiceFactory',
      'Route\\Routes\\Gateway' => 'Route\\Service\\Factory\\RouteRoutesTableGatewayFactory',
      'Route\\Routes\\Service' => 'Route\\Service\\Factory\\RouteRoutesServiceFactory',
      'Page\\Table' => 'Page\\Service\\Factory\\PageTableServiceFactory',
      'Page\\Gateway' => 'Page\\Service\\Factory\\PageTableGatewayFactory',
      'Page\\Service' => 'Page\\Service\\Factory\\PageServiceFactory',
      'Template\\Table' => 'Template\\Service\\Factory\\TemplateTableServiceFactory',
      'Template\\Gateway' => 'Template\\Service\\Factory\\TemplateTableGatewayFactory',
      'Area\\Table' => 'Area\\Service\\Factory\\AreaTableServiceFactory',
      'Area\\Gateway' => 'Area\\Service\\Factory\\AreaTableGatewayFactory',
      'Block\\Table' => 'Block\\Service\\Factory\\BlockTableServiceFactory',
      'Block\\Gateway' => 'Block\\Service\\Factory\\BlockTableGatewayFactory',
      'Content\\Table' => 'Content\\Service\\Factory\\ContentTableServiceFactory',
      'Content\\Gateway' => 'Content\\Service\\Factory\\ContentTableGatewayFactory',
      'Zend\\Expressive\\Application' => 'Zend\\Expressive\\Container\\ApplicationFactory',
      'Zend\\Expressive\\Delegate\\NotFoundDelegate' => 'Zend\\Expressive\\Container\\NotFoundDelegateFactory',
      'Zend\\Expressive\\Helper\\ServerUrlMiddleware' => 'Zend\\Expressive\\Helper\\ServerUrlMiddlewareFactory',
      'Zend\\Expressive\\Helper\\UrlHelper' => 'Zend\\Expressive\\Helper\\UrlHelperFactory',
      'Zend\\Expressive\\Helper\\UrlHelperMiddleware' => 'Zend\\Expressive\\Helper\\UrlHelperMiddlewareFactory',
      'Zend\\Stratigility\\Middleware\\ErrorHandler' => 'Zend\\Expressive\\Container\\ErrorHandlerFactory',
      'Zend\\Expressive\\Middleware\\ErrorResponseGenerator' => 'Zend\\Expressive\\Container\\ErrorResponseGeneratorFactory',
      'Zend\\Expressive\\Middleware\\NotFoundHandler' => 'Zend\\Expressive\\Container\\NotFoundHandlerFactory',
      'Zend\\Expressive\\Template\\TemplateRendererInterface' => 'Zend\\Expressive\\ZendView\\ZendViewRendererFactory',
      'Zend\\View\\HelperPluginManager' => 'Zend\\Expressive\\ZendView\\HelperPluginManagerFactory',
    ),
    'abstract_factories' => 
    array (
      0 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
      1 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
    ),
    'invokables' => 
    array (
      'App\\Action\\PingAction' => 'App\\Action\\PingAction',
      'Zend\\Expressive\\Helper\\ServerUrlHelper' => 'Zend\\Expressive\\Helper\\ServerUrlHelper',
      'Zend\\Expressive\\Router\\RouterInterface' => 'Zend\\Expressive\\Router\\ZendRouter',
    ),
    'delegators' => 
    array (
      'Zend\\Expressive\\Application' => 
      array (
        0 => 'Common\\Application\\Factory\\PipelineAndRoutesDelegator',
      ),
    ),
  ),
  'route_manager' => 
  array (
  ),
  'config_cache_path' => 'data/config-cache.php',
  'templates' => 
  array (
    'paths' => 
    array (
      'app' => 
      array (
        0 => '/var/www/spa/application/src/App/src/../templates/app',
      ),
      'error' => 
      array (
        0 => '/var/www/spa/application/src/App/src/../templates/error',
      ),
      'layout' => 
      array (
        0 => '/var/www/spa/application/src/App/src/../templates/layout',
      ),
    ),
    'layout' => 'layout::default',
  ),
  'routes' => 
  array (
    0 => 
    array (
      'name' => 'books',
      'path' => '/api/books',
      'middleware' => 'App\\Action\\HomePageAction',
      'allowed_methods' => 
      array (
        0 => 'GET',
      ),
    ),
  ),
  'view_helpers' => 
  array (
    'invokables' => 
    array (
      'openTag' => 'Common\\View\\Helper\\OpenTagHelper',
      'closeTag' => 'Common\\View\\Helper\\CloseTagHelper',
      'displayArea' => 'Common\\View\\Helper\\AreaHelper',
      'displayBlock' => 'Common\\View\\Helper\\BlockHelper',
      'displayContent' => 'Common\\View\\Helper\\ContentHelper',
    ),
  ),
  'application' => 
  array (
    'module' => 
    array (
      'route' => 
      array (
        'route' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'route',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Route\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'routeName' => 'route_name',
                'uid' => 'uid',
              ),
            ),
          ),
        ),
        'route_routes' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'route_routes',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Route\\Routes\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'routeName' => 'route_name',
                'uid' => 'uid',
              ),
            ),
          ),
        ),
        'page' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'page',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Page\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'uid' => 'uid',
                'name' => 'name',
                'template' => 'template',
                'route' => 'route',
                'pageCache' => 'page_cache',
                'constraints' => 'constraints',
              ),
            ),
          ),
        ),
        'template' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'template',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Template\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'routeName' => 'route_name',
                'uid' => 'uid',
              ),
            ),
          ),
        ),
        'area' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'area',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Area\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'uid' => 'uid',
                'template' => 'uid',
                'machineName' => 'machine_name',
                'attributes' => 'attributes',
                'parameters' => 'parameters',
                'options' => 'options',
                'scope' => 'scope',
              ),
            ),
          ),
        ),
        'block' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'block',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Block\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'uid' => 'uid',
                'area' => 'area',
                'type' => 'type',
                'template' => 'template',
                'content' => 'content',
                'attributes' => 'attributes',
                'parameters' => 'parameters',
                'options' => 'options',
                'name' => 'name',
                'order' => 'order',
              ),
            ),
          ),
        ),
        'content' => 
        array (
          'database' => 
          array (
            'db' => 
            array (
              'table' => 'content',
            ),
          ),
          'gateway' => 
          array (
            'adapter' => 'Application\\Db\\LocalAdapter',
            'service' => 
            array (
              'name' => 'Content\\Gateway',
            ),
            'hydrator' => 
            array (
              'class' => 'Common\\Hydrator\\CommonTableEntityHydrator',
              'map' => 
              array (
                'uid' => 'uid',
                'block' => 'block',
                'order' => 'order',
                'content' => 'content',
                'attributes' => 'attributes',
                'parameters' => 'parameters',
                'template' => 'template',
                'type' => 'type',
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'db' => 
  array (
    'adapters' => 
    array (
      'Application\\Db\\LocalAdapter' => 
      array (
        'driver' => 'Pdo_Sqlite',
        'dsn' => 'sqlite:./data/database/spa.sqlite',
      ),
    ),
  ),
  'config_cache_enabled' => true,
  'debug' => false,
  'zend-expressive' => 
  array (
    'programmatic_pipeline' => true,
    'error_handler' => 
    array (
      'template_404' => 'error::404',
      'template_error' => 'error::error',
    ),
  ),
);