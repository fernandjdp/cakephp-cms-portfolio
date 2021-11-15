<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortfoliosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortfoliosTable Test Case
 */
class PortfoliosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PortfoliosTable
     */
    protected $Portfolios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Portfolios',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Portfolios') ? [] : ['className' => PortfoliosTable::class];
        $this->Portfolios = $this->getTableLocator()->get('Portfolios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Portfolios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PortfoliosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PortfoliosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
