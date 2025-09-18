<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class EmailAttachmentData extends Data
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(): void {}
=======
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
    public function __construct(
        private string $content,
        public string $name,
        public string $contentType = 'application/octet-stream'
    ) {}
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)

    public function getContent(): string
    {
        return $this->content;
    }
}
