<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\redactor\widgets\Redactor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'article_type')->dropDownList([ 'HOME_01' => 'HOME 01', 'HOME_02' => 'HOME 02', 'HOME_03' => 'HOME 03', 'HOME_04' => 'HOME 04', 'HOME_05' => 'HOME 05', 'HOME_06' => 'HOME 06', 'ABOUT_US' => 'ABOUT US', 'NEWS' => 'NEWS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', 'deleted' => 'Deleted', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'active_time')->widget(DatePicker::className(), [
        'readonly' => true,
        'value' => $model->getAttribute('active_time') ? date('Y-m-d', $model->getAttribute('active_time')) : date('Y-m-d'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ],
    ]) ?>

    <?= $form->field($model, 'content')->widget(Redactor::className(), [
        'clientOptions' => [
            'imageManagerJson' => ['/redactor/upload/image-json'],
            'imageUpload' => ['/redactor/upload/image'],
            'fileUpload' => ['/redactor/upload/file'],
            'lang' => 'zh_cn',
            'plugins' => ['clips', 'fontcolor','imagemanager']
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
