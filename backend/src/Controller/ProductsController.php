<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $products = $this->paginate($this->Products);

        $response = $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($products));

        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Itens'],
        ]);

        if(!$product){
            return $this->response
                ->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode([ "error" => "Product not found"]));
        }else{
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($product));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(201);
            }
            return $this->response
                    ->withType('application/json')
                    ->withStatus(400);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                return $this->response
                    ->withType('application/json')
                    ->withStatus(200);
            }
            return $this->response
                    ->withType('application/json')
                    ->withStatus(400);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
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
