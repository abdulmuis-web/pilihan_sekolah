<?php 

namespace Drupal\pilihan_sekolah;
use Drupal\pilihan_sekolah\Entity\PilihanSekolah;
use Drupal\jenis_sekolah\Entity\JenisSekolah;
use Drupal\simulasi\Lorem;


class PilihanSekolahGenerate {
  public static function generateProcess($ids, &$context){
    $message = 'Generate pilihan sekolah...';
    $results = array();
    $pilihan_sekolah == 0;
	foreach ($ids as $id) {
	  $database = \Drupal::database();
      $transaction = $database->startTransaction();
	  $jenis_sekolah = PilihanSekolahGenerate::getJenisSekolahOptions();
	  $pid = array();
	  $pid['name'] = $jenis_sekolah->label() .' '. Lorem::ipsum('2', '2');
	  $pid['jenis_sekolah'] = $jenis_sekolah->id();
	  $pid['vilage'] = PilihanSekolahGenerate::getVilage($id);
	  $pid['zona'] = substr($id, '0', '4');
	  $pid['npsn'] = mt_rand('11111111', '99999999');
	  
	  
	  if (PilihanSekolahGenerate::checkNisn($pid['npsn'])){
		continue;
	  }
      try {
		$pilihan_sekolah = PilihanSekolah::create((array)$pid);
		$results[] = $pilihan_sekolah->save();
      }
      catch (\Exception $e) {
        $transaction->rollback();
        $vilage = NULL;
        watchdog_exception('pilihan_sekolah', $e, $e->getMessage());
        throw new \Exception(  $e->getMessage(), $e->getCode(), $e->getPrevious());
      }
	  $sandbox['current']++;
      usleep(2);
	  
    }
    $context['message'] = $message;
    $context['results'] = $results;
  }
  
  public static function finishedCallback($success, $results, $operations) {
    // The 'success' parameter means no fatal PHP errors were detected. All
    // other error management should be handled using 'results'.
    if ($success) {
      $message = \Drupal::translation()->formatPlural(
        count($results),
        'One post processed.', '@count posts processed.'
      );
    }
    else {
      $message = t('Finished with an error.');
    }
    drupal_set_message($message);
  }
  /**
   * {@inheritdoc}
   */
  static function getJenisSekolahOptions(){
	$query = \Drupal::entityQuery('jenis_sekolah')
	->execute();
    $id = array_rand($query);
	$result = JenisSekolah::load($id);
	//return 'aaa';
	return $result;
  }
  
  static function checkNisn($npsn){
	  $database = \Drupal::database();
	  $results = $database->select('pilihan_sekolah', 's')
		  ->fields('s', array('npsn'))
		  ->condition('s.npsn', $npsn, '=')
		  ->execute();
	  return (bool)$records;
  }
  
  static function getVilage($district_id){
  
    $ids = \Drupal::entityQuery('vilage')
	  ->condition('district_id', $district_id, '=')
      ->execute();
	return array_rand($ids);  
  }
	  
  
}


