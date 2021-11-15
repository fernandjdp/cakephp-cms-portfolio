<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PorfoliosTag $porfoliosTag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Porfolios Tag'), ['action' => 'edit', $porfoliosTag->porfolio_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Porfolios Tag'), ['action' => 'delete', $porfoliosTag->porfolio_id], ['confirm' => __('Are you sure you want to delete # {0}?', $porfoliosTag->porfolio_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Porfolios Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Porfolios Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="porfoliosTags view content">
            <h3><?= h($porfoliosTag->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Portfolio') ?></th>
                    <td><?= $porfoliosTag->has('portfolio') ? $this->Html->link($porfoliosTag->portfolio->title, ['controller' => 'Portfolios', 'action' => 'view', $porfoliosTag->portfolio->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tag') ?></th>
                    <td><?= $porfoliosTag->has('tag') ? $this->Html->link($porfoliosTag->tag->title, ['controller' => 'Tags', 'action' => 'view', $porfoliosTag->tag->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
