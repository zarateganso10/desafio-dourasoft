<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateOrdersTable extends AbstractMigration
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
        $table = $this->table('orders');
        $table->addColumn('client_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('date', 'timestamp', [
            'null' => false,
            'default' => 'CURRENT_TIMESTAMP',
        ]);
        $table->addColumn('status', 'string', [
            'null' => false,
        ]);
        $table->addColumn('total', 'decimal', [
            'null' => false,
        ]);
        $table->addIndex(['client_id']);
        $table->addForeignKey('client_id', 'clients', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE']);
        $table->create();
    }
}
