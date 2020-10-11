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
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens form content">
            <?= $this->Form->create($iten) ?>
            <fieldset>
                <legend><?= __('Add Iten') ?></legend>
                <?php
                    echo $this->Form->control('order_id', ['options' => $orders]);
                    echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('unitary_value');
                    echo $this->Form->control('total_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
