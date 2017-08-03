<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBiosTest\I18n;

use MSBios\I18n\Module;
use MSBios\ModuleInterface;
use PHPUnit\Framework\TestCase;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

/**
 * Class ModuleTest
 * @package MSBiosTest\Guard
 */
class ModuleTest extends TestCase
{
    /** @var Module */
    protected $instance;

    protected function setUp()
    {
        $this->instance = new Module;
        parent::setUp();
    }

    /**
     *
     */
    public function testGetModuleConfigFile()
    {
        $this->assertTrue($this->instance instanceof ModuleInterface);
        $this->assertInternalType('array', $this->instance->getConfig());
    }

    /**
     *
     */
    public function testGetAutoloaderConfig()
    {
        $this->assertTrue($this->instance instanceof AutoloaderProviderInterface);
        $this->assertInternalType('array', $this->instance->getAutoloaderConfig());
    }
}
