<?php
/**
 * @author Maks_pl
 * @link http://latipro.co.ua/
 * @copyright 2020 Latipro
 * @date 21.02.2020
 */
/* @var $this \yii\web\View */
/* @var $model \skeeks\cms\tag\models\Tag */

use frontend\widgets\contentElements\LatiContentElementsCmsWidget;
use common\models\ObjectProject;
use skeeks\cms\components\Cms;

$tagId = $model->id;
?>
<section class="wrapper page page_search">
    <section class="container pagebody">
        <main class="wrapper pagecontent" role="main">
            <h1 class="articletitle"><?=\Yii::t('app', 'Поиск по тегу');?> #<?=$model->name; ?></h1>
            <div class="page_search__result">
                <div class="page_search__result">
    <?php echo LatiContentElementsCmsWidget::widget([
        'namespace'            => 'ContentElementsCmsWidget-search-tag',
        'viewFile'             => '@app/views/widgets/ContentElementsCmsWidget/blogs',
        'content_ids'          => ObjectProject::$contentAllow,
        'enabledCurrentTree'   => \skeeks\cms\components\Cms::BOOL_N,
        'enabledRunCache'      => \skeeks\cms\components\Cms::BOOL_N,
        'dataProviderCallback' => function ($dataProvider) use ($tagId) {
            $dataProvider->query->innerJoin('tag_links', 'tag_links.element_id = cms_content_element.id AND tag_links.tag_id = :tid', ['tid' => $tagId]);
            $dataProvider->totalCount = $dataProvider->query->count();
        },
    ]); ?>
                </div>
            </div>
        </main>
    </section>
    <?= $this->render('@template/include/material/materialSidebar')?>
</section>