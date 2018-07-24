<?php


use Phinx\Migration\AbstractMigration;

class CreateAreaTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->dropTable('area');
    }

    public function down()
    {
        $areas = $this->table('area', ['id' => false, 'primary_key' => ['uid']]);
        $areas->addColumn('uid', 'string', array('limit' => 64))
            ->addColumn('template', 'string', array('limit' => 64))
            ->addColumn('machine_name',  'string', array('limit' => 64))
            ->addColumn('attributes', 'string')
            ->addColumn('parameters', 'string')
            ->addColumn('options', 'string')
            ->addColumn('scope', 'string', array('limit' => 8))
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
