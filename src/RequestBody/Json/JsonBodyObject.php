<?php

namespace Pdffiller\LaravelSlack\RequestBody\Json;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Notifications\Slack\EventMetadata;
use Illuminate\Support\Collection;
use Pdffiller\LaravelSlack\RequestBody\BaseRequestBody;

/**
 * Class JsonBodyObject
 *
 * @package Pdffiller\LaravelSlack\RequestBody\Json
 */
class JsonBodyObject extends BaseRequestBody implements Arrayable
{
    /**
     * @var string
     */
    public $channel;

    /**
     * @var string
     */
    public $triggerId;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $iconUrl;

    /**
     * @var boolean
     */
    public $replaceOriginal;

    /**
     * @var string
     */
    public $ts;

    /**
     * @var string
     */
    public $threadTs;

    /**
     * @var string
     */
    public $text;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $attachments;

    public $blocks;

    public ?EventMetadata $metaData = null;

    /**
     * @var \Pdffiller\LaravelSlack\RequestBody\Json\Dialog
     */
    public $dialog;

    /**
     * @var array
     */
    public $view;

    /**
     * JsonBody constructor.
     */
    public function __construct()
    {
        $this->attachments = new Collection();
        $this->blocks = new Collection();
    }

    /**
     * @param string $channel
     *
     * @return JsonBodyObject
     */
    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getChannel(): ?string
    {
        return $this->channel ?? null;
    }

    /**
     * @param string $triggerId
     *
     * @return JsonBodyObject
     */
    public function setTriggerId(string $triggerId): self
    {
        $this->triggerId = $triggerId;

        return $this;
    }

    /**
     * @param bool $replaceOriginal
     *
     * @return JsonBodyObject
     */
    public function setReplaceOriginal(bool $replaceOriginal): self
    {
        $this->replaceOriginal = $replaceOriginal;

        return $this;
    }

    /**
     * @param string $ts
     *
     * @return JsonBodyObject
     */
    public function setTs(string $ts): self
    {
        $this->ts = $ts;

        return $this;
    }

    /**
     * @param string $threadTs
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function setThreadTs(string $threadTs): self
    {
        $this->threadTs = $threadTs;

        return $this;
    }

    /**
     * @param string $username
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $iconUrl
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * @param string $text
     *
     * @return JsonBodyObject
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param \Pdffiller\LaravelSlack\RequestBody\Json\Dialog $dialog
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function setDialog(Dialog $dialog): self
    {
        $this->dialog = $dialog;

        return $this;
    }

    /**
     * @param \Pdffiller\LaravelSlack\RequestBody\Json\Attachment $attachment
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function addAttachment(Attachment $attachment): self
    {
        $this->attachments->push($attachment);

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    /**
     * @param \Illuminate\Support\Collection $attachments
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function setAttachments(Collection $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * @param \Illuminate\Support\Collection $attachments
     *
     * @return \Pdffiller\LaravelSlack\RequestBody\Json\JsonBodyObject
     */
    public function addAttachments(Collection $attachments): self
    {
        collect($attachments)->each(function ($attachment, $key) {
            if ($attachment instanceof Attachment) {
                $this->addAttachment($attachment);
            }
        });

        return $this;
    }

    public function addBlock(array $block)
    {
        $this->blocks->push($block);

        return $this;
    }

    public function getBlocks()
    {
        return $this->blocks;
    }

    public function setBlocks(Collection $blocks)
    {
        $this->blocks = $blocks;

        return $this;
    }

    public function getTs(): ?string
    {
        return $this->ts ?? null;
    }

    public function getThreadTs(): ?string
    {
        return $this->threadTs ?? null;
    }

    public function getDialog(): Dialog
    {
        return $this->dialog;
    }

    public function metadata(EventMetadata $metadata): self
    {
        $this->metaData = $metadata;

        return $this;
    }

    public function setRawView(array $view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'channel'          => $this->channel,
            'trigger_id'       => $this->triggerId,
            'username'         => $this->username,
            'icon_url'         => $this->iconUrl,
            'ts'               => $this->ts,
            'thread_ts'        => $this->threadTs,
            'replace_original' => $this->replaceOriginal,
            'text'             => $this->text,
            'dialog'           => $this->dialog ? $this->dialog->toArray() : null,
            'attachments'      => $this->attachments->toArray(),
            'blocks'           => $this->blocks->toArray(),
            'metadata'         => $this->metaData?->toArray(),
            'view'             => $this->view ?? null,
        ];
    }
}
