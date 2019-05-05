<?php

/**
 * @file
 * Contains pilihan_sekolah.page.inc.
 *
 * Page callback for Pilihan sekolah entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Pilihan sekolah templates.
 *
 * Default template: pilihan_sekolah.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_pilihan_sekolah(array &$variables) {
  // Fetch PilihanSekolah Entity Object.
  $pilihan_sekolah = $variables['elements']['#pilihan_sekolah'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
