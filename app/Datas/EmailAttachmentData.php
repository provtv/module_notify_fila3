<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class EmailAttachmentData extends Data
{
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(): void {}
=======
=======
>>>>>>> 9b05d0a6 (.)
    public function __construct(
        private string $content,
        public string $name,
        public string $contentType = 'application/octet-stream'
    ) {}
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)

    public function getContent(): string
    {
        return $this->content;
    }
}
