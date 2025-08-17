<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiariesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiariesTable Test Case
 */
class DiariesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiariesTable
     */
    protected $Diaries;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Diaries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diaries') ? [] : ['className' => DiariesTable::class];
        $this->Diaries = $this->getTableLocator()->get('Diaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Diaries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DiariesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
