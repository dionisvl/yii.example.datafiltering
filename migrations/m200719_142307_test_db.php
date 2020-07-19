<?php

use yii\db\Migration;

/**
 * Class m200719_142307_test_db
 */
class m200719_142307_test_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/dumps/test_db.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200719_172307_test_db cannot be reverted.\n";

        return false;
    }
    */
}
