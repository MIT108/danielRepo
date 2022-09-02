<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Facades\Storage;

use PDF;

class PDFController extends Controller
{
    //
    public function getAllUsers(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'image' => 'required',
            'heading' => 'required',
            'body' => 'required',
            'cidra_contact' => 'required',
        ]);
        $pdf = PDF::loadView('try',  compact(['fields']));
        if ($pdf) {
            $pdfName = strtotime(Carbon::now());
            $pdfFile = env('APP_URL')."/storage/pdf/$pdfName.pdf";
            Storage::put("public/pdf/$pdfName.pdf", $pdf->output());
            $this->downloadPDF($pdfFile);

            if ($this->downloadPDF($pdfFile)) {
                return $pdf->download("report.pdf");
            } else {
                echo "Error sending report";
            }

        } else {
            echo "No PDF found";
        }
    }
    public function downloadPDF($pdf)
    {

        $senderEmail = env('MAIL_SENDER_EMAIL');
        $senderPassword = env('MAIL_SENDER_PASSWORD');
        $senderName = env('MAIL_SENDER_NAME');
        $subject = "Cidra Report book";
        $body = "ok";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $senderEmail;                     //SMTP username
            $mail->Password   = $senderPassword;                               //SMTP password //jfltubgqbwniivya
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail->SMTPDebug  = 0;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($senderEmail, $senderName);
            $mail->addAddress("thierrymiendjem01@gmail.com");    //Name is optional
            $mail->addReplyTo("thierrymiendjem01@gmail.com", "Miendjem Thierry");

            // $task->pdf = "$task->name.pdf";
            // $task->save();
            // Storage::put("public/pdf/$task->name.pdf", $pdf->output());

            // //Attachments
            // if (count($attachmentsArray) > 0) {
            //     $mail->addAttachment('/var/tmp/file.tar.gz');
            //     foreach ($attachmentsArray as $attachment) {
            //
            //     }
            // }
            // $mail->AddAttachment(env('APP_URL')."/storage/pdf/".$pdf.".pdf", "report Attachment");
            // $mail->AddAttachment(env('APP_URL') . "/storage/pdf/1662102031.pdf", "report Attachment");

            $body = "<!DOCTYPE html>
            <html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>

            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width,initial-scale=1'>
                <meta name='x-apple-disable-message-reformatting'>
                <title></title>
                <!--[if mso]>
              <noscript>
                <xml>
                  <o:OfficeDocumentSettings>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                  </o:OfficeDocumentSettings>
                </xml>
              </noscript>
              <![endif]-->
                <style>
                    table,
                    td,
                    div,
                    h1,
                    p {
                        font-family: Arial, sans-serif;
                    }

                </style>
            </head>

            <body style='margin:0;padding:0;'>
                <table role='presentation'
                    style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
                    <tr>
                        <td align='center' style='padding:0;'>
                            <table role='presentation'
                                style='width:602px;border-collapse:collapse;border:1px solid blue;border-spacing:0;text-align:left; margin: 10px'>
                                <tr>
                                    <td align='center' style='padding:40px 0 30px 0;background:#ffffff;'>
                                        <h1>$senderName</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:36px 30px 42px 30px;'>
                                        <table role='presentation'
                                            style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                                            <tr>
                                                <td style='padding:0 0 36px 0;color:#153643;'>
                                                    <h1 style='font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;'>
                                                        $subject</h1>
                                                    <p
                                                        style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
                                                        <a href='$pdf' download><img src='https://img.icons8.com/color/48/000000/pdf.png'/>Click to download</a> </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>

            </html>


            ";
            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        // $task = Task::find($task_id);
        // if ($department_id == null) {
        //     $department = null;
        // }else{
        //     $department = User::find($department_id);
        // }
    }
}
