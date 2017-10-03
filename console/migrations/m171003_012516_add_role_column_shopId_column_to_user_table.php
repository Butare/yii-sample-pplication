<?php

use yii\db\Migration;

/**
 * Handles adding role_column_shopId to table `user`.
 */
class m171003_012516_add_role_column_shopId_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role', $this->string()->notNull()->after('username'));
        $this->addColumn('user', 'shopId', $this->integer()->after('role'));

        $this->addForeignKey(
            'fk_user_shopId',
            'user',
            'shopId',
            'shop',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
        $this->dropColumn('user', 'shopId');
        $this->dropForeignKey('fk_user_shopId','user');
    }
}
