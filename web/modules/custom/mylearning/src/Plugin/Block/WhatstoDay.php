<?php

namespace Drupal\mylearning\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * This block will show what's today.
 *
 * @Block(
 *   id = "whats_today",
 *   admin_label = @Translation("What's today"),
 * )
 */
class WhatstoDay extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $cache_tags = Cache::mergeTags(parent::getCacheTags());
    $data = [
      'day' => date("D"),
      'date' => date("d-m-Y")
    ];
    return [
      '#theme' => 'whatstoday',
      '#data' => $data,
      '#cache' => [
        'tags' => $cache_tags,
      ],
    ];
  }
}
