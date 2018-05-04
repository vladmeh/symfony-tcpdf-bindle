<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

namespace Vladmeh\Bundle\TCPDFBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class TCPDFExtension extends Extension
{

    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('tcpdf.orientation', $config['config']['pdf_page_orientation']);
        $container->setParameter('tcpdf.unit', $config['config']['pdf_unit']);
        $container->setParameter('tcpdf.format', $config['config']['pdf_page_format']);
        $container->setParameter('tcpdf.unicode', $config['param']['unicode']);
        $container->setParameter('tcpdf.encoding', $config['param']['encoding']);
        $container->setParameter('tcpdf.diskcache', $config['param']['diskcache']);
        $container->setParameter('tcpdf.pdfa', $config['param']['pdfa']);

        $container->setParameter('tcpdf.config', $config['config']);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.xml');
    }

    public function getAlias()
    {
        return 'tcpdf';
    }
}