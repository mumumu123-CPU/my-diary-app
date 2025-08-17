<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diary'), ['action' => 'edit', $diary->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diary'), ['action' => 'delete', $diary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diaries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diary'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="diaries view content">
            <h3><?= h($diary->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($diary->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diary->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Entry Date') ?></th>
                    <td><?= h($diary->entry_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($diary->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($diary->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($diary->body)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>

