<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_migrate}}`.
 */
class m190813_231757_create_test_migrate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_migrate}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(12)->notNull()->Unique(),
            'body' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_migrate}}');
    }
}
