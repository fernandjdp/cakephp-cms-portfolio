<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PorfoliosTag $porfoliosTag
 * @var string[]|\Cake\Collection\CollectionInterface $portfolios
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $porfoliosTag->porfolio_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $porfoliosTag->porfolio_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Porfolios Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="porfoliosTags form content">
            <?= $this->Form->create($porfoliosTag) ?>
            <fieldset>
                <legend><?= __('Edit Porfolios Tag') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
