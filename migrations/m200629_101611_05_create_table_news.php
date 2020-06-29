<?php

use yii\db\Migration;

class m200629_101611_05_create_table_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'text' => $this->text()->notNull(),
            'created_at' => $this->date()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('author_id', '{{%news}}', 'author_id');
        $this->addForeignKey('news_ibfk_1', '{{%news}}', 'author_id', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
