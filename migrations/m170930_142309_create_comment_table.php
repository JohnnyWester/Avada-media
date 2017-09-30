<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m170930_142309_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text'=>$this->string(),
            'username'=>$this->string(),
            'image' => $this->string(),
            'news_id'=>$this->integer(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            'idx-news_id',
            'comment',
            'news_id'
        );

        // add foreign key for table `article`
        $this->addForeignKey(
            'fk-news_id',
            'comment',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
