<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200916_062251_create_user_table extends Migration
{
   public function up()
   {
       $tableOptions = null;
       if($this->db->driverName === 'mysql'){
           $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
       }

       $this->createTable('{{%user}}', [
           'id' => $this->primaryKey(),
           'username' => $this->string()->notNull()->unique(),
           'role' => $this->string()->notNull(),
           'auth_key' => $this->string(32)->notNull(),
           'password_hash' => $this->string()->notNull(),
           'password_reset_token' => $this->string()->unique(),
           'email' => $this->string()->notNull()->unique(),

           'created_at' => $this->integer()->notNull(),
           'updated_at' => $this->integer()->notNull(),
       ], $tableOptions);
   }

   public function down()
   {
        $this->dropTable('{{%user}}');
   }
}
