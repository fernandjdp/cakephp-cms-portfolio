<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Portfolio[]|\Cake\Collection\CollectionInterface $portfolios
 */
?>
<div class="portfolios index content">
    <?= $this->Html->link(__('New Portfolio'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Portfolios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('show') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($portfolios as $portfolio): ?>
                <tr>
                    <td><?= $this->Number->format($portfolio->id) ?></td>
                    <td><?= h($portfolio->title) ?></td>
                    <td><?= $portfolio->has('user') ? $this->Html->link($portfolio->user->name, ['controller' => 'Users', 'action' => 'view', $portfolio->user->id]) : '' ?></td>
                    <td><?= h($portfolio->slug) ?></td>
                    <td><?= h($portfolio->show) ?></td>
                    <td><?= h($portfolio->created) ?></td>
                    <td><?= h($portfolio->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $portfolio->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $portfolio->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $portfolio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portfolio->id)]) ?>
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
