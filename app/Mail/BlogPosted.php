<?php
/* INI DIBUAT DENGAN ARTISAN MAKE:MAIL */
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlogPosted extends Mailable
{
    use Queueable, SerializesModels;

    protected $post; /* definisikan properti intinya buat mernampung data yang udah di create di controller*/
    /**
     * Create a new message instance.
     */
    public function __construct($post) /* kasih $post di construct */
    {
        $this->post = $post;/* menunjuk properti yang digunakan saat ini ($post) */
    }/*       ($post) */

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('bmbakti@gmail.com', 'bbm'),
            subject: "Blog Baru: {$this->post->title}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.blog_posted', /* buat folder baru biar rapi */
            with:[
                'post' => $this->post
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
