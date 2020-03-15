<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
    'name' => 'user',
    'uniqueConstraints' =>
        array(
            'UNIQ_8D93D649E7927C74' =>
                array(
                    'columns' =>
                        array(
                            0 => 'email',
                        ),
                ),
        ),
));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
    'fieldName' => 'id',
    'columnName' => 'id',
    'type' => 'integer',
    'nullable' => false,
    'options' =>
        array(
            'unsigned' => false,
        ),
    'id' => true,
));
$metadata->mapField(array(
    'fieldName' => 'email',
    'columnName' => 'email',
    'type' => 'string',
    'nullable' => false,
    'length' => 180,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'roles',
    'columnName' => 'roles',
    'type' => 'text',
    'nullable' => false,
    'length' => 0,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'password',
    'columnName' => 'password',
    'type' => 'string',
    'nullable' => false,
    'length' => 255,
    'options' =>
        array(
            'fixed' => false,
        ),
));
$metadata->mapField(array(
    'fieldName' => 'isActive',
    'columnName' => 'is_active',
    'type' => 'boolean',
    'nullable' => false,
));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);