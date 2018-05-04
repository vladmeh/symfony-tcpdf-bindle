<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

namespace Vladmeh\Bundle\TCPDFBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Filesystem\Filesystem;

class TCPDFBundle extends Bundle
{
    public function boot()
    {
        if (!$this->container->hasParameter('tcpdf.config')){
            return;
        }

        $config = $this->container->getParameter('tcpdf.config');

        if ($config['k_tcpdf_external_config']){
            foreach ($config as $key => $value){

                if (($key === 'k_path_cache' || $key === 'k_path_url_cache') && !is_dir($value)) {
                    $this->createDir($value);
                }

                $constKey = strtoupper($key);

                if(in_array($constKey, ['K_PATH_URL','K_PATH_MAIN','K_PATH_FONTS','K_PATH_CACHE','K_PATH_URL_CACHE','K_PATH_IMAGES'])) {
                    $value .= (substr($value, -1) == '/' ? '' : '/');
                }

                if (!defined($constKey))
                    define($constKey, $value);
            }
        }
    }

    private function createDir($filePath)
    {
        $filesystem = new Filesystem();
        if (false === $filesystem->mkdir($filePath)) {
            throw new \RuntimeException(sprintf(
                'Could not create directory %s', $filePath
            ));
        }
    }

}