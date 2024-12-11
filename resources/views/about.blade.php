<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <header>
        <x-header/>
    </header>
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">О нас</h1>
        <div class="bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Наша миссия</h2>
            <p class="text-gray-600 text-lg leading-7 mb-6">
                Мы стремимся объединить людей, создавая пространство, где каждый может найти вдохновение, новые знания и уникальный опыт. Наша команда верит, что книги — это не только источник информации, но и ключ к самореализации, личностному росту и открытию новых миров.
            </p>

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Наша история</h2>
            <p class="text-gray-600 text-lg leading-7 mb-6">
                Наша компания была основана в 2010 году небольшой группой энтузиастов, которые искренне любили книги и хотели сделать их доступными для всех. С тех пор мы выросли в профессиональную платформу, предлагающую широкий выбор литературы — от классики до новейших бестселлеров.
            </p>

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Почему выбирают нас?</h2>
            <ul class="list-disc list-inside text-gray-600 text-lg leading-7 mb-6">
                <li>Широкий выбор литературы: от классики до современных изданий.</li>
                <li>Дружелюбный и профессиональный сервис.</li>
                <li>Мы поддерживаем локальных авторов и издателей.</li>
                <li>Регулярные акции и программы лояльности для наших клиентов.</li>
            </ul>

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Наша команда</h2>
            <p class="text-gray-600 text-lg leading-7 mb-6">
                Мы — команда единомышленников, объединенных любовью к книгам и стремлением дарить радость нашим клиентам. Каждый из нас привносит уникальный опыт, идеи и энергию, чтобы сделать ваш опыт взаимодействия с нами незабываемым.
            </p>

            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Контакты</h2>
            <p class="text-gray-600 text-lg leading-7">
                Если у вас есть вопросы, предложения или вы хотите поделиться своими впечатлениями, свяжитесь с нами:
            </p>
            <ul class="list-none text-gray-600 text-lg leading-7 mt-4">
                <li><strong>Email:</strong> support@ourcompany.com</li>
                <li><strong>Телефон:</strong> +7 (999) 123-45-67</li>
                <li><strong>Адрес:</strong> Москва, ул. Примерная, д. 42</li>
            </ul>
        </div>
    </div>
</body>
</html>
