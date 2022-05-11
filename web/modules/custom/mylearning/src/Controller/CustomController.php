<?php
/**
 * @file
 * @author Rahul Kumar
 * Contains \Drupal\mylearning\Controller\CustomController.
 * Please place this file under your mylearning (module_root_folder)/src/Controller/
 */
namespace Drupal\mylearning\Controller;


/**
 * Provides route responses for the Example module.
 */
class CustomController {
  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function myPage() {
    $element = array(
      '#markup' => 'Hello world!',
    );
    return $element;
  }
}


?>