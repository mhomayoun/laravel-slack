<?php

namespace Pdffiller\LaravelSlack\RequestBody\Json;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Class Attachment
 *
 * @package Pdffiller\LaravelSlack\RequestBody\Json
 */
class Attachment implements Arrayable
{
    public const DEFAULT_TYPE = 'default';

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $callbackId;

    /**
     * @var string
     */
    private $fallback;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $color;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $fields;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $actions;

    /**
     * Attachment constructor.
     */
    public function __construct()
    {
        $this->type = self::DEFAULT_TYPE;
        $this->fields = new Collection();
        $this->actions = new Collection();
    }

    /**
     * @param string|null $type
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $callbackId
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function setCallbackId(?string $callbackId): self
    {
        $this->callbackId = $callbackId;

        return $this;
    }

    /**
     * @param string|null $fallback
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function setFallback(?string $fallback): self
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * @param string|null $text
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string|null $color
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param \Pdffiller\LaravelSlack\RequestBody\Json\AttachmentAction $action
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function addAction(AttachmentAction $action): self
    {
        $this->actions->push($action);

        return $this;
    }

    /**
     * @param \Pdffiller\LaravelSlack\RequestBody\Json\AttachmentField $field
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\Attachment
     */
    public function addField(AttachmentField $field): self
    {
        $this->fields->push($field);

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFields(): Collection
    {
        return $this->fields;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fallback'        => $this->fallback,
            'callback_id'     => $this->callbackId,
            'color'           => $this->color,
            'attachment_type' => $this->type,
            'text'            => $this->text,
            'fields'          => $this->fields->toArray(),
            'actions'         => $this->actions->toArray(),
        ];
    }
}
