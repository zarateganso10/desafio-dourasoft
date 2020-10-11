<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($product->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Itens') ?></h4>
                <?php if (!empty($product->itens)) : ?>
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
                        <?php foreach ($product->itens as $itens) : ?>
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
