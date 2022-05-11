<?php

namespace Drupal\mylearning\Services;

use Drupal\Core\Database\Connection;

/**
 * My learning Services class.
 */
class MylearningServices {
  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;
  /**
   * Construct a data object.
   *
   * @param \Drupal\Core\Database\Connection $connection
   *   The database connection.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * Return Network Content Type Content
   */
  public function getNetworkContents() {
    // $query = $this->connection->select('node_field_data', 'n');
    // $query->addField('n','nid');
    // $query->condition('n.type','network', '=');
    // $query->condition('n.status',1,'=');
    // $results = $query->execute()->fetchCol();
    // return $results;
    return 'Rahul';
  }
}
