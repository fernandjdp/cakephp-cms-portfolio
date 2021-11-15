<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PorfoliosTags Model
 *
 * @property \App\Model\Table\PortfoliosTable&\Cake\ORM\Association\BelongsTo $Portfolios
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\PorfoliosTag newEmptyEntity()
 * @method \App\Model\Entity\PorfoliosTag newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PorfoliosTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PorfoliosTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\PorfoliosTag findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PorfoliosTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PorfoliosTag[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PorfoliosTag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PorfoliosTag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PorfoliosTag[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PorfoliosTag[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PorfoliosTag[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PorfoliosTag[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PorfoliosTagsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('porfolios_tags');
        $this->setDisplayField(['porfolio_id', 'tag_id']);
        $this->setPrimaryKey(['porfolio_id', 'tag_id']);

        $this->belongsTo('Portfolios', [
            'foreignKey' => 'porfolio_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('porfolio_id', 'Portfolios'), ['errorField' => 'porfolio_id']);
        $rules->add($rules->existsIn('tag_id', 'Tags'), ['errorField' => 'tag_id']);

        return $rules;
    }
}
