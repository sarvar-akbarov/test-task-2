<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230531_063107_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255),
            'username' => $this->string(255),
            'email' => $this->string(255),
            'password_hash' => $this->string(255),
            'auth_key' => $this->string(255),
        ]);

        $this->insert('{{%user}}', [
            'full_name' => 'Test User',
            'username' => 'admin',
            'email' => 'sarvarakbarov0505@gmail.com',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'auth_key' => Yii::$app->security->generateRandomString()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
