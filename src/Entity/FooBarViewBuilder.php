<?php

/**
 * @file
 * Contains \Drupal\foo_bar\Entity\FooBarViewBuilder.
 */

namespace Drupal\foo_bar\Entity;

use Drupal\Core\Entity\EntityViewBuilder;
use Drupal\Component\Utility\String;

/**
 * Defines an entity view builder for a FooBar entity.
 */
class FooBarViewBuilder extends EntityViewBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildComponents(array &$build, array $entities, array $displays, $view_mode, $langcode = NULL) {
    parent::buildComponents($build, $entities, $displays, $view_mode, $langcode);

    /* @var $entity \Drupal\foo_bar\Entity\FooBar */
    foreach ($entities as $id => $entity) {
      $build[$id]['name'] = array(
        '#markup' => String::checkPlain($entity->name->value),
        '#prefix' => '<div class="foo-bar-label">' ,
        '#suffix' => '</div>',
      );
      $build[$id]['foo_bar_field'] = array(
        '#markup' => String::checkPlain($entity->getFooBarField()),
        '#prefix' => '<div class="foo-bar-field">',
        '#suffix' => '</div>',
      );
    }
  }
}
