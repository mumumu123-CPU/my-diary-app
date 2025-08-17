<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lab Controller
 *
 */
class LabController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Lab->find();
        $lab = $this->paginate($query);

        $this->set(compact('lab'));
    }

    /**
     * View method
     *
     * @param string|null $id Lab id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lab = $this->Lab->get($id, contain: []);
        $this->set(compact('lab'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lab = $this->Lab->newEmptyEntity();
        if ($this->request->is('post')) {
            $lab = $this->Lab->patchEntity($lab, $this->request->getData());
            if ($this->Lab->save($lab)) {
                $this->Flash->success(__('The lab has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lab could not be saved. Please, try again.'));
        }
        $this->set(compact('lab'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lab id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lab = $this->Lab->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lab = $this->Lab->patchEntity($lab, $this->request->getData());
            if ($this->Lab->save($lab)) {
                $this->Flash->success(__('The lab has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lab could not be saved. Please, try again.'));
        }
        $this->set(compact('lab'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lab id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lab = $this->Lab->get($id);
        if ($this->Lab->delete($lab)) {
            $this->Flash->success(__('The lab has been deleted.'));
        } else {
            $this->Flash->error(__('The lab could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ping()
    {
        $this->autoRender = false;
        echo"Pong!";    
    }

    public function hello()
    {
        // ビューにデータ渡すテスト
        // $this->autoRender = false;
        // echo"Hello World!";
        $message = 'ビューですよ！';
        $this->set(compact('message'));
    }
}
