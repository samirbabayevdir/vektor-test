<?php

use yii\helpers\Url;

?>

<li class="<?= $i == 0 ? 'dropdown__item' : '' ?>">
  <a class="<?= $i == 0 ? 'dropbtn' : '' ?>" href="<?= Url::to(['main/categories/', 'id' => $category['id']]) ?>">
    <?= $category['name'] ?>
  </a>
  <?php if (isset($category['childs'])) : ?>
    <ul class="<?= $i == 0 ? 'dropdown-content' : '' ?>">
      <?= $this->getMenuHtml($category['childs'], $tab = '-', $i + 1) ?>
    </ul>
  <?php endif; ?>
</li>