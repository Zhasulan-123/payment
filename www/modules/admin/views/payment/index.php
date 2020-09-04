<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Администратор');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=Yii::t('app', 'Приема платежа');?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=Url::to(['/admin']);?>"><?=Yii::t('app', 'Главная');?></a></li>
              <li class="breadcrumb-item active"><?=Yii::t('app', 'Приема платежа');?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=Yii::t('app', 'Списки платеж');?></h3>
                <div class="card-tools">
                    <div class="input-group-append">
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
                      <th><?=Yii::t('app', 'Отправлено');?></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($model)):?>
                  <?php $i=1; foreach($model as $id => $item):?>
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
                      <td><?=$item['created_ad'];?></td>                      
                      <td>
                        <a href="#" data-id="<?=$item['id'];?>" class="btn btn-primary btn-sm click_admin_sum">
                          <?=Yii::t('app', 'Обработать');?>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach?>
                  <?php else:?>
                      <tr>
                        <td colspan="6" style="text-align: center;"><?=Yii::t('app', 'Сумма не добавлено !!!');?></td>
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
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<?php $this->registerJsFile('@web/js/payingAdmin.js', ['depends' => 'app\assets\AlertAsset']); ?>