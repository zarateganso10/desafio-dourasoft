<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iten $iten
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Iten'), ['action' => 'edit', $iten->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Iten'), ['action' => 'delete', $iten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Iten'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens view content">
            <h3><?= h($iten->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $iten->has('order') ? $this->Html->link($iten->order->id, ['controller' => 'Orders', 'action' => 'view', $iten->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $iten->has('product') ? $this->Html->link($iten->product->name, ['controller' => 'Products', 'action' => 'view', $iten->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($iten->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($iten->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unitary Value') ?></th>
                    <td><?= $this->Number->format($iten->unitary_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Value') ?></th>
                    <td><?= $this->Number->format($iten->total_value) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
