<?php

namespace MaxBeckers\AmazonAlexa\Intent;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class Slot
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string|null
     */
    public $value;

    /**
     * @var string|null
     */
    public $confirmationStatus;

    /**
     * @var Resolution[]
     */
    public $resolutions = [];

    /**
     * @param array $amazonRequest
     *
     * @return Slot
     */
    public static function fromAmazonRequest(string $name, array $amazonRequest): Slot
    {
        $slot = new self();

        $slot->name               = $name;
        $slot->value              = isset($amazonRequest['value']) ? $amazonRequest['value'] : null;
        $slot->confirmationStatus = isset($amazonRequest['confirmationStatus']) ? $amazonRequest['confirmationStatus'] : null;

        if (isset($amazonRequest['resolutions']['resolutionsPerAuthority'])) {
            foreach ($amazonRequest['resolutions']['resolutionsPerAuthority'] as $resolution) {
                $slot->resolutions[] = Resolution::fromAmazonRequest($resolution);
            }
        }

        return $slot;
    }
}
