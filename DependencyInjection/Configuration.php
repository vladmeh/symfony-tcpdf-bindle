<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

namespace Vladmeh\Bundle\TCPDFBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder|TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tcpdf');
        $rootNode
            ->children()
                ->arrayNode('construct')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('orientation')->defaultValue('P')->end()
                        ->scalarNode('unit')->defaultValue('mm')->end()
                        ->scalarNode('format')->defaultValue('A4')->end()
                        ->booleanNode('unicode')->defaultTrue()->end()
                        ->scalarNode('encoding')->defaultValue('UTF-8')->end()
                        ->booleanNode('diskcache')->defaultFalse()->end()
                        ->booleanNode('pdfa')->defaultFalse()->end()
                    ->end()
                ->end()

                ->arrayNode('config')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('k_path_main')->defaultValue('%kernel.root_dir%/../vendor/tecnickcom/tcpdf/')->end()
                        ->scalarNode('k_path_url')->defaultValue('%kernel.root_dir%/../vendor/tecnickcom/tcpdf/')->end()
                        ->scalarNode('k_path_fonts')->defaultValue('%kernel.root_dir%/../vendor/tecnickcom/tcpdf/fonts/')->end()
                        ->scalarNode('k_path_images')->defaultValue('%kernel.root_dir%/../vendor/tecnickcom/tcpdf/examples/images/')->end()
                        ->scalarNode('k_path_cache')->defaultValue('%kernel.cache_dir%/tcpdf')->end()
                        ->scalarNode('k_path_url_cache')->defaultValue('%kernel.cache_dir%/tcpdf')->end()
                        ->scalarNode('k_blank_image')->defaultValue('%kernel.root_dir%/../vendor/tecnickcom/tcpdf/examples/images/_blank.png')->end()
                        ->scalarNode('k_cell_height_ratio')->defaultValue(1.25)->end()
                        ->scalarNode('k_title_magnification')->defaultValue(1.3)->end()
                        ->scalarNode('k_small_ratio')->defaultValue(2/3)->end()
                        ->scalarNode('k_thai_topchars')->defaultTrue()->end()
                        ->scalarNode('k_tcpdf_calls_in_html')->defaultFalse()->end()
                        ->scalarNode('k_tcpdf_external_config')->defaultTrue()->end()
                        ->scalarNode('head_magnification')->defaultValue(1.1)->end()
                        ->scalarNode('pdf_header_logo')->defaultValue('')->end()
                        ->scalarNode('pdf_header_logo_width')->defaultValue(0)->end()
                        ->scalarNode('pdf_page_format')->defaultValue('A4')->end()
                        ->scalarNode('pdf_page_orientation')->defaultValue('P')->end()
                        ->scalarNode('pdf_creator')->defaultValue('TCPDF')->end()
                        ->scalarNode('pdf_author')->defaultValue('TCPDF')->end()
                        ->scalarNode('pdf_header_title')->defaultValue('')->end()
                        ->scalarNode('pdf_header_string')->defaultValue('')->end()
                        ->scalarNode('pdf_unit')->defaultValue('mm')->end()
                        ->scalarNode('pdf_margin_header')->defaultValue(5)->end()
                        ->scalarNode('pdf_margin_footer')->defaultValue(10)->end()
                        ->scalarNode('pdf_margin_top')->defaultValue(27)->end()
                        ->scalarNode('pdf_margin_bottom')->defaultValue(25)->end()
                        ->scalarNode('pdf_margin_left')->defaultValue(15)->end()
                        ->scalarNode('pdf_margin_right')->defaultValue(15)->end()
                        ->scalarNode('pdf_font_name_main')->defaultValue('helvetica')->end()
                        ->scalarNode('pdf_font_size_main')->defaultValue(10)->end()
                        ->scalarNode('pdf_font_name_data')->defaultValue('helvetica')->end()
                        ->scalarNode('pdf_font_size_data')->defaultValue(8)->end()
                        ->scalarNode('pdf_font_monospaced')->defaultValue('courier')->end()
                        ->scalarNode('pdf_image_scale_ratio')->defaultValue(1.25)->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }

}