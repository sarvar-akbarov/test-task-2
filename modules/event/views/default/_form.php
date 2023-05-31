<?php

use app\modules\event\enums\Events;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\event\models\Event $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->dropDownList(Events::list(), ['prompt' => Yii::t('app', 'Choose')]) ?>

    <?= $form->field($model, 'recipient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_blocked')->dropDownList([
        0 => \Yii::t('app', 'No'),
        1 => \Yii::t('app', 'Yes')
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
