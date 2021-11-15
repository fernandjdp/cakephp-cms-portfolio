<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePorfoliosTags extends AbstractMigration
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
        $table = $this->table('porfolios_tags', ['id' => false, 'primary_key' => ['porfolio_id', 'tag_id']]);
        $table->addColumn('porfolio_id', 'integer', ['null' => false])
              ->addForeignKey('porfolio_id', 'portfolios', 'id', [
                'delete' => 'SET_NULL', 
                'update' => 'NO_ACTION'
        ]);
              $table->addColumn('tag_id', 'integer', ['null' => false])
              ->addForeignKey('tag_id', 'tags', 'id', [
                'delete' => 'SET_NULL', 
                'update' => 'NO_ACTION'
        ]);
        $table->create();
    }
}
