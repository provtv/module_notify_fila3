<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class EmailAttachmentData extends Data
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
=======
>>>>>>> ba48b8c (.)
    public function __construct(
        private string $content,
        public string $name = 'attachment.pdf',
        public string $contentType = 'application/pdf'
    ) {}
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public string $name;

    public string $contentType;

    private string $content;

    public function __construct(
        string $content,
        string $name = 'attachment.pdf',
        string $contentType = 'application/pdf'
    ) {
        $this->content = $content;
        $this->name = $name;
        $this->contentType = $contentType;
    }
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
=======

>>>>>>> ba48b8c (.)

    public function getContent(): string
    {
        return $this->content;
    }
}
