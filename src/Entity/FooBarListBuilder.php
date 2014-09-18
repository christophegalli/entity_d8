<?php

/**
 * @file
 * Contains \Drupal\foo_bar\Entity\Controller\FooBarListBuilder.
 */

namespace Drupal\foo_bar\Entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Provides a list builder for foo_bar entity.
 */
class FooBarListBuilder extends EntityListBuilder {

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
