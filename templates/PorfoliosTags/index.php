<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PorfoliosTag[]|\Cake\Collection\CollectionInterface $porfoliosTags
 */
?>
<div class="porfoliosTags index content">
    <?= $this->Html->link(__('New Porfolios Tag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Porfolios Tags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('porfolio_id') ?></th>
                    <th><?= $this->Paginator->sort('tag_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($porfoliosTags as $porfoliosTag): ?>
                <tr>
                    <td><?= $porfoliosTag->has('portfolio') ? $this->Html->link($porfoliosTag->portfolio->title, ['controller' => 'Portfolios', 'action' => 'view', $porfoliosTag->portfolio->id]) : '' ?></td>
                    <td><?= $porfoliosTag->has('tag') ? $this->Html->link($porfoliosTag->tag->title, ['controller' => 'Tags', 'action' => 'view', $porfoliosTag->tag->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $porfoliosTag->porfolio_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $porfoliosTag->porfolio_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $porfoliosTag->porfolio_id], ['confirm' => __('Are you sure you want to delete # {0}?', $porfoliosTag->porfolio_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
