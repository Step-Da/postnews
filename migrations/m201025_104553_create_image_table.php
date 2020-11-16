<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m201025_104553_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'fileName' => $this->char(50)->notNull(),
            'fileSize' => $this->char(50)->notNull(),
            'fileType' => $this->char(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%image}}');
    }
}
