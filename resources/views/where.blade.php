<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <header>
        <x-header/>
    </header>
    <div class="container mx-auto py-10">
        <div class="flex flex-wrap">
            <!-- Информация о компании -->
            <div class="w-full md:w-1/2 p-4">
                <h2 class="text-2xl font-bold mb-3">Информация о компании</h2>
                <p>г. Москва, ул. Примерная, д. 12</p>
                <p>Телефон: <a href="tel:+74951234567" class="text-blue-500">+7 (495) 123-45-67</a></p>
                <p>Email: <a href="mailto:info@example.com" class="text-blue-500">info@example.com</a></p>
                <p>Работаем с 9:00 до 21:00 ежедневно</p>
            </div>
            <!-- Карта -->
            <div class="w-full md:w-1/2 p-4">
                <h2 class="text-2xl font-bold mb-3">Мы на карте</h2>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2244.284929646944!2d37.620393!3d55.753960!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414ab43c8ebfb3b9%3A0x9bdb717e3f7c3e34!2z0JzQsNC70YzRidCwINCS0LDQvdGB0L7RgNGB0LrQsNGPINGD0LsuLCAxMiwg0JzQvtGB0LrQstCwLCDQnNC-0YHQutCy0LAsIDExNTAwMw!5e0!3m2!1sru!2sru!4v1633105927823!5m2!1sru!2sru" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</body>
</html>
