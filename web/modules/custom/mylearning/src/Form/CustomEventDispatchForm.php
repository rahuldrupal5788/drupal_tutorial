<?php

/**
 * @file
 * Contains \Drupal\mylearning\Form\CustomEventDispatchForm.
 */

namespace Drupal\mylearning\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\mylearning\CustomEvent;

/**
 * Class CustomEventDispatchForm.
 *
 * @package Drupal\mylearning\Form
 */
class CustomEventDispatchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_event_dispatch_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Reference'),
      '#description' => $this->t('Type something here that will be set to the event object, while subscribing it.'),
      '#maxlength' => 64,
      '#size' => 64,
    );
    $form['dispatch'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Dispatch'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Following is the example for
    // How to dispatch an event in Drupal 8 & 9?
    $dispatcher = \Drupal::service('event_dispatcher');
    $event = new CustomEvent($form_state->getValue('name'));
    $dispatcher->dispatch(CustomEvent::SUBMIT, $event);
  }
}
