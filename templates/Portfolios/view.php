<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Portfolio $portfolio
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Portfolio'), ['action' => 'edit', $portfolio->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Portfolio'), ['action' => 'delete', $portfolio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portfolio->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Portfolios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Portfolio'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="portfolios view content">
            <h3><?= h($portfolio->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($portfolio->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $portfolio->has('user') ? $this->Html->link($portfolio->user->name, ['controller' => 'Users', 'action' => 'view', $portfolio->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($portfolio->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($portfolio->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($portfolio->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($portfolio->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Show') ?></th>
                    <td><?= $portfolio->show ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($portfolio->body)); ?>
                </blockquote>
            </div>
            
            <!-- Tags -->
            <p><b>Tags:</b> <?= h($article->tag_string) ?></p>

        </div>
    </div>
</div>
