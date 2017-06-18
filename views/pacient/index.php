<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('hospital', 'All records');

$this->registerJs("
    $(document).on('change', '.record-change-status input', function() {
        $.post($(this).parents('.record-change-status').data('action'),
            {update: true, id: $(this).parents('.record-change-status').data('id'), status: $(this).val(), '" . yii::$app->request->csrfParam . "': '" . yii::$app->request->csrfToken . "'},
            function (answer) {
                
            }
        );
    });
");

?>

<h2><?= Html::encode($this->title) ?></h2>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'status',
                $searchModel->getStatuses(),
                ['class' => 'form-control', 'prompt' => yii::t('hospital', 'Status')]
            ),
            'content' => function($model) {
                return Html::tag('div', Html::radioList('status' . $model->id, $model->status, $model->getStatuses()), ['class' => 'record-change-status', 'data-action' => Url::toRoute(['/hospital/pacient/update-status']), 'data-id' => $model->id]);
            },
        ],
        'name',
        'family',
        'phone',
        'email',
        'date',
        'time',
    ]
]); ?>