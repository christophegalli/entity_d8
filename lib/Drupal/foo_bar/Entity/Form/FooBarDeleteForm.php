<?php

/**
 * @file
 * Contains \Drupal\foo_bar\Entity\Frm\FooBarDeleteForm
 */

namespace Drupal\foo_bar\Entity\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;

/**
 * Provides a form for deleting a foo_bar entity.
 */
class FooBarDeleteForm extends ContentEntityConfirmFormBase {


  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return t('Are you sure you want to delete entity %name?', array('%name' => $this->entity->label()));
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelRoute() {
    return array(
      'route_name' => 'foo_bar.list',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return t('Delete');
  }

  /**
   * {@inheritdoc}
   */
  public function submit(array $form, array &$form_state) {
    $this->entity->delete();

    watchdog('content', '@type: deleted %title.', array('@type' => $this->entity->bundle(), '%title' => $this->entity->label()));
    $form_state['redirect_route']['route_name'] = 'foo_bar.list';
  }

}
