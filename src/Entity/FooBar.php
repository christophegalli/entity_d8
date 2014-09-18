<?php
/**
 * @file
 * Contains \Drupal\foo_bar\Entity\FooBar.
 */

namespace Drupal\foo_bar\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\foo_bar\FooBarInterface;

/**
 * Defines the Foo Bar entity.
 *
 * @ContentEntityType(
 *   id = "foo_bar",
 *   label = @Translation("FooBar entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\foo_bar\Entity\FooBarViewBuilder",
 *     "list_builder" = "Drupal\foo_bar\Entity\FooBarListBuilder",
 *
 *     "form" = {
 *       "add" = "Drupal\foo_bar\Entity\Form\FooBarForm",
 *       "edit" = "Drupal\foo_bar\Entity\Form\FooBarForm",
 *       "delete" = "Drupal\foo_bar\Entity\Form\FooBarDeleteForm",
 *     },
 *     "translation" = "Drupal\content_translation\ContentTranslationHandler"
 *   },
 *   base_table = "foo_bar",
 *   admin_permission = "admin_foo_bar",
 *   fieldable = TRUE,
 *   translatable = TRUE,
 *   entity_keys = {
 *     "id" = "fbid",
 *     "label" = "name",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "edit-form" = "foo_bar.edit",
 *     "admin-form" = "foo_bar.settings",
 *     "delete-form" = "foo_bar.delete"
 *   }
 * )
 */
class FooBar extends ContentEntityBase implements FooBarInterface {

  /**
   * {@inheritdoc}
   */
  public function id() {
    return $this->get('fbid')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getFooBarField() {
    return $this->foo_bar_field->value;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields['fbid'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the FooBar entity.'))
      ->setReadOnly(TRUE);
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the FooBar entity.'))
      ->setReadOnly(TRUE);
    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of theFooBar entity.'));
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the FooBar entity.'))
      ->setTranslatable(TRUE)
      ->setPropertyConstraints('value', array('Length' => array('max' => 32)));
    $fields['type'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Type'))
      ->setDescription(t('The bundle of the FooBar entity.'))
      ->setRequired(TRUE);
    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User ID'))
      ->setDescription(t('The ID of the associated user.'))
      ->setSettings(array('target_type' => 'user'))
      ->setTranslatable(TRUE);
    $fields['foo_bar_field'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First FooBar Field'))
      ->setDescription(t('One field of the FooBar entity.'))
      ->setTranslatable(TRUE)
      ->setPropertyConstraints('value', array('Length' => array('max' => 32)));
    return $fields;
  }
}
