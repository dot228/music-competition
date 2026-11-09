<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Результат відбору</title>
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
                            <p style="margin:0 0 12px; line-height:1.5;">Реєстраційний номер заявки: <strong>{{ $application->registrationNumber() }}</strong></p>
                            <p style="margin:0 0 12px; line-height:1.5;">Учасник: <strong>{{ $application->full_name }}</strong> ({{ $application->specialtyLabel() }})</p>

                            @if($application->status === 'approved')
                                <h1 style="font-size:18px; margin:20px 0 16px; color:#8f0e17;">Вітаємо! Вас допущено до очного туру</h1>
                                <p style="margin:0 0 12px; line-height:1.5;">За результатами розгляду журі учасника допущено до очного конкурсного відбору Richter Junior Competition 2027.</p>
                                <p style="margin:0 0 12px; line-height:1.5;">Очний конкурсний відбір відбудеться <strong>26 лютого 2027 року в Житомирі</strong>. Церемонія нагородження та гала-концерт — <strong>27 лютого 2027 року</strong> у Житомирській обласній філармонії імені Святослава Ріхтера.</p>
                                <p style="margin:0 0 12px; line-height:1.5;">Організаційний комітет додатково повідомить точний час і порядок виступів. Слідкуйте за оновленнями на сайті Конкурсу.</p>
                            @else
                                <h1 style="font-size:18px; margin:20px 0 16px;">Результати онлайн-туру</h1>
                                <p style="margin:0 0 12px; line-height:1.5;">Дякуємо за участь у першому (онлайн) турі Richter Junior Competition 2027. На жаль, цього разу учасника не допущено до очного конкурсного відбору.</p>
                                <p style="margin:0 0 12px; line-height:1.5;">Дякуємо за підготовку та інтерес до Конкурсу — запрошуємо стежити за новинами й спробувати свої сили в наступних сезонах.</p>
                            @endif

                            @if($application->admin_comment)
                                <p style="margin:16px 0 4px; line-height:1.5; font-weight:bold;">Коментар журі:</p>
                                <p style="margin:0 0 12px; line-height:1.5; color:#3a3a40;">{{ $application->admin_comment }}</p>
                            @endif

                            <p style="margin:20px 0 0; line-height:1.5; color:#5a5a60; font-size:13px;">Якщо маєте запитання щодо результату, зверніться до Організаційного комітету через сторінку «Контакти» на сайті Конкурсу.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
