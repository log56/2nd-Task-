<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_user}}`.
 */
class m230519_130000_create_project_user_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%project_user}}', [
            'id' => $this->primaryKey(),

            'project_id' => $this->integer()->notNull()->comment('Проект'),
            'user_id' => $this->integer()->notNull()->comment('Кого пригласили'),
            'invited_id' => $this->integer()->notNull()->comment('Кто пригласил'),

            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->comment('Дата обновления'),
            'created_by' => $this->integer()->notNull()->comment('Кто создал'),
            'updated_by' => $this->integer()->null()->defaultValue(null)->comment('Кто обновил'),
        ]);

        // Индексы
        $this->createIndex('idx-project_user-project_id', '{{%project_user}}', 'project_id');
        $this->createIndex('idx-project_user-user_id', '{{%project_user}}', 'user_id');
        $this->createIndex('idx-project_user-invited_id', '{{%project_user}}', 'invited_id');
        $this->createIndex('idx-project_user-created_by', '{{%project_user}}', 'created_by');
        $this->createIndex('idx-project_user-updated_by', '{{%project_user}}', 'updated_by');

        // Внешние ключи
        $this->addForeignKey('fk-project_user-project_id', '{{%project_user}}', 'project_id', '{{%project}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_user-user_id', '{{%project_user}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_user-invited_id', '{{%project_user}}', 'invited_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_user-created_by', '{{%project_user}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_user-updated_by', '{{%project_user}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-project_user-project_id', '{{%project_user}}');
        $this->dropForeignKey('fk-project_user-user_id', '{{%project_user}}');
        $this->dropForeignKey('fk-project_user-invited_id', '{{%project_user}}');
        $this->dropForeignKey('fk-project_user-created_by', '{{%project_user}}');
        $this->dropForeignKey('fk-project_user-updated_by', '{{%project_user}}');

        $this->dropIndex('idx-project_user-project_id', '{{%project_user}}');
        $this->dropIndex('idx-project_user-user_id', '{{%project_user}}');
        $this->dropIndex('idx-project_user-invited_id', '{{%project_user}}');
        $this->dropIndex('idx-project_user-created_by', '{{%project_user}}');
        $this->dropIndex('idx-project_user-updated_by', '{{%project_user}}');

        $this->dropTable('{{%project_user}}');
    }
}
