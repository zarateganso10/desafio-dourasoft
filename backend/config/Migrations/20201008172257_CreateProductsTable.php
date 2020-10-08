<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProductsTable extends AbstractMigration
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
        $table = $this->table('products');
        $table->addColumn('code', 'string', [
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'null' => false,
            'limit' => 255,
        ]);
        $table->addColumn('description', 'text', [
            'null' => true,
            'limit' => 255,
        ]);
        $table->addColumn('price', 'decimal', [
            'null' => false,
        ]);
        $table->create();
    }
}
