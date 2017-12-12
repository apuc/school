<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lessons`.
 */
class m171212_095641_create_lessons_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('lessons', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'group_id' => $this->integer(11)->notNull(),
            'lessons_dt' => $this->time(),
        ]);

        $this->addForeignKey(
            'lessons_groups_fk',
            'lessons',
            'group_id',
            'groups',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('lessons_groups_fk', 'lessons');
        $this->dropTable('lessons');
    }
}
