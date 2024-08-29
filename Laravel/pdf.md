# PDF

## Install package

```bash
composer require barryvdh/laravel-dompdf
```

## Generate pdf

```php
use Barryvdh\DomPDF\Facade\Pdf;

$pdfData['view'] = "mail.welcome";
$pdfData['username'] = "username";
$pdfData['title'] = "Welcome";
$pdfData['subject'] = "Welcome";
// $pdf = Pdf::loadView('pdf.welcome', $pdfData);
$pdf = Pdf::loadView('pdf.welcome', $pdfData)
    ->setPaper('a4', 'landscape'); // Set paper size and orientation
// return $pdf->download('welcome.pdf');
Mail::to("your@mail.com")->send(new WelcomeEmail($pdfData, $pdfData['view']),$pdf); // send mail using pdf attachment
```
