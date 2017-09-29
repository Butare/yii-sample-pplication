<?php

use yii\db\Migration;

class m170925_063836_create_table_customers1 extends Migration
{
    public function safeUp()
    {
        $this->createTable("customers", [
            'id' => $this->primaryKey(),
            'username' =>$this->string(30) ->notNull(),
            'password' =>$this->string(100)->notNull(),
            'address' =>$this->string(100)->notNull()
        ]);

    }

    public function safeDown()
    {
        echo "m170925_063836_create_table_customers1 cannot be reverted.\n";
        $this->dropTable("customers");
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_063836_create_table_customers1 cannot be reverted.\n";

        return false;
    }
    */
}
