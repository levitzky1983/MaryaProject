<?php

use yii\db\Migration;

/**
 * Class m200413_144736_create_tables
 */
class m200413_144736_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activities',[
            'id'=>$this->primaryKey()->notNull(),
            'title'=>$this->string(150),
            'category_id'=>$this->integer()->notNull(),
            'stylist_id'=>$this->integer(),
            'description'=>$this->text(),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('category_activities',[
            'id'=>$this->primaryKey()->notNull(),
            'position'=>$this->integer(),
            'title'=>$this->string(150)->notNull(),
            'description'=>$this->text(),
            'addCategory'=>$this->boolean()->notNull()->defaultValue(0),
            'timing' =>$this->string(150),
            'preview' =>$this->string(150),
            'price'=>$this->integer()
        ]);

        $this->createTable('images',[
            'id'=>$this->primaryKey()->notNull(),
            'name'=>$this->string(250)->notNull(),
            'activity_id'=>$this->integer()->notNull(),
            'portfolio'=>$this->boolean()->notNull()->defaultValue(0),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('stylists',[
            'id'=>$this->primaryKey()->notNull(),
            'first_name'=>$this->string(150)->notNull(),
            'last_name'=>$this->string(150)->notNull(),
            'vk'=>$this->string(100),
            'instagram'=>$this->string(100),
            'phone'=>$this->string(100),
            'description'=>$this->text(),
            'category_stylist'=>$this->string(50),
            'image'=>$this->string(150),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('imageStylists',[
            'id'=>$this->primaryKey()->notNull(),
            'name'=>$this->string(250)->notNull(),
            'stylist_id'=>$this->integer()->notNull(),
            'portfolio'=>$this->string(3)->notNull()->defaultValue('нет'),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('users',[
            'id'=>$this->primaryKey()->notNull(),
            'userName'=>$this->string(100)->notNull(),
            'passwordHash'=>$this->string(200)->notNull(),
            'authKey'=>$this->string(200),
            'token'=>$this->string(200),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('comments',[
            'id'=>$this->primaryKey()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'title'=>$this->string(150),
            'description'=>$this->text(),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activities');
        $this->dropTable('category_activities');
        $this->dropTable('images');
        $this->dropTable('stylists');
        $this->dropTable('users');
        $this->dropTable('comments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200413_144736_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
