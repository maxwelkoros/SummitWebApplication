<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class ResetPassword extends Notification
{

    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The first name.
     *
     * @var string
     */
    public $email;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        $unauthorizedLn = sprintf(
            'If you did not authorize this request, please contact us at <a href="mailto:%s">%s</a>',
            env('SUPPORT_EMAIL'),
            env('SUPPORT_EMAIL')
        );

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->greeting(Lang::get('Hi there,'))
            ->line(Lang::get('We have just received a request to reset your password on the Erevuka eLearning site. Please click the button below to confirm your request.'))
            ->action(Lang::get('Reset Password'), url(config('app.url') . route('password.change', ['token' => $this->token], false) . '&email=' . $this->email))
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::get($unauthorizedLn));
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}