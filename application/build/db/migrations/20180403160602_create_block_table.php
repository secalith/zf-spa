<?php


use Phinx\Migration\AbstractMigration;

class CreateBlockTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->dropTable('block');
    }

    public function down()
    {
        $blockTable = $this->table('block', ['id' => false, 'primary_key' => ['uid']]);
        $blockTable->addColumn('uid', 'string', array('limit' => 64))
            ->addColumn('parent_uid', 'string', array('limit' => 64))
            ->addColumn('area', 'string', array('limit' => 64))
            ->addColumn('type', 'string', array('limit' => 64))
            ->addColumn('template', 'string', array('limit' => 64))
            ->addColumn('order', 'integer', array('limit' => 8))
            ->addColumn('name', 'string', array('limit' => 64))
            ->addColumn('content', 'string')
            ->addColumn('attributes', 'string')
            ->addColumn('parameters', 'string')
            ->addColumn('options', 'string')
            ->save();
    }

    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

    }
}
