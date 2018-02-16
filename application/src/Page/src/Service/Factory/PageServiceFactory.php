<?php

namespace Page\Service\Factory;

use Common\Service\Factory\CommonServiceFactory;
use Page\Service\PageService as RequestedService;

class PageServiceFactory extends CommonServiceFactory
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $this->setRequestedService(new RequestedService());
        return parent::__invoke( $container, $requestedName, $options = null);
    }


}
