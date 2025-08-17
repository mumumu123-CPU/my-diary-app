<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diaries Controller
 *
 * @property \App\Model\Table\DiariesTable $Diaries
 */
class DiariesController extends AppController
{
    public function initialize(): void
    {
        // 自分用レイアウト
        parent::initialize();

        $this->viewBuilder()->setLayout('my_app');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // ビューで書いたフォーム（GET）を受け取る。
        // タイトル/本文
        $q = $this->request->getQuery('q');
        // 開始日
        $from = $this->request->getQuery('from');
        // 終了日
        $to = $this->request->getQuery('to');

        // データを取得する
        $query = $this->Diaries->find();
        if (!empty($q)) {
            $query->where(['OR' => [['title LIKE' => "%{$q}%"],['body LIKE' => "%{$q}%"]]]);
        }
        if (!empty($from)) {
            $query->where(['entry_date >=' => $from]);
        }
        if (!empty($to)) {
            $query->where(['entry_date <=' => $to]);
        }
        $diaries = $this->paginate($query);
        $this->set(compact('diaries','q','from','to'));
        // デバック
        // debug(compact('q','from','to'));
        
    }

    
    /**
     * View method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diary = $this->Diaries->get($id, contain: []);
        $this->set(compact('diary'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diary = $this->Diaries->newEmptyEntity();
        if ($this->request->is('post')) {
            $diary = $this->Diaries->patchEntity($diary, $this->request->getData());
            if ($this->Diaries->save($diary)) {
                $this->Flash->success(__('日記が登録されました！'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary could not be saved. Please, try again.'));
        }
        $this->set(compact('diary'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diary = $this->Diaries->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diary = $this->Diaries->patchEntity($diary, $this->request->getData());
            if ($this->Diaries->save($diary)) {
                $this->Flash->success(__('更新されました！'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary could not be saved. Please, try again.'));
        }
        $this->set(compact('diary'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diary = $this->Diaries->get($id);
        if ($this->Diaries->delete($diary)) {
            $this->Flash->success(__('The diary has been deleted.'));
        } else {
            $this->Flash->error(__('The diary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
