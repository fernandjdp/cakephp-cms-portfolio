<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PorfoliosTagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PorfoliosTagsTable Test Case
 */
class PorfoliosTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PorfoliosTagsTable
     */
    protected $PorfoliosTags;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PorfoliosTags',
        'app.Portfolios',
        'app.Tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PorfoliosTags') ? [] : ['className' => PorfoliosTagsTable::class];
        $this->PorfoliosTags = $this->getTableLocator()->get('PorfoliosTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PorfoliosTags);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PorfoliosTagsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
