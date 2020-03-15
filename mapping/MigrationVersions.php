<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'migration_versions',
  ));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'version',
   'columnName' => 'version',
   'type' => 'string',
   'nullable' => false,
   'length' => 14,
   'options' => 
   array(
   'fixed' => false,
   ),
   'id' => true,
  ));
$metadata->mapField(array(
   'fieldName' => 'executedAt',
   'columnName' => 'executed_at',
   'type' => 'datetime_immutable',
   'nullable' => false,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);