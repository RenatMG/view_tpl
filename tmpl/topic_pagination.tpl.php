<?php //PhpDoc ?>
<?php /** @var array $tp */ ?>
<div class="content__pagination">
    <?php foreach ($tp as $item): ?>
        <a href="#"><?= HelperHtml::secureParams($item) ?></a>
    <?php endforeach; ?>
</div>
