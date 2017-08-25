<?php //PhpDoc ?>
<?php /** @var string $text */ ?>
<?php /** @var string $article_1 */ ?>
<?php /** @var string $article_2 */ ?>

<p class="content__headers">Заголовок статьи</p>
<p class="content__text"><?= (!empty($text)) ? $text : 'Текст по умолчанию' ?></p>
<p class="content__text"></p>
<p class="content__text"></p>
<p class="content__text"><?= HelperHtml::secureParams($article_1) ?></p>
<p class="content__text"><?= HelperHtml::secureParams($article_2) ?></p>
<p class="content__date">Дата и время</p>
<hr>