<?php

use yii\db\Migration;

/**
 * Миграция для обрабатывания и создания таблицы `{{%image}}`
 * 
 */
class m201025_104553_create_image_table extends Migration
{
    /**
     *  Применение миграционной модели
     * 
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%image}}', [
            'IdImage' => $this->primaryKey(),
            'nameImage' => $this->string(50)->notNull()->unique(),
            'pathImage' => $this->string(50)->notNull(),
            'type' => $this->string(10)->notNull(),
            'size' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ]);
        
        $this->createIndex(
            'index-image-id_user',
            'image',
            'id_user'
        );

        $this->addForeignKey(
            'fk-image-id_user',
            'image',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     *  Откат миграционной модели
     * 
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-image-id_user',
            'image'
        );

        $this->dropIndex(
            'index-image-id_user',
            'image'
        );

        $this->dropTable('{{%image}}');
    }
}
