# Mailing

## env settings

```bash
MAIL_MAILER=smtp
MAIL_HOST=domain.tld
MAIL_PORT=465
MAIL_USERNAME=mail@domain.tld
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=mail@domain.tld
MAIL_FROM_NAME=FromLaravel
```

## Create Mail Class

```bash
php artisan make:mail WelcomeEmail
```

## Mail class `app\Mail\WelcomeEmail.php`

```php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $view;
    public $subject;
    public $attachment;
    public function __construct($data, $view, $attachment = null)
    {
        $this->subject = $data['subject'];
        $this->data = $data;
        $this->view = $view;
        $this->attachment = $attachment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:$this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->view,
            with: ['data' => $this->data]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->attachment) {
            return [
                Attachment::fromData(fn() => $this->attachment, 'invoice.pdf')
                    ->withMime('application/pdf'),
            ];
        }
        return [];
    }
}

```

## View `resources\views\mail\welcome.blade.php`

```php
<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello {{ $username }}, Welcome to Laravel</h1>
</body>
</html>
```

## Usage

```php

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

$data['view'] = "mail.welcome";
$data['username'] = "username";
$data['subject'] = "Welcome";
Mail::to("your@mail.com")->send(new WelcomeEmail($data, $data['view']));
```
