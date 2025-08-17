<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateDiaries extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        // 今回はチェーン記法ではなく、デフォルトの分割記法を使用する。
        $table = $this->table('diaries');
        //入力日
        $table->addColumn('entry_date', 'date', [
            'null' => false,
        ]);
        // タイトル
        $table->addColumn('title', 'string', [
            'limit' => 120,
            'null' => false,
        ]);
        // 本文
        $table->addColumn('body', 'text', [
            'null' => false,
        ]);
        // 作成日
        $table->addColumn('created','datetime',[
            'null'=>true
        ]);
        // 編集日
        $table->addColumn('modified','datetime',[
            'null'=>true
        ]);
        // 検索するため
        $table->addIndex(['entry_date']);
        $table->addIndex(['title']);
        $table->addIndex(['created']);

        $table->create();
    }
}
