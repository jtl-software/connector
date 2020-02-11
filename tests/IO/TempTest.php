<?php
namespace Jtl\Connector\Core\Test\IO;

use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class TempTest
 * @package Jtl\Connector\Core\Test\IO
 */
class TempTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetDirectory()
    {
        $dir = Temp::getDirectory();
        $this->assertContains($dir, [CONNECTOR_DIR, sys_get_temp_dir()]);
    }

    /**
     * @throws \Exception
     */
    public function testCreateDirectory()
    {
        $dir = Temp::createDirectory();

        $this->assertDirectoryExists($dir);

        rmdir($dir);

        $this->assertDirectoryNotExists($dir);
    }

    /**
     * @throws \Exception
     */
    public function testCreateDirectoryWithDifferentName()
    {
        $dir = Temp::createDirectory(...[Temp::getDirectory(), 'foo-bar-' . uniqid()]);

        $this->assertDirectoryExists($dir);

        rmdir($dir);

        $this->assertDirectoryNotExists($dir);
    }
}