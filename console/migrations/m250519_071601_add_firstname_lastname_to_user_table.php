<?php

use yii\db\Migration;

/**
 * Class m250519_071601_add_firstname_lastname_to_user_table
 */
class m250519_071601_add_firstname_lastname_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250519_071601_add_firstname_lastname_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250519_071601_add_firstname_lastname_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
