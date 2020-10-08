<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table('clients');
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email', 'text', [
            'null' => false,
            'limit' => 255,
        ]);
        $table->addColumn('address', 'text', [
            'null' => false,
            'limit' => 255,
        ]);
        $table->create();
    }
}
