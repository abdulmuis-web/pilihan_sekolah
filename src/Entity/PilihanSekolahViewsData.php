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

	if (\Drupal::moduleHandler()->moduleExists('prodi_sekolah')) {
      $data['pilihan_sekolah']['prodi_sekolah'] = array(
	    'title' => t('Prodi sekolah from prodi_sekolah'),
	    'relationship' => array(
	      'base' => 'prodi_sekolah', // The name of the table to join with.
	      'base field' => 'pilihan_sekolah_id', // The name of the field on the joined table.
	      'relationship field' => 'id', 
	      'handler' => 'views_handler_relationship',
	      'label' => t('Prodi sekolah'),
	      'title' => t('Relation from Prodi sekolah'),
	      'field' => [
		  // ID of field handler plugin to use.
		    'id' => 'numeric',
	      ],
	      'sort' => [
		    // ID of sort handler plugin to use.
		    'id' => 'standard',
	      ],
	      'filter' => [
		    // ID of filter handler plugin to use.
		    'id' => 'numeric',
	      ],
	      'id' => 'standard'
        ),
      );		
	}
	
	if (\Drupal::moduleHandler()->moduleExists('pendaftaran')) {
      $data['pilihan_sekolah']['pendaftaran'] = array(
	    'title' => t('Prodi sekolah from pendaftaran'),
	    'relationship' => array(
	      'base' => 'pendaftaran', // The name of the table to join with.
	      'base field' => 'pilihan_sekolah', // The name of the field on the joined table.
	      'relationship field' => 'id', 
	      'handler' => 'views_handler_relationship',
	      'label' => t('Pendaftaran'),
	      'title' => t('Relation from Pendaftaran'),
	      'field' => [
		  // ID of field handler plugin to use.
		    'id' => 'numeric',
	      ],
	      'sort' => [
		    // ID of sort handler plugin to use.
		    'id' => 'standard',
	      ],
	      'filter' => [
		    // ID of filter handler plugin to use.
		    'id' => 'numeric',
	      ],
	      'id' => 'standard'
        ),
      );		
	}
	
    return $data;
  }

}
