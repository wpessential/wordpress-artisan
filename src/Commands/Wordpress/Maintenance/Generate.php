<?php
namespace Pbc\WordpressArtisan\Commands\Wordpress\Maintenance;

/**
 * Class WpGenerate
 * @package App\Console\Commands\Wordpress
 */
/**
 * Class Generate
 * @package Pbc\WordpressArtisan\Commands\Wordpress\Maintenance
 */
class Generate
{

    /**
     * @var Down
     */
    protected $downClass;

    /**
     * Generate constructor.
     * @param Down $downClass
     */
    public function __construct(Down $downClass)
    {
        $this->downClass = $downClass;
    }

    /**
     * Create .gitignore file
     *
     * @return mixed
     */
    public function makeGitIgnore()
    {
        $file = $this->downClass->getFileName();
        $path = $this->downClass->getPath();
        if(!file_exists($path)) {
            mkdir($path);
        }
        if(file_exists($path.".gitignore")) {
            return exec("echo {$file} >> {$path}.gitignore");
        }
        return exec("echo {$file} > {$path}.gitignore");
    }

    /**
     * Create maintenance mode file
     *
     * @return mixed
     */
    public function makeMaintenanceFile()
    {   $filePath = $this->downClass->getFilePath();
        return exec("touch {$filePath}");
    }
    
}