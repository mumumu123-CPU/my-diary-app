<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diaries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="diaries form content">
            <?= $this->Form->create($diary) ?>
            <fieldset>
                <legend><?= __('Add Diary') ?></legend>
                <?php
                echo $this->Form->control('entry_date');
                echo $this->Form->control('title');
                echo $this->Form->control('body');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> -->


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 */
?>

<div class="max-w-4xl mx-auto px-4 py-8">
    <!-- 見出し -->
    <div class="mb-6">
        <div class="flex items-center gap-3 text-slate-500">
            <?= $this->Html->link('← ホーム', ['controller' => 'Diaries', 'action' => 'index'], [
                'class' => 'hover:text-slate-700'
            ]) ?>
        </div>
        <h1 class="mt-2 text-2xl font-bold text-slate-900">新しい日記</h1>
        <p class="mt-1 text-slate-500">今日の出来事を記録しましょう</p>
    </div>

    <!-- カード -->
    <div class="rounded-3xl border border-slate-200 bg-white shadow-sm p-5 md:p-7">
        <?php
        echo $this->Form->create($diary);

        // 日付
        echo $this->Form->control('entry_date', [
            'type' => 'date',
            'label' => '日付',
            'class' => 'w-full rounded-2xl border border-slate-300 px-4 py-3 mb-8 text-slate-900 
              placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 
              focus:border-blue-500',
        ]);

        // タイトル
        echo $this->Form->control('title', [
            'label' => 'タイトル',
            'placeholder' => '今日の出来事について…',
            'class' => 'w-full rounded-2xl border border-slate-300 px-4 py-3 mb-8 text-slate-900 
              placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 
              focus:border-blue-500',
        ]);

        // 本文
        echo $this->Form->control('body', [
            'type' => 'textarea',
            'label' => '本文',
            'rows' => 5,
            'placeholder' => '今日はどんな一日でしたか？…',
            'class' => 'w-full rounded-2xl border border-slate-300 px-4 py-3 mb-8 text-slate-900 
              placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 
              focus:border-blue-500',
        ]);

        // ボタン
        echo $this->Form->button('💾 保存する', [
            'class' => 'inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-5 py-2.5 
             text-white font-medium hover:bg-blue-700 disabled:opacity-60',
        ]);

        echo $this->Form->end();
        ?>
    </div>
</div>


