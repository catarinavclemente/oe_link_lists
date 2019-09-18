<?php

declare(strict_types = 1);

namespace Drupal\oe_link_lists\Plugin;

use Drupal\Core\Form\FormStateInterface;
use Drupal\oe_link_lists\ExternalLinkSourcePluginInterface;
use Drupal\oe_link_lists\LinkSourcePluginBase;

/**
 * Base plugin for external link_source plugins.
 */
abstract class ExternalLinkSourcePluginBase extends LinkSourcePluginBase implements ExternalLinkSourcePluginInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'url' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['url'] = $form_state->getValue('url');
  }

  /**
   * {@inheritdoc}
   */
  public function processConfigurationForm(array &$form, FormStateInterface $form_state): array {
    $form['url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('The resource URL'),
      '#description' => $this->t('Add the URL where the external resources can be found.'),
      '#default_value' => $this->configuration['url'],
    ];

    return $form;
  }

}
