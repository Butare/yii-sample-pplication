<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shopuser`.
 */
class m171002_030022_create_shopuser_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shopuser', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer()->notNull(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100),
            'username' => $this->string(30)->notNull(),
            'password' => $this->string(100)->notNull(),
            'status' => $this->string(),
        ]);

        // add foreign key for table 'shop'
        $this->addForeignKey(
            'fk_shopuser_shop',
            'shopuser',
            'shop_id',
            'shop',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shopuser');
    }
}
