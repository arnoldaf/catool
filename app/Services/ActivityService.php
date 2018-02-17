<?php

namespace App\Services;

use App\Activity;
use App\ActivityLog;
use App\EmailProfile;
use App\EmailProfileIncoming;
use App\EmailTemplate;
use Auth;
use App\Mail\PHPMailer;

class ActivityService {

    /**
     * To log and through mail on activity
     * @param type $name
     * @param array $args
     * @param array $extra
     * @return void
     */
    function setActivity($name, array $args, array $extra = array()) {
        if (empty($name)) {
            return ['res' => false, 'msg' => 'Activity Name is required!'];
        }
        $activitySetting = Activity::where('key', $name)->first();
        if (!$activitySetting) {
            return ['res' => false, 'msg' => "{$name} activity not found."];
        }
        $emailOutgoingSettings = EmailProfile::where(['id' => $activitySetting->outgoing_id, 'status' => 1])
                ->first();
        if ($emailOutgoingSettings) {
            $this->sendMail($args, $activitySetting, $emailOutgoingSettings, $extra);
        }

        $businessLog = new ActivityLog();
        $businessLog->activity_id = $activitySetting->id;
        $businessLog->user_id = Auth::id();
        $businessLog->ip = request()->ip();
        $businessLog->activity_name = $name;
        $businessLog->info = '';
        $businessLog->message = (isset($extra['message'])) ? $extra['message'] : '';
        $businessLog->save();
    }

    /**
     * To send mail for activity
     * @param type $args
     * @param Activity $activitySetting
     * @param EmailProfile $emailOutgoingSettings
     * @param type $extra
     */
    public function sendMail($args, Activity $activitySetting, EmailProfile $emailOutgoingSettings, $extra) {        
        $emailIncomingSettings = EmailProfileIncoming::find($activitySetting->incoming_id);
        $emailTemplateSettings = EmailTemplate::find($activitySetting->template_id);
        if ($emailTemplateSettings) {
            $mailBody = $emailTemplateSettings->body;
            $subject = $emailTemplateSettings->subject;
            foreach ($args as $argKey => $argVal) {
                $mailBody = str_replace("%{$argKey}%", $argVal, $mailBody);
                $subject = str_replace("%{$argKey}%", $argVal, $subject);
            }

            $mail = new PHPMailer();
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->isHTML(true);
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Host = $emailOutgoingSettings->host; // Specify main and backup SMTP servers
            $mail->Username = $emailOutgoingSettings->email; // SMTP username
            $mail->Password = $emailOutgoingSettings->password; // SMTP password
            $mail->Port = $emailOutgoingSettings->port; // TCP port to connect to
            if (trim($emailOutgoingSettings->port) == 465) {
                $mail->SMTPSecure = 'ssl';
            } else if (trim($emailOutgoingSettings->port) == 587) {
                $mail->SMTPSecure = 'tls';
            }

            $mail->setFrom($emailOutgoingSettings->email, $emailOutgoingSettings->name_profile); // Set From email
            
            $replyToEmail = $emailOutgoingSettings->email;
            if ($activitySetting->reply_to != 0) {
                $replyToIncoming = EmailProfileIncoming::find($activitySetting->reply_to);
                if (count($replyToIncoming) > 0) {
                    $replyToEmail = $replyToIncoming->emails;
                    $mail->addReplyTo($replyToEmail, $emailOutgoingSettings->name_profile);
                }
            }
            $mail->Subject = $subject;
            $mail->Body = html_entity_decode(nl2br($mailBody));
            $mail->CharSet = 'UTF-8';
            // Check Email to
            $recipents = array();
            // Set Mail To
            if (!empty($emailTemplateSettings->_to)) {
                $_tos = explode(",", $emailTemplateSettings->_to);
                $recipents = array_merge($recipents, $_tos);
            }
            // Set Incoming emails
            if (!empty($emailIncomingSettings->emails)) {
                $incomings = explode(",", $emailIncomingSettings->emails);
                $recipents = array_merge($recipents, $incomings);
            }
            // Additional Email address
            if (isset($extra['mailto'])) {
                $recipents[] = $extra['mailto'];
            }

            foreach ($recipents as $recipent) {
                $mail->clearAddresses();
                $mail->addAddress($recipent);

                if (isset($extra['attachment'])) {
                    $mail->AddAttachment($extra['attachment']);
                }

                if (isset($extra['attachments']) && is_array($extra['attachments'])) {
                    foreach ($extra['attachments'] as $file) {
                        $attachment = (isset($file['attachment_name'])) ? $file['attachment_name'] : 'attachment';
                        $attachment_type = (isset($file['attachment_type'])) ? $file['attachment_type'] : 'text/csv';
                        $mail->AddStringAttachment($file['attachment_string'], $attachment, $encoding = 'base64', $type = $attachment_type);
                    }
                }
                if (isset($extra['attachment_string'])) {
                    $attachment = (isset($extra['attachment_name'])) ? $extra['attachment_name'] : 'attachment';
                    $attachment_type = (isset($extra['attachment_type'])) ? $extra['attachment_type'] : 'image/png';
                    $mail->AddStringAttachment($extra['attachment_string'], $attachment, $encoding = 'base64', $type = $attachment_type);
                }

                try {
                    $mail->send();
                } catch (\Exception $e) {
                    // NULL
                }
            }
        }
    }

}
