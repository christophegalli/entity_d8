<?php
/**
 * @file
 * Contains \Drupal\foo_bar\Entity\FooBar.
 */

namespace Drupal\foo_bar\Entity;
use Drupal\Core\Entity\EntityStorageControllerInterface;
use Drupal\Core\Field\FieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\foo_bar\FooBarInterface;
use Drupal\Core\Entity\EntityTypeInterface;
/**
 * Defines the Foo Bar entity.
 *
 * @ContentEntityType(
 *   id = "foo_bar",
 *   label = @Translation("FooBar entity"),
 *   controllers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list" = "Drupal\foo_bar\Entity\Controller\FooBarListController",
 *
 *     "form" = {
 *       "add" = "Drupal\foo_bar\Entity\Form\FooBarFormController",
 *       "edit" = "Drupal\foo_bar\Entity\Form\FooBarFormController",
 *       "delete" = "Drupal\foo_bar\Entity\Form\FooBarDeleteForm",
 *     },
 *     "translation" = "Drupal\content_translation\ContentTranslationController"
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
  public static function preCreate(EntityStorageControllerInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += array(
      'user_id' => \Drupal::currentUser()->id(),
    );
  }


  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['fbid'] = FieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the FooBar entity.'))
      ->setReadOnly(TRUE);
    $fields['uuid'] = FieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the FooBar entity.'))
      ->setReadOnly(TRUE);
    $fields['langcode'] = FieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of theFooBar entity.'));
    $fields['name'] = FieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the FooBar entity.'))
      ->setTranslatable(TRUE)
      ->setPropertyConstraints('value', array('Length' => array('max' => 32)))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['type'] = FieldDefinition::create('string')
      ->setLabel(t('Type'))
      ->setDescription(t('The bundle of the FooBar entity.'))
      ->setRequired(TRUE);

    $fields['user_id'] = FieldDefinition::create('entity_reference')
      ->setLabel(t('User ID'))
      ->setDescription(t('The ID of the associated user.'))
      ->setSettings(array('target_type' => 'user'))
      ->setTranslatable(TRUE);

    $fields['foo_bar_field'] = FieldDefinition::create('string')
      ->setLabel(t('First FooBar Field'))
      ->setDescription(t('One field of the FooBar entity.'))
      ->setTranslatable(TRUE)
      ->setPropertyConstraints('value', array('Length' => array('max' => 32)))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'Above',
        'type' => 'string',
        'weight' => -5,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string',
        'weight' => -5,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }
}
