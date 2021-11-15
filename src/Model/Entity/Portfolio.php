<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

/**
 * Portfolio Entity
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property string $slug
 * @property string $body
 * @property bool $show
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Portfolio extends Entity
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
        'title' => true,
        'user_id' => true,
        'slug' => true,
        'body' => true,
        'show' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'tag_string' => true,
    ];

    protected function _getTagString()
    {
        if (isset($this->_fields['tag_string'])) {
            return $this->_fields['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = new Collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->title . ', ';
        }, '');
        return trim($str, ', ');
    }
}
