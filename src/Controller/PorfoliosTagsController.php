<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PorfoliosTags Controller
 *
 * @property \App\Model\Table\PorfoliosTagsTable $PorfoliosTags
 * @method \App\Model\Entity\PorfoliosTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PorfoliosTagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Portfolios', 'Tags'],
        ];
        $porfoliosTags = $this->paginate($this->PorfoliosTags);

        $this->set(compact('porfoliosTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Porfolios Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $porfoliosTag = $this->PorfoliosTags->get($id, [
            'contain' => ['Portfolios', 'Tags'],
        ]);

        $this->set(compact('porfoliosTag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $porfoliosTag = $this->PorfoliosTags->newEmptyEntity();
        if ($this->request->is('post')) {
            $porfoliosTag = $this->PorfoliosTags->patchEntity($porfoliosTag, $this->request->getData());
            if ($this->PorfoliosTags->save($porfoliosTag)) {
                $this->Flash->success(__('The porfolios tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The porfolios tag could not be saved. Please, try again.'));
        }
        $portfolios = $this->PorfoliosTags->Portfolios->find('list', ['limit' => 200])->all();
        $tags = $this->PorfoliosTags->Tags->find('list', ['limit' => 200])->all();
        $this->set(compact('porfoliosTag', 'portfolios', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Porfolios Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $porfoliosTag = $this->PorfoliosTags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $porfoliosTag = $this->PorfoliosTags->patchEntity($porfoliosTag, $this->request->getData());
            if ($this->PorfoliosTags->save($porfoliosTag)) {
                $this->Flash->success(__('The porfolios tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The porfolios tag could not be saved. Please, try again.'));
        }
        $portfolios = $this->PorfoliosTags->Portfolios->find('list', ['limit' => 200])->all();
        $tags = $this->PorfoliosTags->Tags->find('list', ['limit' => 200])->all();
        $this->set(compact('porfoliosTag', 'portfolios', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Porfolios Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $porfoliosTag = $this->PorfoliosTags->get($id);
        if ($this->PorfoliosTags->delete($porfoliosTag)) {
            $this->Flash->success(__('The porfolios tag has been deleted.'));
        } else {
            $this->Flash->error(__('The porfolios tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
