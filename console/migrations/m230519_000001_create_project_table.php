<?php
use yii\db\Migration;

class m230519_000001_create_project_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'status' => "ENUM('Идея','Разработка','Готово') NOT NULL DEFAULT 'Идея'",
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_project_user', 'project', 'created_by', 'user', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_project_user', 'project');
        $this->dropTable('project');
    }
}
