<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateItensTable extends AbstractMigration
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
        $table = $this->table('itens');
        $table->addColumn('order_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('product_id', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('amount', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('unitary_value', 'decimal', [
            'null' => false,
        ]);
        $table->addColumn('total_value', 'decimal', [
            'null' => false,
        ]);
        $table->addIndex(['order_id']);
        $table->addIndex(['product_id']);
        $table->addForeignKey('order_id', 'orders', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE']);
        $table->addForeignKey('product_id', 'products', 'id', ['delete'=> 'SET NULL', 'update'=> 'SET NULL']);
        $table->create();
    }
}
