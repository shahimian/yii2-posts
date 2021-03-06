<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use shahimian\posts\PostsAsset;
use widgets\xeditor\Editor;
use widgets\xeditor\EditorAssets;

/* @var $this yii\web\View */
/* @var $model shahimian\posts\models\Posts */
/* @var $form yii\widgets\ActiveForm */

PostsAsset::register($this);
EditorAssets::register($this);

$this->registerJs('initDoc();', View::POS_LOAD, 'editor-handler');
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'onsubmit' => 'if(validateMode()){$("#content").val(oDoc.innerHTML);return true;}return false;',
            'name' => 'compForm',
        ],
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content')->widget('widgets\xeditor\Editor') ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ایجاد' : 'بروز رسانی', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
