<?php

namespace ZfcTwig\Service;

use ZfcTwig\View\Renderer\TwigRenderer;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwigRendererFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $config = $config['zfctwig'];

        $renderer = new TwigRenderer(
            $serviceLocator->get('ZfcTwigEnvironment'),
            $serviceLocator->get('ZfcTwigResolver')
        );

        $renderer->setHelperPluginManager($serviceLocator->get('ZfcTwigViewHelperManager'));
        $renderer->setDefaultSuffix($config['suffix']);

        return $renderer;
    }
}