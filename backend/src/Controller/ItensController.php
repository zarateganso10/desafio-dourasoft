<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Itens Controller
 *
 * @property \App\Model\Table\ItensTable $Itens
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Products'],
        ];
        $itens = $this->paginate($this->Itens);

        $response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($itens));

        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Iten id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $iten = $this->Itens->get($id, [
            'contain' => ['Orders', 'Products'],
        ]);

        if(!$iten){
            return $this->response
                ->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode([ "error" => "iten not found"]));
        }else{
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($iten));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $iten = $this->Itens->newEmptyEntity();
        if ($this->request->is('post')) {
            $iten = $this->Itens->patchEntity($iten, $this->request->getData());
            if ($this->Itens->save($iten)) {
                return $this->response
                ->withType('application/json')
                ->withStatus(201);
            }
            return $this->response
                ->withType('application/json')
                ->withStatus(400);
        }
        $orders = $this->Itens->Orders->find('list', ['limit' => 200]);
        $products = $this->Itens->Products->find('list', ['limit' => 200]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Iten id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $iten = $this->Itens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $iten = $this->Itens->patchEntity($iten, $this->request->getData());
            if ($this->Itens->save($iten)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200);
            }
            return $this->response
                ->withType('application/json')
                ->withStatus(400);
        }
        $orders = $this->Itens->Orders->find('list', ['limit' => 200]);
        $products = $this->Itens->Products->find('list', ['limit' => 200]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Iten id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $iten = $this->Itens->get($id);
        if ($this->Itens->delete($iten)) {
            return $this->response
                ->withType('application/json')
                ->withStatus(200);
        } else {
            return $this->response
                ->withType('application/json')
                ->withStatus(400);
        }
    }
}
