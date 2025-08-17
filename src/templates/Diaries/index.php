<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Diary> $diaries
 */
?>
<!-- <div class="diaries index content">
    <?= $this->Html->link(__('New Diary'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diaries') ?></h3>

    

    
    <?= $this->Form->create(null, ['type' => 'get']) ?>
        <?= $this->Form->control('q', ['label' => false, 'placeholder' => '検索', 'value' => $q ?? '',]) ?>
        <?= $this->Form->control('from', ['type' => 'date', 'label' => '自', 'value' => $from ?? '', 'empty' => true]) ?>
        <?= $this->Form->control('to', ['type' => 'date', 'label' => '至', 'value' => $to ?? '', 'empty' => true]) ?>
        <?= $this->Form->button('検索') ?>
    <?= $this->Form->end() ?>

    
    <div>
        <tr>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('entry_date') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diaries as $diary): ?>
                <tr>
                    <td><?= $this->Number->format($diary->id) ?></td>
                    <td><?= h($diary->entry_date) ?></td>
                    <td><?= h($diary->title) ?></td>
                    <td><?= h($diary->created) ?></td>
                    <td><?= h($diary->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diary->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diary->id]) ?>
                        <?= $this->Form->postLink(
                          __('Delete'),
                          ['action' => 'delete', $diary->id],
                          [
                            'method' => 'delete',
                            'confirm' => __('Are you sure you want to delete # {0}?', $diary->id),
                          ]
                        ) ?>
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
</div> -->

<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

    <!-- 検索バー -->
    <div class="flex justify-center mb-10">
      <?= $this->Form->create(null, ['type' => 'get', 'class' => 'flex gap-2']) ?>
      <?= $this->Form->control('q', [
        'label' => false,
        'placeholder' => 'タイトルや内容で検索',
        'value' => $q ?? '',
        'class' => 'rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500'
      ]) ?>
      <?= $this->Form->control('from', [
        'type' => 'date',
        'label' => false,
        'value' => $from ?? '',
        'empty' => true,
        'class' => 'rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500'
      ]) ?>
      <span class="flex items-center text-gray-500 text-lg">~</span>
      <?= $this->Form->control('to', [
        'type' => 'date',
        'label' => false,
        'value' => $to ?? '',
        'empty' => true,
        'class' => 'rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500'
      ]) ?>
      <?= $this->Form->button('検索', [
        'class' => 'rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700'
      ]) ?>
      <?= $this->Form->end() ?>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 md:gap-8 xl:grid-cols-3">
      <?php foreach ($diaries as $diary): ?>
        <div class="flex flex-col rounded-lg border border-gray-200 p-4 md:p-6">
          <!-- 日付 -->
          <h3 class="mb-1 text-sm font-medium text-gray-400"><?= h($diary->entry_date) ?></h3>
          <!-- タイトル -->
          <p class="mb-2 text-lg font-semibold md:text-xl">
            <?= h($diary->title) ?>
          </p>
          <!-- 本文ダイジェスト -->
          <p class="mb-4 text-gray-500">
            <?= h($this->Text->truncate($diary->body, 110, ['exact' => false, 'ellipsis' => '…'])) ?>
          </p>
          <!-- 詳細へ -->
          <?= $this->Html->link(
            'もっと見る',
            ['action' => 'edit', $diary->id],
            ['class' => 'mt-auto font-bold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700']
          ) ?>
        </div>
      <?php endforeach; ?>
      <?php if (empty($diaries)): ?>
        <div class="col-span-full text-center text-gray-500 py-10">データがありません</div>
      <?php endif; ?>
    </div>

    <!-- ページネーション -->
    <div class="mt-8 flex justify-center">
      <ul class="flex items-center space-x-1 text-sm">
        <!-- 前へ -->
        <?= $this->Paginator->prev('‹', ['escape' => false, 'class' => 'px-3 py-1 border text-lg rounded-md hover:bg-gray-100']) ?>
        <!-- ページ番号 -->
        <?= $this->Paginator->numbers([
          'before' => false,
          'after' => false,
          'modulus' => 3,
          'templates' => [
            'number' => '<li><a href="{{url}}" class="px-3 py-1 border rounded-md hover:bg-gray-100">{{text}}</a></li>',
            'current' => '<li><span class="px-3 py-1 border rounded-md bg-blue-600 text-white">{{text}}</span></li>',
          ]
        ]) ?>
        <!-- 次へ -->
        <?= $this->Paginator->next('›', ['escape' => false, 'class' => 'px-3 py-1 border text-lg rounded-md hover:bg-gray-100']) ?>
      </ul>
    </div>

  </div>
</div>