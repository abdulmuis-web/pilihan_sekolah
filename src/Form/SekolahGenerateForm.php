<?php

namespace Drupal\pilihan_sekolah\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\pilihan_sekolah\Entity\PilihanSekolah;
use Drupal\pilihan_sekolah\PilihanSekolahGenerate;
use Drupal\jenis_sekolah\Entity\JenisSekolah;
use Drupal\simulasi\Lorem;

/**
 * Class SekolahGenerateForm.
 */
class SekolahGenerateForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sekolah_generate_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $ids = \Drupal::entityQuery('district')
      ->execute();

    $batch = array(
      'title' => t('Generate sekolah...'),
      'operations' => array(
        array(
          '\Drupal\pilihan_sekolah\PilihanSekolahGenerate::generateProcess',
          array($ids)
        ),
      ),
      'finished' => '\Drupal\pilihan_sekolah\PilihanSekolahGenerate::finishedCallback',
    );
    batch_set($batch);
  }
}