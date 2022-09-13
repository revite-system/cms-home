<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReceiveMail extends Mailable
{
    use Queueable, SerializesModels;

    private $company_name;
    private $user_name;
    private $tele_num;
    private $email;
    private $birthday;
    private $sex;
    private $job;
    private $contet;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->company_name = $inputs['company_name'];
        $this->user_name = $inputs['user_name'];
        $this->tele_num  = $inputs['tele_num'];
        $this->email  = $inputs['email'];
        $this->birthday  = $inputs['birthday'];
        $this->sex  = $inputs['sex'];
        $this->job  = $inputs['job'];
        $this->content  = $inputs['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // explode -- 文字列を文字列により分割する
        $birthday = explode('-',$this->birthday);
        return $this
            ->from($this->email)
            ->subject('お問い合わせが来ました。')
            ->view('mail.receive')
            ->with([
                'company_name' => $this->company_name,
                'user_name' => $this->user_name,
                'tele_num' => $this->tele_num,
                'email' => $this->email,
                'birthday' => $birthday,
                'sex' => $this->sex,
                'job' => $this->job,
                'content' => $this->content,
            ]);
    }
}
