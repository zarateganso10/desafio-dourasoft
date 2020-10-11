<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iten[]|\Cake\Collection\CollectionInterface $itens
 */
?>
<div class="itens index content">
    <?= $this->Html->link(__('New Iten'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Itens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('unitary_value') ?></th>
                    <th><?= $this->Paginator->sort('total_value') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $iten): ?>
                <tr>
                    <td><?= $this->Number->format($iten->id) ?></td>
                    <td><?= $iten->has('order') ? $this->Html->link($iten->order->id, ['controller' => 'Orders', 'action' => 'view', $iten->order->id]) : '' ?></td>
                    <td><?= $iten->has('product') ? $this->Html->link($iten->product->name, ['controller' => 'Products', 'action' => 'view', $iten->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($iten->amount) ?></td>
                    <td><?= $this->Number->format($iten->unitary_value) ?></td>
                    <td><?= $this->Number->format($iten->total_value) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $iten->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $iten->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $iten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
