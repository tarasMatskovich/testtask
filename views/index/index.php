<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?=Html::a('Посмотреть статистику',Url::to('statistic'))?>

<? if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success" role="alert">
        <?=Yii::$app->session->getFlash('success')?>
    </div>
<? endif; ?>

<? if(Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-danger" role="alert">
        <?=Yii::$app->session->getFlash('error')?>
    </div>
<? endif; ?>

<? $form = ActiveForm::begin(['options'=>['id'=>'myForm'],'action'=>'index/save']);?>
<?= $form->field($model,'email')->input('email');?>
<?= Html::submitButton('Подписаться');?>
<? ActiveForm::end();?>