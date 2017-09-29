<?php

use yii\db\Migration;

class m170925_043142_create_table_shop extends Migration
{
    public function safeUp()
    {

        $this->createTable('shop', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100) ->notNull() ->unique(),
            'contact' => $this->string(20) ->notNull(),
            'address' => $this->string(100),
            'created_at' => $this->timestamp() ->notNull() ->defaultExpression("CURRENT_TIMESTAMP"),
            'updated_at' => $this->timestamp() ->notNull() ->defaultExpression("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
        ]);
    }

    public function safeDown()
    {
        echo "m170925_043142_create_table_shop cannot be reverted.\n";
        $this->dropTable('shop');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_043142_create_table_shop cannot be reverted.\n";

        return false;
    }
    */
}
