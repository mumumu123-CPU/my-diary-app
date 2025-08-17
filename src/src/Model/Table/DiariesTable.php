<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diaries Model
 *
 * @method \App\Model\Entity\Diary newEmptyEntity()
 * @method \App\Model\Entity\Diary newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Diary> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diary get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Diary findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Diary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Diary> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diary|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Diary saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Diary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diary>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Diary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diary> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Diary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diary>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Diary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Diary> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DiariesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('diaries');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            // 形式に沿ってるか確認
            ->date('entry_date',['ymd'],'日付の形式が正しくありません')
            // キーがあるかを確認（第２引数はwhen。いつ実行するかを指定。なければ、常時ということになる）
            ->requirePresence('entry_date', 'create','日付は必須です')
            // キーの値が空でないかを確認
            ->notEmptyDate('entry_date','日付は必須です');

        $validator
            // 値がスカラ型（配列やオブジェクトはNG）
            ->scalar('title')
            // 文字数の上限を設定
            ->maxLength('title', 120,'タイトルは120文字以内で入力してください')
            // キーがあるかを確認
            ->requirePresence('title', 'create','タイトルは必須です')
            // キーの中身が空でないかを確認
            ->notEmptyString('title','タイトルは必須です')
            ->add('title','noScript',[
                'rule' => function ($inputTitleText) {
                    $titleText = (string)$inputTitleText;
                    $scriptPos = stripos($titleText,'<script');
                    return $scriptPos === false;
                },
                'message' => 'スクリプトは入力できません',
            ]);
            

        $validator
            // スカラ型であるか。
            ->scalar('body')
            // 文字数の上限を設定
            ->maxLength('body',2000,'本文は2000文字以内で入力してください')
            // キーがあるかを確認
            ->requirePresence('body', 'create','本文は必須です')
            //  キーの中身が空でないかを確認
            ->notEmptyString('body','本文は必須です')
            // スクリプトの保存を止める
            ->add('body','noScript',[
               'rule' => function ($inputBodyText) {
                    $bodyText = (string)$inputBodyText;
                    $scriptPos = stripos($bodyText,'<script');

                    return $scriptPos === false;
               },
                'message' => 'スクリプトは入力できません',
            ]);

        return $validator;
    }
}
