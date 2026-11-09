<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Поле «:attribute» має бути прийнятим.',
    'accepted_if' => 'Поле «:attribute» має бути прийнятим, якщо «:other» дорівнює :value.',
    'active_url' => 'Поле «:attribute» містить некоректну URL-адресу.',
    'after' => 'Значення поля «:attribute» має бути датою, пізнішою за :date.',
    'after_or_equal' => 'Значення поля «:attribute» має бути датою, пізнішою або рівною :date.',
    'alpha' => 'Поле «:attribute» має містити лише літери.',
    'alpha_dash' => 'Поле «:attribute» має містити лише літери, цифри, дефіси й підкреслення.',
    'alpha_num' => 'Поле «:attribute» має містити лише літери та цифри.',
    'array' => 'Поле «:attribute» має бути масивом.',
    'ascii' => 'Поле «:attribute» має містити лише однобайтові символи та знаки.',
    'before' => 'Значення поля «:attribute» має бути датою, раніше за :date.',
    'before_or_equal' => 'Значення поля «:attribute» має бути датою, раніше або рівною :date.',
    'between' => [
        'array' => 'Кількість елементів у полі «:attribute» має бути від :min до :max.',
        'file' => 'Розмір файлу в полі «:attribute» має бути від :min до :max кілобайт.',
        'numeric' => 'Значення поля «:attribute» має бути від :min до :max.',
        'string' => 'Довжина поля «:attribute» має бути від :min до :max символів.',
    ],
    'boolean' => 'Поле «:attribute» має мати значення true або false.',
    'confirmed' => 'Підтвердження поля «:attribute» не збігається.',
    'current_password' => 'Пароль вказано невірно.',
    'date' => 'Поле «:attribute» містить некоректну дату.',
    'date_equals' => 'Значення поля «:attribute» має бути датою, рівною :date.',
    'date_format' => 'Поле «:attribute» не відповідає формату :format.',
    'decimal' => 'Поле «:attribute» повинно мати :decimal десяткових знаків.',
    'declined' => 'Поле «:attribute» має бути відхиленим.',
    'declined_if' => 'Поле «:attribute» має бути відхиленим, якщо «:other» дорівнює :value.',
    'different' => 'Поля «:attribute» і «:other» повинні відрізнятися.',
    'digits' => 'Поле «:attribute» повинно містити :digits цифр(и).',
    'digits_between' => 'Поле «:attribute» повинно містити від :min до :max цифр.',
    'dimensions' => 'Поле «:attribute» має некоректні розміри зображення.',
    'distinct' => 'Поле «:attribute» містить значення, що повторюється.',
    'doesnt_end_with' => 'Поле «:attribute» не повинно закінчуватися одним із значень: :values.',
    'doesnt_start_with' => 'Поле «:attribute» не повинно починатися з одного із значень: :values.',
    'email' => 'Поле «:attribute» має містити коректну електронну адресу.',
    'ends_with' => 'Поле «:attribute» повинно закінчуватися одним із значень: :values.',
    'enum' => 'Обране значення поля «:attribute» некоректне.',
    'exists' => 'Обране значення поля «:attribute» некоректне.',
    'file' => 'Поле «:attribute» має бути файлом.',
    'filled' => 'Поле «:attribute» обов\'язкове для заповнення.',
    'gt' => [
        'array' => 'Кількість елементів у полі «:attribute» повинна бути більшою за :value.',
        'file' => 'Розмір файлу в полі «:attribute» повинен бути більшим за :value кілобайт.',
        'numeric' => 'Значення поля «:attribute» повинно бути більшим за :value.',
        'string' => 'Довжина поля «:attribute» повинна бути більшою за :value символів.',
    ],
    'gte' => [
        'array' => 'Кількість елементів у полі «:attribute» повинна бути :value або більше.',
        'file' => 'Розмір файлу в полі «:attribute» повинен бути більшим або рівним :value кілобайт.',
        'numeric' => 'Значення поля «:attribute» повинно бути більшим або рівним :value.',
        'string' => 'Довжина поля «:attribute» повинна бути більшою або рівною :value символів.',
    ],
    'image' => 'Поле «:attribute» має бути зображенням.',
    'in' => 'Обране значення поля «:attribute» некоректне.',
    'in_array' => 'Поле «:attribute» відсутнє в «:other».',
    'integer' => 'Поле «:attribute» має бути цілим числом.',
    'ip' => 'Поле «:attribute» має містити коректну IP-адресу.',
    'ipv4' => 'Поле «:attribute» має містити коректну IPv4-адресу.',
    'ipv6' => 'Поле «:attribute» має містити коректну IPv6-адресу.',
    'json' => 'Поле «:attribute» має містити коректний JSON-рядок.',
    'lowercase' => 'Поле «:attribute» має бути у нижньому регістрі.',
    'lt' => [
        'array' => 'Кількість елементів у полі «:attribute» повинна бути меншою за :value.',
        'file' => 'Розмір файлу в полі «:attribute» повинен бути меншим за :value кілобайт.',
        'numeric' => 'Значення поля «:attribute» повинно бути меншим за :value.',
        'string' => 'Довжина поля «:attribute» повинна бути меншою за :value символів.',
    ],
    'lte' => [
        'array' => 'Кількість елементів у полі «:attribute» не повинна перевищувати :value.',
        'file' => 'Розмір файлу в полі «:attribute» повинен бути меншим або рівним :value кілобайт.',
        'numeric' => 'Значення поля «:attribute» повинно бути меншим або рівним :value.',
        'string' => 'Довжина поля «:attribute» повинна бути меншою або рівною :value символів.',
    ],
    'mac_address' => 'Поле «:attribute» має містити коректну MAC-адресу.',
    'max' => [
        'array' => 'Кількість елементів у полі «:attribute» не повинна перевищувати :max.',
        'file' => 'Розмір файлу в полі «:attribute» не повинен перевищувати :max кілобайт.',
        'numeric' => 'Значення поля «:attribute» не повинно перевищувати :max.',
        'string' => 'Довжина поля «:attribute» не повинна перевищувати :max символів.',
    ],
    'max_digits' => 'Поле «:attribute» не повинно містити більше :max цифр.',
    'mimes' => 'Поле «:attribute» має бути файлом такого типу: :values.',
    'mimetypes' => 'Поле «:attribute» має бути файлом такого типу: :values.',
    'min' => [
        'array' => 'Кількість елементів у полі «:attribute» повинна бути щонайменше :min.',
        'file' => 'Розмір файлу в полі «:attribute» повинен бути щонайменше :min кілобайт.',
        'numeric' => 'Значення поля «:attribute» повинно бути щонайменше :min.',
        'string' => 'Довжина поля «:attribute» повинна бути щонайменше :min символів.',
    ],
    'min_digits' => 'Поле «:attribute» повинно містити щонайменше :min цифр.',
    'missing' => 'Поле «:attribute» має бути відсутнім.',
    'missing_if' => 'Поле «:attribute» має бути відсутнім, якщо «:other» дорівнює :value.',
    'missing_unless' => 'Поле «:attribute» має бути відсутнім, якщо «:other» не дорівнює :value.',
    'missing_with' => 'Поле «:attribute» має бути відсутнім, якщо присутнє :values.',
    'missing_with_all' => 'Поле «:attribute» має бути відсутнім, якщо присутні :values.',
    'multiple_of' => 'Значення поля «:attribute» має бути кратним :value.',
    'not_in' => 'Обране значення поля «:attribute» некоректне.',
    'not_regex' => 'Формат поля «:attribute» некоректний.',
    'numeric' => 'Поле «:attribute» має бути числом.',
    'password' => [
        'letters' => 'Поле «:attribute» повинно містити щонайменше одну літеру.',
        'mixed' => 'Поле «:attribute» повинно містити щонайменше одну велику та одну малу літеру.',
        'numbers' => 'Поле «:attribute» повинно містити щонайменше одну цифру.',
        'symbols' => 'Поле «:attribute» повинно містити щонайменше один символ.',
        'uncompromised' => 'Введений «:attribute» був знайдений у витоку даних. Оберіть інший «:attribute».',
    ],
    'present' => 'Поле «:attribute» має бути присутнім.',
    'prohibited' => 'Поле «:attribute» заборонене.',
    'prohibited_if' => 'Поле «:attribute» заборонене, якщо «:other» дорівнює :value.',
    'prohibited_unless' => 'Поле «:attribute» заборонене, якщо «:other» не входить до :values.',
    'prohibits' => 'Поле «:attribute» забороняє присутність поля «:other».',
    'regex' => 'Формат поля «:attribute» некоректний.',
    'required' => 'Поле «:attribute» обов\'язкове для заповнення.',
    'required_array_keys' => 'Поле «:attribute» повинно містити записи для: :values.',
    'required_if' => 'Поле «:attribute» обов\'язкове, якщо «:other» дорівнює :value.',
    'required_if_accepted' => 'Поле «:attribute» обов\'язкове, якщо «:other» прийнято.',
    'required_unless' => 'Поле «:attribute» обов\'язкове, якщо «:other» не входить до :values.',
    'required_with' => 'Поле «:attribute» обов\'язкове, якщо присутнє :values.',
    'required_with_all' => 'Поле «:attribute» обов\'язкове, якщо присутні :values.',
    'required_without' => 'Поле «:attribute» обов\'язкове, якщо відсутнє :values.',
    'required_without_all' => 'Поле «:attribute» обов\'язкове, якщо відсутні всі :values.',
    'same' => 'Поля «:attribute» і «:other» повинні збігатися.',
    'size' => [
        'array' => 'Поле «:attribute» повинно містити :size елемент(и/ів).',
        'file' => 'Розмір файлу в полі «:attribute» повинен дорівнювати :size кілобайт.',
        'numeric' => 'Значення поля «:attribute» повинно дорівнювати :size.',
        'string' => 'Довжина поля «:attribute» повинна дорівнювати :size символів.',
    ],
    'starts_with' => 'Поле «:attribute» повинно починатися з одного із значень: :values.',
    'string' => 'Поле «:attribute» має бути рядком.',
    'timezone' => 'Поле «:attribute» має містити коректний часовий пояс.',
    'unique' => 'Таке значення поля «:attribute» вже використовується.',
    'uploaded' => 'Не вдалося завантажити файл поля «:attribute».',
    'uppercase' => 'Поле «:attribute» має бути у верхньому регістрі.',
    'url' => 'Поле «:attribute» має містити коректну URL-адресу.',
    'ulid' => 'Поле «:attribute» має містити коректний ULID.',
    'uuid' => 'Поле «:attribute» має містити коректний UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'ім\'я',
        'email' => 'електронна пошта',
        'password' => 'пароль',
        'password_confirmation' => 'підтвердження пароля',
        'remember' => 'запам\'ятати мене',
        'full_name' => 'прізвище, ім\'я та по батькові',
        'birth_date' => 'дата народження',
        'city' => 'область і населений пункт',
        'institution' => 'заклад мистецької освіти',
        'study_year' => 'клас або рік навчання',
        'teacher_name' => 'ПІБ викладача',
        'specialty' => 'спеціальність',
        'age_document' => 'документ, що підтверджує вік',
        'piece1_composer' => 'композитор (твір 1)',
        'piece1_title' => 'назва твору (твір 1)',
        'piece1_duration' => 'тривалість твору 1',
        'piece2_composer' => 'композитор (твір 2)',
        'piece2_title' => 'назва твору (твір 2)',
        'piece2_duration' => 'тривалість твору 2',
        'program_duration' => 'загальна тривалість програми',
        'video_link' => 'посилання на відео',
        'bio' => 'творча біографія',
        'guardian_name' => 'ПІБ законного представника',
        'phone' => 'телефон',
        'agree_rules' => 'згода з Положенням',
        'agree_privacy' => 'згода на обробку персональних даних',
        'agree_media' => 'згода на фото- й відеофіксацію',
        'topic' => 'тема',
        'message' => 'повідомлення',
    ],

];
