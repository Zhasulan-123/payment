<?php
use yii\helpers\Html;
?>

<form id="FormUpdate" action="/admin/payment/select?id=<?= $model->id; ?>" role="form">
    <div class="modal-header">
        <h4 class="modal-title"><?=Yii::t('app', 'В обработку');?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
          <input type="hidden" class="name_value" name="name"  value="<?= Html::encode($model->name); ?>" /> 
          <input type="hidden" class="sum_value" name="sum"  value="<?= Html::encode($model->sum); ?>" /> 
          <input type="hidden" class="order_number_value" name="order_number"  value="<?= Html::encode($model->order_number); ?>" /> 

          <div class="form-group">
                <label for="exampleCommision">
                    <?=Yii::t('app', 'Имя:');?>
                    <?= Html::encode($model->name); ?>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?=Yii::t('app', 'Сумма:');?>
                    <?= Html::encode($model->sum); ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?=Yii::t('app', 'Подпись:');?>
                    <?php if($model->signature == 1):?>
                        <span class="badge badge-success">
                          <?=Yii::t('app', 'Да');?>
                        </span>
                    <?php endif;?>

                </label>
          </div>

            <div class="form-group">
                <label for="exampleCommision"><?=Yii::t('app', 'Коммиссия: * - (от 1% до 2%)');?></label>
                <input type="text" class="form-control commision_value_form" id="exampleCommision" placeholder="<?=Yii::t('app', 'Коммиссия');?>">
            </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('app', 'Закрыть');?></button>
        <button type="button" class="btn btn-primary click_form_sum"><?=Yii::t('app', 'Отправить');?></button>
    </div>
</form>