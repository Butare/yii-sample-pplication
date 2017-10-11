<?php

use yii\db\Migration;

/**
 * Handles adding imagename to table `items`.
 */
class m171011_092524_add_imagename_column_to_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('items', 'imagename', $this->string()->after('quantity'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('items', 'imagename');
    }
}
