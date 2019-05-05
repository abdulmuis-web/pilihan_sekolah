<?php

namespace Drupal\pilihan_sekolah\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Pilihan sekolah entities.
 */
class PilihanSekolahViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
