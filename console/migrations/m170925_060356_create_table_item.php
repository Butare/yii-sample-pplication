<?php

use yii\db\Migration;

class m170925_060356_create_table_item extends Migration
{
    public function safeUp()
    {
        $this->createTable("items", [
            'id' => $this->primaryKey(),
            'shopId'=> $this->integer()->notNull(),
            'name' => $this->string(100) ->notNull(),
            'price' => $this->double(1)->defaultValue(0.0),
            'quantity'=> $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp() ->notNull() ->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp() ->notNull() ->defaultExpression("CURRENT_TIMESTAMP")
        ]);

        $this->addForeignKey(
            "fk_items_shop_id",
            "items",
            "shopId",
            "shop",
            "id",
            "CASCADE");


    }

    public function safeDown()
    {
        echo "m170925_060356_create_table_items cannot be reverted.\n";
        $this->dropTable("items");
        return false;
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_060356_create_table_items cannot be reverted.\n";

        return false;
    }
    */
}
