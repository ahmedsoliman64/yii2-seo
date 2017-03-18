<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\asoliman\models\Meta */

$this->title = Yii::t('frontend', 'Create Meta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
