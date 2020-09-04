<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Обработанный платежа');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?=Yii::t('app', 'Обработанный платежа');?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=Url::to(['/admin']);?>"><?=Yii::t('app', 'Главная');?></a></li>
            <li class="breadcrumb-item active"><?=Yii::t('app', 'Обработанный платежа');?></li>
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
                    <th><?=Yii::t('app', 'Коммиссия');?></th>
                    <th><?=Yii::t('app', 'Отправлено');?></th>
                    <th><?=Yii::t('app', 'Общей сумма');?></th>
                    <th><?=Yii::t('app', 'Обработонь');?></th>
                  </tr>
                </thead>
                <tbody>

                <?php if(!empty($model)):?>
                <?php $i=1; foreach($model as $id => $item):?>
                  <tr>
                    <td><?=$i++?></td>
                    <td><?= Html::encode($item['name']);?></td>
                    <td><?= Html::encode($item['sum']);?></td>
                    <td><?= Html::encode($item['commision']);?>%</td>
                    <td><?=$item['created_at'];?></td>
                    <td><?=$item['sum'] + $item['commision'] / 100 * $item['sum'];?></td>
                    <td>
                        <?php if($item['processing'] == '1'):?>
                          <span class="badge badge-success">
                            <?=Yii::t('app', 'Да');?>
                          </span>
                        <?php endif;?>
                    </td>
                  </tr>
                <?php endforeach?>
                <?php else:?>
                    <tr>
                      <td colspan="7" style="text-align: center;"><?=Yii::t('app', 'Сумма для обработку не добавлено !!!');?></td>
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