<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m201123_114624_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%article}}', [
            'idArticle' => $this->primaryKey(),
            'name' => $this->string(30)->notNull()->unique(),
            'text' => $this->string()->notNull(),
            'id_author' => $this->integer()->notNull(),
            'status' => $this->boolean()->notNull()
        ]);
        
        $this->createIndex(
            'index-article-idArticle',
            'article',
            'idArticle'
        );

        $this->addForeignKey(
            'fk-article-id_author',
            'article',
            'id_author',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {   
        $this->dropForeignKey(
            'fk-article-id_author',
            'article'
        );

        $this->dropIndex(
            'index-article-idArticle',
            'article'
        );

        $this->dropTable('{{%article}}');
    }
}
