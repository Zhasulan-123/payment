<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Отправить платеж');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=Yii::t('app', 'Отправить платеж');?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"></li>
              <li class="breadcrumb-item active"><?=Yii::t('app', 'Отправить платеж');?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=Yii::t('app', 'Списки платеж');?></h3>
                <div class="card-tools">
                    <div class="input-group-append">
                       <a href="#" class="btn btn-block btn-danger btn-sm clear_count_sum"><?=Yii::t('app', 'Очистить');?></a>
                    </div>
                </div>
                  <div class="card-tools">
                    <div class="input-group-append">
                       <a href="#" class="btn btn-block btn-success btn-sm add_sum_count"><?=Yii::t('app', 'Отправить');?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap past_sum">
                  <thead>
                    <tr>
                      <th><?=Yii::t('app', '№');?></th>
                      <th><?=Yii::t('app', 'Имя');?></th>
                      <th><?=Yii::t('app', 'Сумма');?></th>
                      <th><?=Yii::t('app', 'Подпись');?></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($session['paying'])):?>
                  <?php $i=1; foreach($session['paying'] as $id => $item):?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?= Html::encode($item['name']);?></td>
                      <td><?= Html::encode($item['sum']);?></td>
                      <td>
                           <?php if($item['signature'] == 1):?>
                            <span class="badge badge-success">
                              <?=Yii::t('app', 'Да');?>
                            </span>
                           <?php endif; ?>
                      </td>
                      <td>
                        <a href="#" data-id="<?=$id;?>" class="delete_sum">
                           <span class="badge badge-danger">
                             <i class="fas fa-times"></i>
                           </span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach?>
                  <tr>
                      <td colspan="4">На сумму: </td>
                      <td><?= Html::encode($session['paying.price']);?></td>
                  </tr>
                  <?php else:?>
                      <tr>
                        <td colspan="5" style="text-align: center;"><?=Yii::t('app', 'Сумма не добавлено !!!');?></td>
                      </tr>
                  <?php endif;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=Yii::t('app', 'Добавить платеж');?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="payingForm">
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName"><?=Yii::t('app', 'Имя *');?></label>
                      <input type="text" name="name" class="form-control namePrice" id="exampleInputName" placeholder="<?=Yii::t('app', 'Имя');?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputSum"><?=Yii::t('app', 'Сумма: (от 10р до 500р) *');?></label>
                      <input type="number" name="sum" class="form-control sumPrice" id="exampleInputSum" placeholder="<?=Yii::t('app', 'Сумма');?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCommision"><?=Yii::t('app', 'Коммиссия: (от 0,5% до 2%)');?></label>
                    </div>
                    <div class="form-group mb-0">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="signature" class="custom-control-input signaturePrice" id="exampleSignature">
                        <label class="custom-control-label" for="exampleSignature"><?=Yii::t('app', 'Цифровую подпись *');?></label>
                      </div>
                    </div>
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?=Yii::t('app', 'Добавить');?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </div>
<?php $this->registerJsFile('@web/js/paying.js', ['depends' => 'app\assets\AlertAsset']); ?>