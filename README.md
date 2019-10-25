# Плагин для работы с API Docdoc.ru
Необходимо в админке <b>Настройки -> API Docdoc.ru</b> ввести партнерские логин и пароль.

Поддерживаются GET запросы:
<ul>
<li><code>/wp-json/doctor/cities</code> - получить все города</li>
<li><code>/wp-json/doctor/specialisations/{id}</code> - специализации по id города</li>
<li><code>/wp-json/doctor/district/{id}</code> - районы по id города</li>
</ul>
