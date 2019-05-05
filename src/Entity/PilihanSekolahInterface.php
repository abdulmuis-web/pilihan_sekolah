<?php

namespace Drupal\pilihan_sekolah\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Pilihan sekolah entities.
 *
 * @ingroup pilihan_sekolah
 */
interface PilihanSekolahInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Pilihan sekolah name.
   *
   * @return string
   *   Name of the Pilihan sekolah.
   */
  public function getName();

  /**
   * Sets the Pilihan sekolah name.
   *
   * @param string $name
   *   The Pilihan sekolah name.
   *
   * @return \Drupal\pilihan_sekolah\Entity\PilihanSekolahInterface
   *   The called Pilihan sekolah entity.
   */
  public function setName($name);

  /**
   * Gets the Pilihan sekolah creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Pilihan sekolah.
   */
  public function getCreatedTime();

  /**
   * Sets the Pilihan sekolah creation timestamp.
   *
   * @param int $timestamp
   *   The Pilihan sekolah creation timestamp.
   *
   * @return \Drupal\pilihan_sekolah\Entity\PilihanSekolahInterface
   *   The called Pilihan sekolah entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Pilihan sekolah published status indicator.
   *
   * Unpublished Pilihan sekolah are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Pilihan sekolah is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Pilihan sekolah.
   *
   * @param bool $published
   *   TRUE to set this Pilihan sekolah to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\pilihan_sekolah\Entity\PilihanSekolahInterface
   *   The called Pilihan sekolah entity.
   */
  public function setPublished($published);

}
