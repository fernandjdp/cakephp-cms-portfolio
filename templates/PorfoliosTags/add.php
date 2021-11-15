<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PorfoliosTag $porfoliosTag
 * @var \Cake\Collection\CollectionInterface|string[] $portfolios
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Porfolios Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="porfoliosTags form content">
            <?= $this->Form->create($porfoliosTag) ?>
            <fieldset>
                <legend><?= __('Add Porfolios Tag') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
