<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    //public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name'], 'required', 'message'=>'Họ tên không được để trống'],
            [['email'], 'required', 'message'=>'Email không được để trống'],
            [['subject'], 'required', 'message'=>'Tiêu đề không được để trống'],
            [['body'], 'required', 'message'=>'Nội dung không được để trống'],



            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
           // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'Email',
            'subject' => 'Tiêu đề',
            'body' =>'Nội dung',
           // 'verifyCode' => 'Mã xác nhận',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
//        return Yii::$app->mailer->compose()
//            ->setTo($email)
//            ->setFrom($this->email)
//            ->setTo([$email])
//            ->setSubject($this->subject)
//            ->setTextBody($this->body)
//            ->send();
        return Yii::$app->mailer->compose()
            ->setFrom($this->email)
            ->setTo($email)
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
