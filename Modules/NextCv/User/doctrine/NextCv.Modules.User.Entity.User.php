<?php

use Doctrine\ORM\Mapping\ClassMetadata;
use NextCv\Modules\User\Entity\User;


/** @var ClassMetadata $metadata */
$metadata->setInheritanceType(ClassMetadata::INHERITANCE_TYPE_NONE);
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
$metadata->setChangeTrackingPolicy(ClassMetadata::CHANGETRACKING_DEFERRED_IMPLICIT);

$metadata->mapManyToMany([
    'fieldName' => 'friendsWithMe',
    'targetEntity' => User::class,
    'mappedBy' => "myFriends"
]);


$metadata->mapManyToMany([
    'fieldName' => 'myFriends',
    'targetEntity' => User::class,
    'inversedBy' => "friendsWithMe",
    'joinTable' =>
        [
            'name' => 'users_friends',
            'joinColumns' => [
                [
                    'name' => 'user_id',
                    'referencedColumnName' => 'id'
                ],
            ],
            'inverseJoinColumns' => [
                [
                    'name' => 'friend_user_id',
                    'referencedColumnName' => 'id'
                ],
            ]
        ]
]);


//$metadata->mapField(array(
//    'fieldName' => 'friendsWithMe',
//    'manyToMany'
//));

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
$metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_IDENTITY);