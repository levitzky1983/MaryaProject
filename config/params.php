<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'statistics' => [

        'days_default' => 3, //кол-во дней для вывода статистики по-умолчанию (сегодня/вчера/...)

        'password' => false, //пароль для входа на страницу статистики. Если false (без кавычек) - вход без пароля

        'authentication' => false, //если true, то статистика доступна только аутентифицированным пользователям

       // 'auth_route' => 'site/login', //контроллер/действие для страницы аутентификации (по-умолчанию 'site/login')

        'date_old' => 90 //удалять данные через х дней
    ]
];
