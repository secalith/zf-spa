<?php


use Phinx\Migration\AbstractMigration;

class CreateContentTable extends AbstractMigration
{

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->dropTable('content');
    }

    public function down()
    {
        $contentTable = $this->table('content', ['id' => false, 'primary_key' => ['uid']]);
        $contentTable->addColumn('uid', 'string', array('limit' => 64))
            ->addColumn('block', 'string', array('limit' => 64))
            ->addColumn('order', 'string', array('limit' => 64))
            ->addColumn('template', 'string')
            ->addColumn('type', 'string')
            ->addColumn('attributes', 'string', array('limit' => 64))
            ->addColumn('parameters', 'string', array('limit' => 64))
            ->addColumn('options', 'string', array('limit' => 64))
            ->addColumn('content', 'string')
            ->addColumn('parent_uid', 'string', array('limit' => 64))
            ->addColumn('status', 'integer')
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
