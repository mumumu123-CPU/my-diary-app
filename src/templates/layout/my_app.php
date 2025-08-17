<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->css('app') ?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- tailwindcssに切り替えるためにコメントアウト -->
    <!-- <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header
        class="sticky top-0 z-40 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60 border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="grid place-items-center w-9 h-9 rounded-xl bg-blue-600 text-white text-lg">📘</div>
                <div class="text-xl font-semibold">
                    <?= $this->Html->link('私の日記', ['controller' => 'Diaries', 'action' => 'index']) ?>
                </div>
            </div>

            <?= $this->Html->link('＋ 新規作成', ['controller' => 'Diaries', 'action' => 'add'], [
                'class' => 'inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-xl'
            ]) ?>
        </div>

        <?php if ($this->fetch('toolbar')): ?>
            <div class="max-w-6xl mx-auto px-4 pb-4">
                <?= $this->fetch('toolbar') ?>
            </div>
        <?php endif; ?>
    </header>

    <main class="py-8 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="text-blue-600 font-semibold">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-4">
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="border-t border-gray-200 py-8 text-slate-500">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between text-sm">
            <div>© <?= date('Y') ?> 私の日記 — H.R</div>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-slate-700">プライバシーポリシー</a>
                <a href="#" class="hover:text-slate-700">利用規約</a>
                <a href="#" class="hover:text-slate-700">GitHub</a>
            </div>
        </div>
        <p class="mt-6 text-center text-xs">
            あなたの思い出を安全に記録し、いつでも振り返ることができます。<br>
            日々の出来事を大切に保存して、成長の軌跡を残しましょう。
        </p>
    </footer>
</body>

</html>