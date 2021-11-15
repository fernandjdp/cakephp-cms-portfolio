<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Portfolio $portfolio
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Portfolios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="portfolios form content">
            <?= $this->Form->create($portfolio) ?>
            <fieldset>
                <legend><?= __('Add Portfolio') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('slug');
                    echo $this->Form->control('body');
                    echo $this->Form->control('show');
                    echo $this->Form->control('tag_string', ['type' => 'text']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
