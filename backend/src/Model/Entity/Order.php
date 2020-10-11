<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $client_id
 * @property \Cake\I18n\FrozenTime $date
 * @property string $status
 * @property string $total
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Iten[] $itens
 */
class Order extends Entity
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
        'client_id' => true,
        'date' => true,
        'status' => true,
        'total' => true,
        'client' => true,
        'itens' => true,
    ];
}
