<?php

/**
 * @file
 * Contains \Drupal\mylearning\CustomEventSubScriber.
 */

namespace Drupal\mylearning\EventSubscriber;

use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Drupal\mylearning\CustomEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Class CustomEventSubScriber.
 *
 * @package Drupal\mylearning
 */
class CustomEventSubScriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[ConfigEvents::SAVE][] = array('onSavingConfig', 800);
    $events[CustomEvent::SUBMIT][] = array('doSomeAction', 800);
    return $events;

  }

  /**
   * Subscriber Callback for the event.
   * @param CustomEvent $event
   */
  public function doSomeAction(CustomEvent $event) {
    $message = "The Custom Event has been subscribed, which has been dispatched on submit of the form with " . $event->getReferenceID() . " as Reference";
    \Drupal::logger('mylearning')->info($message);
    \Drupal::messenger()->addMessage($message, 'status');
  }

  /**
   * Subscriber Callback for the event.
   * @param ConfigCrudEvent $event
   */
  public function onSavingConfig(ConfigCrudEvent $event) {
    $message = "You have saved a configuration of " . $event->getConfig()->getName();
    \Drupal::logger('mylearning')->info($message);
    \Drupal::messenger()->addMessage($message, 'status');
  }
}
