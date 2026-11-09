<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Нове звернення</title>
</head>
<body style="margin:0; padding:0; background:#f3f0e8; font-family: Arial, Helvetica, sans-serif; color:#1c1c20;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f3f0e8; padding:32px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="560" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden;">
                    <tr>
                        <td style="background:#1c1c20; padding:24px 32px; border-bottom:3px solid #c9a227;">
                            <span style="color:#ffffff; font-size:20px; font-weight:bold;">🎹 Richter Junior Competition 2027</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <h1 style="font-size:18px; margin:0 0 16px;">Нове звернення з сайту</h1>
                            <p style="margin:0 0 8px;"><strong>Тема:</strong> {{ $contactMessage->topicLabel() }}</p>
                            <p style="margin:0 0 8px;"><strong>Ім'я:</strong> {{ $contactMessage->name }}</p>
                            <p style="margin:0 0 8px;"><strong>Email:</strong> {{ $contactMessage->email }}</p>
                            <p style="margin:0 0 20px;"><strong>Телефон:</strong> {{ $contactMessage->phone }}</p>
                            <p style="margin:0 0 8px;"><strong>Повідомлення:</strong></p>
                            <p style="margin:0; line-height:1.5;">{{ $contactMessage->message }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
