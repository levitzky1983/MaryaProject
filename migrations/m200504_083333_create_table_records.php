<?php

use yii\db\Migration;

/**
 * Class m200504_083333_create_table_records
 */
class m200504_083333_create_table_records extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->createTable('recordsActivity',[
            'id'=>$this->primaryKey()->notNull(),
            'firstName'=>$this->string(150)->notNull(),
            'phone'=>$this->string(150)->notNull(),
            'date'=>$this->string(150)->notNull(),
            'categoryActivity_id'=>$this->integer()->notNull(),
            'createDate'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey('recordActivityCategoryActivity','recordsActivity','categoryActivity_id','category_activities','id','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('records-activity');
        $this->dropForeignKey('recordActivityCategoryActivity','recordsActivity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200504_083333_create_table_records cannot be reverted.\n";

        return false;
    }
    */
}
