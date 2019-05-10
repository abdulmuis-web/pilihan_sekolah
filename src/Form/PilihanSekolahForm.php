<?php

namespace Drupal\pilihan_sekolah\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Pilihan sekolah edit forms.
 *
 * @ingroup pilihan_sekolah
 */
class PilihanSekolahForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\pilihan_sekolah\Entity\PilihanSekolah */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\wilayah_indonesia_province\Entity\Province */		
	parent::validateForm($form, $form_state);

    $entity = $this->entity;
	/*
	if(is_null($entity->id())){
	  $query = \Drupal::entityQuery('sktm')
			->range('0', '1');
	  $or = $query->orConditionGroup();
	  $or->condition('id', $form_state->getValue('code'));
	  $or->condition('name', $form_state->getValue('name')[0]['value']);
	  $query->condition($or);
	  $id = $query->execute();
	  if(!empty($id)){
	    $form_state->setErrorByName('code',"The code or name field already exist");
	  }
	}else{
	  $id = \Drupal::entityQuery('sktm')
	        ->condition('name', $form_state->getValue('name')[0]['value'])
			->condition('id', $entity->id(), '!=')
			->range('0', '1')
			->execute();
	  if(!empty($id)){
	    $form_state->setErrorByName('name',t("The SKTM with name @name already exist", array('@name' => $form_state->getValue('name')[0]['value'])));
	  }
	}
	*/
	
	//$desa = $entity->vilage->target_id;
	//$zona = $entity->zona->target_id;
	$desa = $form_state->getValue('vilage')[0]['target_id'];
	$zona = $form_state->getValue('zona')[0]['target_id'];
	$desa = substr($desa, 0, 4);

    if($desa !== $zona){	
      $form_state->setErrorByName('sona',t("Desa dan zona tidak sinkron"));
	}
  }


  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Pilihan sekolah.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Pilihan sekolah.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.pilihan_sekolah.canonical', ['pilihan_sekolah' => $entity->id()]);
  }

}
