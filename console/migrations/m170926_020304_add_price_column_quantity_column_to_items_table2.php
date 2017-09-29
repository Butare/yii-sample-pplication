<?php

use yii\db\Migration;

/**
 * Handles adding price_column_quantity to table `items`.
 */
class m170926_020304_add_price_column_quantity_column_to_items_table2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('items', 'price', $this->double() ->defaultValue(0.0) ->after('name'));
        $this->addColumn('items', 'quantity', $this->integer()->defaultValue(0)->after('price'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('items', 'price');
        $this->dropColumn('items', 'quantity');
    }
}
