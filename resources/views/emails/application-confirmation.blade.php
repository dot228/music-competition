<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Підтвердження заявки</title>
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
                            <h1 style="font-size:18px; margin:0 0 16px;">Заявку прийнято</h1>
                            <p style="margin:0 0 12px; line-height:1.5;">Дякуємо! Заявку учасника <strong>{{ $application->full_name }}</strong> (спеціальність: {{ $application->specialtyLabel() }}) успішно зареєстровано.</p>
                            <p style="margin:0 0 12px; line-height:1.5;">Реєстраційний номер заявки:</p>
                            <p style="margin:0 0 20px; font-size:22px; font-weight:bold; color:#c1121f;">{{ $application->registrationNumber() }}</p>
                            <p style="margin:0 0 12px; line-height:1.5;">Перший (онлайн) тур триває з 25 січня до 5 лютого 2027 року. Очний конкурсний відбір відбудеться 26 лютого 2027 року в Житомирі, нагородження та гала-концерт — 27 лютого 2027 року.</p>
                            <p style="margin:0; line-height:1.5; color:#5a5a60; font-size:13px;">Якщо цей лист не надійшов протягом 30 хвилин після подання заявки, перевірте папку «Спам» або зверніться до Організаційного комітету.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
