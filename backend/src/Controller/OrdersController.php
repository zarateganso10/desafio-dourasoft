<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients'],
        ];
        $orders = $this->paginate($this->Orders);

        $response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($orders));

        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Clients', 'Itens'],
        ]);

        if(!$order){
            return $this->response
                ->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode([ "error" => "Order not found"]));
        }else{
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($order));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201);
            }
            return $this->response
                    ->withType('application/json')
                    ->withStatus(400);
        }
        $clients = $this->Orders->Clients->find('list', ['limit' => 200]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200);
            }
            return $this->response
                    ->withType('application/json')
                    ->withStatus(400);
        }
        $clients = $this->Orders->Clients->find('list', ['limit' => 200]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
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
