<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Iten Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int|null $product_id
 * @property int $amount
 * @property string $unitary_value
 * @property string $total_value
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class Iten extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'order_id' => true,
        'product_id' => true,
        'amount' => true,
        'unitary_value' => true,
        'total_value' => true,
        'order' => true,
        'product' => true,
    ];
}
