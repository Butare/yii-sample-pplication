<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/09/27
 * Time: 15:41
 */

use \yii\grid\GridView;
?>
<br/>
<br/>
<br/>
<h1>Item details</h1>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'=>[
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                'price',
                'quantity'
        ],

]); ?>

<br/>
<br/>
<br/>

