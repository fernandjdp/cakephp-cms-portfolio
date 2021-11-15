<h1>
    Portfolios tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
<?php foreach ($portfolios as $portfolio): ?>
    <portfolio>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link(
            $portfolio->title,
            ['controller' => 'Portfolios', 'action' => 'view', $portfolio->slug]
        ) ?></h4>
        <span><?= h($portfolio->created) ?></span>
    </portfolio>
<?php endforeach; ?>
</section>