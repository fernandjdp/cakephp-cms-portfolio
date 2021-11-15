<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePortfolios extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('portfolios');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', ['null' => false])
              ->addForeignKey('user_id', 'users', 'id', [
                'delete' => 'SET_NULL', 
                'update' => 'NO_ACTION'
        ]);
        $table->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addIndex(['slug'], [
            'unique' => true
        ]);
        $table->addColumn('body', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('show', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
