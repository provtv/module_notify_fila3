<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class EmailAttachmentData extends Data
{
    public function __construct(): void {}

    public function getContent(): string
    {
        return $this->content;
    }
}
