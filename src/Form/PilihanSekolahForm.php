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
