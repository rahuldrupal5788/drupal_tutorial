<?php
namespace Drupal\mylearning\TwigExtension;

class TwigFilters extends \Twig_Extension {

  /**
   * Generates a list of all Twig filters that this extension defines.
   */
  public function getFilters() {
    return [
      new \Twig_SimpleFilter('htmlentitydecode', array($this, 'htmlEntityDecode')),
    ];
  }

  /**
   * Gets a unique identifier for this Twig extension.
   */
  public function getName() {
    return 'mylearning.twig_extension';
  }

  /**
   * Base64decoding.
   */
  public static function htmlEntityDecode($string) {
    $decodeString = html_entity_decode($string, ENT_QUOTES, "UTF-8");
    return $decodeString;
    // return preg_replace_callback(
    //   "/\\\u([0-9a-f]{4})/i",
    //   function ($matches) {
    //       return html_entity_decode("&#x".$matches[1].';',ENT_QUOTES, 'UTF-8');
    //   },
    //   $str
    // );
  }
}