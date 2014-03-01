<?php

/**
 * @file
 * Contains \Drupal\foo_bar\Entity\Controller\FooBarListController.
 */

namespace Drupal\foo_bar\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListController;

/**
 * Provides a list controller for foo_bar entity.
 */
class FooBarListController extends EntityListController {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = t('FooBarID');
    $header['label'] = t('Label');
    $header['foo-bar_field'] = t('FooBarField');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\foo_bar\Entity\FooBar */
    $row['id'] = $entity->id();
    $row['label'] = l($this->getLabel($entity), 'foo-bar/' . $entity->id());
    $row['foo_bar_field'] = $entity->getFooBarField();
    return $row + parent::buildRow($entity);
  }

}
