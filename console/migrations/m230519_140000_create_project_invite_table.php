<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_invite}}`.
 */
class m230519_140000_create_project_invite_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%project_invite}}', [
            'id' => $this->primaryKey(),

            'project_id' => $this->integer()->notNull()->comment('Проект'),
            'user_id' => $this->integer()->notNull()->comment('Кого пригласили'),
            'invited_id' => $this->integer()->notNull()->comment('Кто пригласил'),
            'hash' => $this->string(64)->notNull()->unique()->comment('Хэш приглашения'),

            'status' => "ENUM('Принят', 'Отклонен', 'Отправлен') NOT NULL DEFAULT 'Отправлен' COMMENT 'Статус приглашения'",

            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->comment('Дата обновления'),
            'created_by' => $this->integer()->notNull()->comment('Кто создал'),
            'updated_by' => $this->integer()->null()->defaultValue(null)->comment('Кто обновил'),
        ]);

        // Индексы
        $this->createIndex('idx-project_invite-project_id', '{{%project_invite}}', 'project_id');
        $this->createIndex('idx-project_invite-user_id', '{{%project_invite}}', 'user_id');
        $this->createIndex('idx-project_invite-invited_id', '{{%project_invite}}', 'invited_id');
        $this->createIndex('idx-project_invite-created_by', '{{%project_invite}}', 'created_by');
        $this->createIndex('idx-project_invite-updated_by', '{{%project_invite}}', 'updated_by');

        // Внешние ключи
        $this->addForeignKey('fk-project_invite-project_id', '{{%project_invite}}', 'project_id', '{{%project}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_invite-user_id', '{{%project_invite}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_invite-invited_id', '{{%project_invite}}', 'invited_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_invite-created_by', '{{%project_invite}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-project_invite-updated_by', '{{%project_invite}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-project_invite-project_id', '{{%project_invite}}');
        $this->dropForeignKey('fk-project_invite-user_id', '{{%project_invite}}');
        $this->dropForeignKey('fk-project_invite-invited_id', '{{%project_invite}}');
        $this->dropForeignKey('fk-project_invite-created_by', '{{%project_invite}}');
        $this->dropForeignKey('fk-project_invite-updated_by', '{{%project_invite}}');

        $this->dropIndex('idx-project_invite-project_id', '{{%project_invite}}');
        $this->dropIndex('idx-project_invite-user_id', '{{%project_invite}}');
        $this->dropIndex('idx-project_invite-invited_id', '{{%project_invite}}');
        $this->dropIndex('idx-project_invite-created_by', '{{%project_invite}}');
        $this->dropIndex('idx-project_invite-updated_by', '{{%project_invite}}');

        $this->dropTable('{{%project_invite}}');
    }
}
