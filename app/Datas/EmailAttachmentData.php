<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class EmailAttachmentData extends Data
{
<<<<<<< HEAD
    public function __construct(): void {}
=======
    public function __construct(
        private string $content,
        public string $name,
        public string $contentType = 'application/octet-stream'
    ) {}
>>>>>>> 90c60faa (.)

    public function getContent(): string
    {
        return $this->content;
    }
}
