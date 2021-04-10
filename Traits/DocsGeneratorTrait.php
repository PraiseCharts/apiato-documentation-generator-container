<?php

namespace App\Containers\VendorSection\Documentation\Traits;

use Illuminate\Support\Facades\Config;

trait DocsGeneratorTrait
{
    private function getFullDocsUrl($type): string
    {
        return '> ' . $this->getAppUrl() . '/' . $this->getUrl($type);
    }

    private function getAppUrl()
    {
        return Config::get('app.url');
    }

    private function getUrl($type)
    {
        $configs = $this->getTypeConfig();

        return $configs[$type]['url'];
    }

    private function getTypeConfig()
    {
        return Config::get($this->getConfigFile() . '.types');
    }

    private function getConfigFile(): string
    {
        return 'documentation-container';
    }

    private function getDocumentationPath($type): string
    {
        return $this->getHtmlPath() . $this->getFolderName($type);
    }

    private function getHtmlPath()
    {
        return Config::get("{$this->getConfigFile()}.html_files");
    }

    private function getFolderName($type)
    {
        $configs = $this->getTypeConfig();

        return $configs[$type]['folder-name'];
    }

    private function getJsonFilePath($type): string
    {
        return 'app/Containers/' . config('documentation-container.section_name') . '/Documentation/ApiDocJs/' . $type;
    }

    private function getExecutable()
    {
        return Config::get($this->getConfigFile() . '.executable');
    }

    private function getEndpointFiles($type): array
    {
        $configs = $this->getTypeConfig();

        // what files types needs to be included
        $routeFilesCommand = [];
        $routes = $configs[$type]['routes'];

        foreach ($routes as $route) {
            $routeFilesCommand[] = '-f';
            $routeFilesCommand[] = $route . '.php';
        }

        return $routeFilesCommand;
    }
}
