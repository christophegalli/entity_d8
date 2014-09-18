<?php
/**
 * @file
 * Definition of Drupal\foo_bar\Entity\Form\FooBarFormController.
 */

namespace Drupal\foo_bar\Entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;

/**
 * Form controller for the foo_bar entity edit forms.
 */
class FooBarForm extends ContentEntityForm {

  /**
   * Overrides Drupal\Core\Entity\EntityForm::form().
   */
  public function form(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\foo_bar\Entity\FooBar */
    $form = parent::form($form, $form_state);
    $entity = $this->entity;

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => $entity->name->value,
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
      '#weight' => -10,
    );

    $form['user_id'] = array(
      '#type' => 'textfield',
      '#title' => 'UID',
      '#default_value' => $entity->user_id->target_id,
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
      '#weight' => -10,
    );
    $form['foo_bar_field'] = array(
      '#type' => 'textfield',
      '#title' => t('A field for FooBar'),
      '#default_value' => $entity->getFooBarField(),
      '#size' => 60,
      '#maxlength' => 128,
      '#weight' => -6,
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
   * Overrides \Drupal\Core\Entity\EntityForm::submit().
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Build the entity object from the submitted values.
    parent::submitForm($form, $form_state);
    $form_state->setRedirect('foo_bar.list');
  }

}
