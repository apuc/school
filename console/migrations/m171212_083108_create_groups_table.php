<?php

use yii\db\Migration;

/**
 * Handles the creation of table `groups`.
 */
class m171212_083108_create_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('groups', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'teacher_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'groups_teacher_fk',
            'groups',
            'teacher_id',
            'teacher',
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
        $this->dropForeignKey('groups_teacher_fk', 'groups');
        $this->dropTable('groups');
    }
}
