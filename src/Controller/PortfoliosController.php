<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Portfolios Controller
 *
 * @property \App\Model\Table\PortfoliosTable $Portfolios
 * @method \App\Model\Entity\Portfolio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PortfoliosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $portfolios = $this->paginate($this->Portfolios);

        $this->set(compact('portfolios'));
    }

    /**
     * View method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $portfolio = $this->Portfolios->get($id, [
            'contain' => ['Users', 'Tags'],
        ]);

        $this->set(compact('portfolio'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $portfolio = $this->Portfolios->newEmptyEntity();
        $this->Authorization->authorize($portfolio);
        if ($this->request->is('post')) {
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->getData());

            $portfolio->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success(__('The portfolio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
        }

        $users = $this->Portfolios->Users->find('list')->all();
        $tags = $this->Portfolios->Tags->find('list')->all();
        
        $this->set(compact('portfolio', 'users', 'tags'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => ['Tags'],
        ]);
        $this->Authorization->authorize($portfolio);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->getData(), [
            // Added: Disable modification of user_id.
            'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success(__('The portfolio has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The portfolio could not be updated. Please, try again.'));
        }
        $users = $this->Portfolios->Users->find('list')->all();
        $tags = $this->Portfolios->Tags->find('list')->all();

        $this->set(compact('portfolio', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $portfolio = $this->Portfolios->get($id);
        $this->Authorization->authorize($portfolio);
        if ($this->Portfolios->delete($portfolio)) {
            $this->Flash->success(__('The portfolio has been deleted.'));
        } else {
            $this->Flash->error(__('The portfolio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function tags()
    {
        $this->Authorization->skipAuthorization();
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->getParam('pass');

        // Use the ArticlesTable to find tagged portfolios.
        $portfolios = $this->Portfolios->find('tagged', [
                'tags' => $tags
            ])
            ->all();

        // Pass variables into the view template context.
        $this->set([
            'portfolios' => $portfolios,
            'tags' => $tags
        ]);
    }
}
