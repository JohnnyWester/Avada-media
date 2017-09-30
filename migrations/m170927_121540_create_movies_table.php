<?php

use yii\db\Migration;

/**
 * Handles the creation of table `move`.
 */
class m170927_121540_create_movies_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('movies', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'text'=>$this->text(),
            'date'=>$this->date(),
            'image'=>$this->string(),
            'length'=>$this->string(),
            'premiere'=>$this->string(),
            'directors'=>$this->string(),
            'writers'=>$this->string(),
            'stars'=>$this->string(),
            'movie'=>$this->string(),
            'viewed'=>$this->integer(),
//            category
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('movies');
    }
}
