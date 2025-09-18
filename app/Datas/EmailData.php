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

    public ?string $from = null;

    public ?string $from_email = null;

    public string $subject;

    public string $body_html;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public string $body='';

    public array $attachments = [];

    public function __construct(): void {
=======
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
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
        if (!isset($this->from)) {
            Assert::string($from = config('mail.from.name', 'Default Sender'));
            $this->from = $from;
        }
        if (!isset($this->from_email)) {
            Assert::string($from_email = config('mail.from.address', 'default@example.com'));
            $this->from_email = $from_email;
        }

        return new Address($this->from_email, $this->from);
    }

    public function getMimeEmail(): MimeEmail
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if ( $this->body=='') {
=======
        if (!isset($this->body)) {
>>>>>>> 90c60faa (.)
=======
        if (!isset($this->body)) {
>>>>>>> 9b05d0a6 (.)
=======
        if (!isset($this->body)) {
>>>>>>> 4bf9ea78 (.)
            $this->body = strip_tags($this->body_html);
        }

        $email = (new MimeEmail())
            ->from($this->getFrom())
            ->to($this->to)
            ->subject(strip_tags($this->subject))
            ->html($this->body_html)
            ->text($this->body);

        foreach ($this->attachments as $attachment) {
            Assert::string($attachment);
            $email->attachFromPath($attachment); // string $path, ?string $name = null, ?string $contentType = null
        }

        return $email;
    }
}
