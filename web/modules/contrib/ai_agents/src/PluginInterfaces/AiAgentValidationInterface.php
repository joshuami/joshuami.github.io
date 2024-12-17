<?php

declare(strict_types=1);

namespace Drupal\ai_agents\PluginInterfaces;

/**
 * Interface for ai_agent_validation plugins.
 */
interface AiAgentValidationInterface {

  /**
   * Returns the translated plugin label.
   */
  public function label(): string;

  /**
   * Performs the validation of an Agent response used if no method requested.
   *
   * @param mixed $data
   *
   * @return bool
   */
  public function defaultValidation(mixed $data) : bool;

}
