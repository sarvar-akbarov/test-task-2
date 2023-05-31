<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m230531_063141_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'event_name' => $this->string(255),
            'recipient' => $this->string(255),
            'is_blocked' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-event-created_by}}',
            '{{%event}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-event-created_by}}',
            '{{%event}}',
            'created_by',
            '{{%user}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-event-updated_by}}',
            '{{%event}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-event-updated_by}}',
            '{{%event}}',
            'updated_by',
            '{{%user}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-event-created_by}}',
            '{{%event}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-event-created_by}}',
            '{{%event}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-event-updated_by}}',
            '{{%event}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-event-updated_by}}',
            '{{%event}}'
        );

        $this->dropTable('{{%event}}');
    }
}
