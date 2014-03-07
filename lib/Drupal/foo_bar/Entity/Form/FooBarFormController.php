<?php
/**
 * @file
 * Definition of Drupal\foo_bar\Entity\Form\FooBarFormController.
 */

namespace Drupal\foo_bar\Entity\Form;

use Drupal\Core\Entity\ContentEntityFormController;
use Drupal\Core\Language\Language;

/**
 * Form controller for the foo_bar entity edit forms.
 */
class FooBarFormController extends ContentEntityFormController {

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::form().
   */
  public function form(array $form, array &$form_state) {
    /* @var $entity \Drupal\foo_bar\Entity\FooBar */
    $form = parent::form($form, $form_state);
    $entity = $this->entity;

    $form['user_id'] = array(
      '#type' => 'textfield',
      '#title' => 'UID',
      '#default_value' => $entity->user_id->target_id,
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
      '#weight' => -10,
    );

    $form['langcode'] = array(
      '#title' => t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->id,
      '#languages' => Language::STATE_ALL,
    );

    return $form;
  }

  /**
   * Overrides \Drupal\Core\Entity\EntityFormController::submit().
   */
  public function submit(array $form, array &$form_state) {
    // Build the entity object from the submitted values.
    $entity = parent::submit($form, $form_state);
    $form_state['redirect_route']['route_name'] = 'foo_bar.list';

    return $entity;
  }

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::save().
   */
  public function save(array $form, array &$form_state) {
    $entity = $this->entity;
    $entity->save();
  }
}
