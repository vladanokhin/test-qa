<?php

namespace Core\App;

/**
 * Class for preparing and configuring application
 */
class App
{
    protected array $config;

    public function __construct()
    {
        $this->config = $this->initConfigs();
        $this->initRouters();
    }

    /**
     * Get an array of all configurations
     * @return array
     */
    private function initConfigs(): array
    {
        $pathToConfigs = APP_DIR . '/configs/';
        $configFiles = scandir($pathToConfigs);
        $cfg = [];

        if(!$configFiles)
            return [];

        foreach($configFiles as $config) {
            if(is_dir($config))
                continue;

            $filename = pathinfo($config, PATHINFO_FILENAME);
            $cfg += [$filename => require_once($pathToConfigs . $config)];
        }

        return $cfg;
    }

    private function initRouters()
    {
        require_once($this->config['app']['routers']);
    }
}
