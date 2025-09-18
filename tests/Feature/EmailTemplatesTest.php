<?php

<<<<<<< HEAD
declare(strict_types=1);

use Illuminate\Support\Facades\File;

uses(Tests\TestCase::class);

test('html template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/html.blade.php');

    // Verifico che il file esiste
    expect(File::exists($filePath))->toBeTrue('Il file html.blade.php non esiste');

    // Leggo il contenuto del file
    $content = File::get($filePath);

    // Verifico che contiene la funzione optional per subject
    expect($content)->toContain('optional($email_data)->subject', 'Il template html.blade.php non utilizza optional() per subject');

    // Verifico che contiene la funzione optional per body_html
    expect($content)->toContain('optional($email_data)->body_html', 'Il template html.blade.php non utilizza optional() per body_html');
});

test('sunny template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/templates/sunny.blade.php');

    // Verifico che il file esiste
    expect(File::exists($filePath))->toBeTrue('Il file sunny.blade.php non esiste');

    // Leggo il contenuto del file
    $content = File::get($filePath);

    // Verifico che contiene la funzione optional per cssInLine
    expect($content)->toContain('optional($_theme)->cssInLine', 'Il template sunny.blade.php non utilizza optional() per cssInLine');
});

test('ark template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/templates/ark.blade.php');

    // Verifico che il file esiste
    expect(File::exists($filePath))->toBeTrue('Il file ark.blade.php non esiste');

    // Leggo il contenuto del file
    $content = File::get($filePath);

    // Verifico che contiene la funzione optional per cssInLine
    expect($content)->toContain('optional($_theme)->cssInLine', 'Il template ark.blade.php non utilizza optional() per cssInLine');
});
=======
namespace Modules\Notify\Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class EmailTemplatesTest extends TestCase
{
    /**
     * Test che il template html.blade.php contiene la funzione optional
     */
    public function test_html_template_contains_optional(): void
    {
        // Percorso del file
        $filePath = base_path('Modules/Notify/resources/views/emails/html.blade.php');

        // Verifico che il file esiste
        $this->assertTrue(File::exists($filePath), 'Il file html.blade.php non esiste');

        // Leggo il contenuto del file
        $content = File::get($filePath);

        // Verifico che contiene la funzione optional per subject
        $this->assertStringContainsString('optional($email_data)->subject', $content, 'Il template html.blade.php non utilizza optional() per subject');

        // Verifico che contiene la funzione optional per body_html
        $this->assertStringContainsString('optional($email_data)->body_html', $content, 'Il template html.blade.php non utilizza optional() per body_html');
    }

    /**
     * Test che il template sunny.blade.php contiene la funzione optional
     */
    public function test_sunny_template_contains_optional(): void
    {
        // Percorso del file
        $filePath = base_path('Modules/Notify/resources/views/emails/templates/sunny.blade.php');

        // Verifico che il file esiste
        $this->assertTrue(File::exists($filePath), 'Il file sunny.blade.php non esiste');

        // Leggo il contenuto del file
        $content = File::get($filePath);

        // Verifico che contiene la funzione optional per cssInLine
        $this->assertStringContainsString('optional($_theme)->cssInLine', $content, 'Il template sunny.blade.php non utilizza optional() per cssInLine');
    }

    /**
     * Test che il template ark.blade.php contiene la funzione optional
     */
    public function test_ark_template_contains_optional(): void
    {
        // Percorso del file
        $filePath = base_path('Modules/Notify/resources/views/emails/templates/ark.blade.php');

        // Verifico che il file esiste
        $this->assertTrue(File::exists($filePath), 'Il file ark.blade.php non esiste');

        // Leggo il contenuto del file
        $content = File::get($filePath);

        // Verifico che contiene la funzione optional per cssInLine
        $this->assertStringContainsString('optional($_theme)->cssInLine', $content, 'Il template ark.blade.php non utilizza optional() per cssInLine');
    }
}
>>>>>>> 90c60faa (.)
