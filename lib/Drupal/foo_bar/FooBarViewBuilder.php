<?php

/**
 * @file
 * Contains \Drupal\foo_bar\FooBarViewBuilder.
 */

namespace Drupal\foo_bar;

use Drupal\Core\Entity\EntityViewBuilder;

/**
 * Defines an entity view builder for a FooBar entity.
 */
class FooBarViewBuilder extends EntityViewBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildContent(array $entities, array $displays, $view_mode, $langcode = NULL) {
    parent::buildContent($entities, $displays, $view_mode, $langcode);
    /* @var $entity \Drupal\foo_bar\Entity\FooBar */
    foreach ($entities as $entity) {
      $entity->content['foo_bar']['name'] = array(
        '#markup' => $entity->name->value,
        '#prefix' => '<div class="foo-bar-label">' ,
        '#suffix' => '</div>',
      );
      $entity->content['foo_bar']['foo_bar_field'] = array(
        '#markup' => $entity->getFooBarField(),
        '#prefix' => '<div class="foo-bar-field">',
        '#suffix' => '</div>',
      );
    }
  }
}
