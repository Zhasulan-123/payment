<?php
use yii\helpers\Html;
?>

<?php if(!empty($session)):?>
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
    <td colspan="4"><?=Yii::t('app', 'На сумму:');?> </td>
    <td><?= Html::encode($session['paying.price']);?></td>
</tr>
<?php else:?>
    <tr>
    <td colspan="5" style="text-align: center;"><?=Yii::t('app', 'Сумма не добавлено !!!');?></td>
    </tr>
<?php endif;?>