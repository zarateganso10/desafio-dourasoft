<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $order->has('client') ? $this->Html->link($order->client->name, ['controller' => 'Clients', 'action' => 'view', $order->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($order->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($order->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($order->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Itens') ?></h4>
                <?php if (!empty($order->itens)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Unitary Value') ?></th>
                            <th><?= __('Total Value') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->itens as $itens) : ?>
                        <tr>
                            <td><?= h($itens->id) ?></td>
                            <td><?= h($itens->order_id) ?></td>
                            <td><?= h($itens->product_id) ?></td>
                            <td><?= h($itens->amount) ?></td>
                            <td><?= h($itens->unitary_value) ?></td>
                            <td><?= h($itens->total_value) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Itens', 'action' => 'view', $itens->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Itens', 'action' => 'edit', $itens->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Itens', 'action' => 'delete', $itens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itens->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
