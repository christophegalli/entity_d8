<?php
/**
 * @file
 * Contains \Drupal\foo_bar\FooBarInterface.
 */

namespace Drupal\foo_bar;
use Drupal\Core\Entity\EntityInterface;
/**
 * Provides an interface defining a Foo Bar entity.
 */
interface FooBarInterface extends EntityInterface {
  /**
   * Returns the identifier.
   *
   * @return int
   *   The entity identifier.
   */
  public function id();
  /**
   * Returns the entity UUID (Universally Unique Identifier).
   *
   * The UUID is guaranteed to be unique and can be used to identify an entity
   * across multiple systems.
   *
   * @return string
   *   The UUID of the entity.
   */
  public function getUuid();
  /**
   * Return the Value of Foo Bar uuid.
   *
   * @return uuid
   *   The uuid.
   */
  public function getFooBarField();
  /**
   * Defines the base fields of the entity type.
   *
   * @param string $entity_type
   *   Name of the entity type
   *
   * @return \Drupal\Core\Field\FieldDefinitionInterface[]
   *   An array of entity field definitions, keyed by field name.
   */
  public static function baseFieldDefinitions($entity_type);
}
