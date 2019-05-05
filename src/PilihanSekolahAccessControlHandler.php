<?php

namespace Drupal\pilihan_sekolah;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Pilihan sekolah entity.
 *
 * @see \Drupal\pilihan_sekolah\Entity\PilihanSekolah.
 */
class PilihanSekolahAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\pilihan_sekolah\Entity\PilihanSekolahInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished pilihan sekolah entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published pilihan sekolah entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit pilihan sekolah entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete pilihan sekolah entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add pilihan sekolah entities');
  }

}
