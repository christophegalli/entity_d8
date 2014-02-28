<?php
/**
 * @file
 * Defines Drupal\foo_bar\Form\FooBarSettingsForm.
 */

namespace Drupal\foo_bar\Form;

use Drupal\Core\Form\FormBase;

class FooBarSettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'foo_bar_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   */
  public function submitForm(array &$form, array &$form_state) {
    // Empty implementation of the abstract submit class.
  }


  /**
   * Define the form used for FooBar settings.
   * @return array
   *   Form definition array.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   */
  public function buildForm(array $form, array &$form_state) {
    $form['foo_bar_settings']['#markup'] = 'Settings form for FooBar. Manage field settings here.';
    return $form;
  }
}
