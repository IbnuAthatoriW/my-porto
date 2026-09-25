<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Send contact email message.
     */
    public function send(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $toAddress = env('MAIL_TO_ADDRESS', 'athatori05@gmail.com');

        try {
            Mail::to($toAddress)->send(new ContactMessageMail(
                senderName: $validated['name'],
                senderEmail: $validated['email'],
                messageContent: $validated['message']
            ));

            $successMessage = 'Pesan Anda berhasil dikirim! Saya akan segera membalas email Anda.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                ]);
            }

            return back()->with('success', $successMessage);
        } catch (\Throwable $e) {
            Log::error('Contact Form Mail Error: '.$e->getMessage(), [
                'sender_email' => $validated['email'],
                'exception' => $e,
            ]);

            $errorMessage = 'Gagal mengirim pesan. Silakan pastikan koneksi/konfigurasi mail server sudah benar.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                ], 500);
            }

            return back()->with('error', $errorMessage)->withInput();
        }
    }
}
