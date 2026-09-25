<?php

namespace Tests\Feature;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_sends_email_successfully(): void
    {
        Mail::fake();

        $response = $this->postJson(route('contact.send'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Halo, ini pesan uji coba.',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        Mail::assertSent(ContactMessageMail::class, function (ContactMessageMail $mail) {
            return $mail->senderName === 'John Doe' &&
                   $mail->senderEmail === 'johndoe@example.com' &&
                   $mail->messageContent === 'Halo, ini pesan uji coba.';
        });
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->postJson(route('contact.send'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}
