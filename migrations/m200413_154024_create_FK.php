<?php

use yii\db\Migration;

/**
 * Class m200413_154024_create_FK
 */
class m200413_154024_create_FK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('ActivityCategoryFK','activities','category_id','category_activities','id','cascade');
        $this->addForeignKey('ActivityStylistFK','activities','stylist_id','stylists','id','cascade');
        $this->addForeignKey('ImageActivityFK','images','activity_id','activities','id','cascade');
        $this->addForeignKey('CommentUserFK','comments','user_id','users','id','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('ActivityCategoryFK','activities');
        $this->dropForeignKey('ActivityStylistFK','activities');
        $this->dropForeignKey('ImageActivityFK','images');
        $this->dropForeignKey('CommentUserFK','comments');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200413_154024_create_FK cannot be reverted.\n";

        return false;
    }
    */
}
