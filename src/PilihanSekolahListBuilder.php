<?php

namespace Drupal\pilihan_sekolah;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Pilihan sekolah entities.
 *
 * @ingroup pilihan_sekolah
 */
class PilihanSekolahListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['jenis_sekolah'] = $this->t('Jenis sekolah');
    $header['npsn'] = $this->t('NPSN');
    $header['name'] = $this->t('Pilihan sekolah');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\pilihan_sekolah\Entity\PilihanSekolah */
    $row['id'] = $entity->id();
    $row['jenis_sekolah'] = Link::createFromRoute(
      $entity->jenis_sekolah->entity->label(),
      'entity.jenis_sekolah.canonical',
      ['jenis_sekolah' => $entity->jenis_sekolah->target_id]
    );
    $row['npsn'] = $entity->npsn->value;
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.pilihan_sekolah.canonical',
      ['pilihan_sekolah' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
