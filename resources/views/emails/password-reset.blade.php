<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Відновлення пароля</title>
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
                            <h1 style="font-size:18px; margin:0 0 16px;">Відновлення пароля</h1>
                            <p style="margin:0 0 12px; line-height:1.5;">Ви (або хтось від вашого імені) запросили відновлення пароля для акаунта <strong>{{ $user->email }}</strong>.</p>
                            <p style="margin:0 0 20px; line-height:1.5;">Щоб встановити новий пароль, перейдіть за посиланням нижче:</p>
                            <p style="margin:0 0 20px;">
                                <a href="{{ $resetUrl }}" style="display:inline-block; background:#c1121f; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:6px; font-weight:bold;">Встановити новий пароль</a>
                            </p>
                            <p style="margin:0 0 12px; line-height:1.5; color:#5a5a60; font-size:13px;">Посилання дійсне протягом 60 хвилин. Якщо ви не запитували відновлення пароля, просто проігноруйте цей лист — пароль залишиться без змін.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
