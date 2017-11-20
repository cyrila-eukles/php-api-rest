<?php

namespace Eukles\Entity;

use Eukles\Action\ActionInterface;
use Eukles\Container\ContainerInterface;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Map\TableMap;

/**
 * Interface ActiveRecordRequestInterface
 *
 * @package Core\Model
 */
interface EntityRequestInterface
{

    /**
     * ActiveRecordRequestTrait constructor.
     *
     * @param ContainerInterface $c
     */
    public function __construct(ContainerInterface $c);

    /**
     * Set state of the object after request data hydration
     *
     * @param ActiveRecordInterface $obj
     *
     */
    public function afterCreate(ActiveRecordInterface $obj);

    /**
     * Set state of the object after request data hydration
     *
     * @param ActiveRecordInterface $obj
     *
     */
    public function afterFetch(ActiveRecordInterface $obj);

    /**
     * Set state of the object before request data hydration
     *
     * @param ActiveRecordInterface $obj
     *
     */
    public function beforeCreate(ActiveRecordInterface $obj);

    /**
     * Set state of the object before request data hydration
     *
     * @param ModelCriteria $query
     *
     * @return ModelCriteria
     *
     */
    public function beforeFetch(ModelCriteria $query);

    /**
     *
     * @return string|ActionInterface
     */
    public function getActionClassName();

    /**
     * List data usable from request, may vary according to HTTP verb
     *
     * @param array $requestParams
     * @param string $httpMethod
     *
     * @return array
     */
    public function getAllowedDataFromRequest(array $requestParams, $httpMethod);

    /**
     * @return ContainerInterface
     */
    public function getContainer();

    /**
     * None, all or partial list of properties
     *
     * @return array List of exposed properties
     */
    public function getExposedProperties();

    /**
     * None, all or partial list of relations
     *
     * @return array List of exposed relations
     */
    public function getExposedRelations();

    /**
     * None, all or partial list of properties
     *
     * @return array List of modifiable properties
     */
    public function getModifiableProperties();

    /**
     *
     * @param bool $plural
     *
     * @return string
     */
    public function getNameOfParameterToAdd($plural = false);

    /**
     * @return mixed
     */
    public function getPrimaryKey();

    /**
     * Gets a RelationMap of the table by relation name
     * This method will build the relations if they are not built yet
     *
     * @param  string $relation The relation name
     *
     * @return \Propel\Runtime\Map\RelationMap                         The relation object
     * @throws \Propel\Runtime\Map\Exception\RelationNotFoundException When called on an inexistent relation
     */
    public function getRelation($relation);

    /**
     * Gets the type of the relation (on to one, one to many ...)
     *
     * @param  string $relation The relation name
     *
     * @return string Type of the relation (on to one, one to many ...)
     *
     */
    public function getRelationType($relation);

    /**
     * @return \Propel\Runtime\Map\RelationMap[] array
     *
     */
    public function getRelations();

    /**
     * Gets names of the relations in CAMELNAME format (e.g. "myRelation")
     *
     * @return array
     */
    public function getRelationsNames();

    /**
     * None, all or partial list of properties
     *
     * @return array List of writable properties
     */
    public function getRequiredWritableProperties();

    /**
     * @return TableMap
     */
    public function getTableMap();

    /**
     * None, all or partial list of properties
     *
     * @return array List of writable properties
     */
    public function getWritableProperties();

    /**
     * @return bool
     */
    public function hasRelations();

    /**
     * @return ActiveRecordInterface
     */
    public function instantiateActiveRecord();

    /**
     * Does this relation is plural ?
     *
     * @param string $relation Name of the relation in CAMELNAME format (e.g. "myRelation")
     *
     * @return bool
     * @throws \Propel\Runtime\Map\Exception\RelationNotFoundException When called on an inexistent relation
     */
    public function isPluralRelation($relation);

    /**
     * Does this property is a relation ?
     *
     * @param string $relation Name of the relation in CAMELNAME format (e.g. "myRelation")
     *
     * @return bool
     */
    public function isRelation($relation);

    /**
     * @param $name
     *
     * @return bool
     */
    public function isRelationManyToOne($name);

    /**
     * @param $name
     *
     * @return bool
     */
    public function isRelationOneToMany($name);

    /**
     * @param $name
     *
     * @return bool
     */
    public function isRelationOneToOne($name);

    /**
     * @param array|int $pk
     *
     * @return EntityRequestInterface
     */
    public function setPrimaryKey($pk);

    /**
     * @return ActiveRecordInterface|string
     */
    public function getActiveRecordClassName();
}
