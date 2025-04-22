<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as MimeEmail;
use Webmozart\Assert\Assert;

class EmailData extends Data
{
    public string $to;

<<<<<<< HEAD
    public ?string $from = null;

    public ?string $from_email = null;
=======
<<<<<<< HEAD
    public ?string $from = null;

    public ?string $from_email = null;
=======
    public string $from;

    public string $from_email;
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)

    public string $subject;

    public string $body_html;

    public string $body;

    public array $attachments = [];

    public function __construct(
        string $to,
        string $subject,
        string $body_html,
        array $attachments = [],
        ?string $from = null,
        ?string $from_email = null,
        ?string $body = null
    ) {
        Assert::email($to, 'Invalid "to" email format');
        $this->to = $to;
        if (! is_string($from)) {
            Assert::string($from = config('mail.from.name', 'Default Sender'));
        }
        $this->from = $from;
        if (! is_string($from_email)) {
            Assert::string($from_email = config('mail.from.address', 'default@example.com'));
        }
        $this->from_email = $from_email;

        Assert::email($this->from_email, 'Invalid "from" email format');

        $this->subject = strip_tags($subject);  // Sanitize the subject
        $this->body_html = $body_html;
        $this->body = $body ?? strip_tags($body_html);  // Default to plain-text version of HTML body
        $this->attachments = $attachments;
    }

    public function getFrom(): Address
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
        if (!isset($this->from)) {
            Assert::string($from = config('mail.from.name', 'Default Sender'));
            $this->from = $from;
        }
        if (!isset($this->from_email)) {
<<<<<<< HEAD
=======
=======
        if ($this->from == null) {
            Assert::string($from = config('mail.from.name', 'Default Sender'));
            $this->from = $from;
        }
        if ($this->from_email == null) {
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
            Assert::string($from_email = config('mail.from.address', 'default@example.com'));
            $this->from_email = $from_email;
        }

        return new Address($this->from_email, $this->from);
    }

    public function getMimeEmail(): MimeEmail
    {
<<<<<<< HEAD
        if (!isset($this->body)) {
=======
<<<<<<< HEAD
        if (!isset($this->body)) {
=======
        if ($this->body == null) {
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
            $this->body = strip_tags($this->body_html);
        }

        $email = (new MimeEmail())
            ->from($this->getFrom())
            ->to($this->to)
            ->subject(strip_tags($this->subject))
            ->html($this->body_html)
<<<<<<< HEAD
            ->text($this->body);
=======
<<<<<<< HEAD
            ->text($this->body);
=======
            ->text(strip_tags($this->body));
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)

        foreach ($this->attachments as $attachment) {
            Assert::string($attachment);
            $email->attachFromPath($attachment); // string $path, ?string $name = null, ?string $contentType = null
        }

        return $email;
    }
}
