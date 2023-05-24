<?php

namespace Core\App;

/**
 * Class for preparing and configuring application
 */
class Instance
{
    protected array $config;

    public function __construct()
    {
        $this->config = $this->initConfig();
    }

    /**
     * Get array from configs
     * @return array
     */
    private function initConfig(): array
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
            $cfg += [$filename => include($pathToConfigs . $config)];
        }

        return $cfg;
    }
}
