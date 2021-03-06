<?php
/**
 * Test-related English Lexicon Topic for Revolution setup.
 *
 * @package setup
 * @subpackage lexicon
 */
$_lang['test_config_file'] = 'Проверка существования файла <span class="mono">[[+file]]</span> и возможности записи в него: ';
$_lang['test_config_file_nw'] = 'Для новой установки на Linux/Unix системах, создайте пустой файл с именем <span class="mono">[[+key]].inc.php</span> в каталоге <span class="mono">config/</span> с правами доступа, позволяющими веб-серверу его изменять.';
$_lang['test_db_check'] = 'Соединение с базой данных:';
$_lang['test_db_check_conn'] = 'Проверьте параметры соединения и повторите попытку.';
$_lang['test_db_failed'] = 'Соединение с базой данных не установлено!';
$_lang['test_db_setup_create'] = 'Программа установки попытается создать базу данных.';
$_lang['test_dependencies'] = 'Проверка PHP расширения zlib: ';
$_lang['test_dependencies_fail_zlib'] = 'Конфигурация PHP не имеет подключённого расширения zlib. Это расширение является необходимым для запуска MODX. Подключите это расширение для продолжения установки.';
$_lang['test_directory_exists'] = 'Проверка существования каталога <span class="mono">[[+dir]]</span> : ';
$_lang['test_directory_writable'] = 'Проверка возможности записи в каталог <span class="mono">[[+dir]]</span>: ';
$_lang['test_memory_limit'] = 'Проверка ограничения выделяемой памяти (должно быть не менее 24 MБ): ';
$_lang['test_memory_limit_fail'] = 'Параметр memory_limit равен [[+memory]], что меньше рекомендуемого 24 МБ. MODX не смог самостоятельно его повысить. Для продолжения, установите в файле php.ini этот параметр равным 24 MБ или больше. Если это не решило проблему (пустой белый экран во время установки), повышайте memory_limit до 32 МБ, 64 МБ или выше.';
$_lang['test_memory_limit_success'] = 'OK! memory_limit равен [[+memory]]';
$_lang['test_mysql_version_5051'] = 'MODX будет испытывать проблемы с вашей версией MySQL ([[+version]]), которые обусловлены многочисленными ошибками, связанных с работой PDO драйвера в этой версии. Обновите MySQL для устранения этих проблем. Даже если вы не будете использовать MODX, мы рекомендуем обновить эту версию MySQL для повышения стабильности и безопасности.';
$_lang['test_mysql_version_client_nf'] = 'Не удаётся определить версию клиента MySQL!';
$_lang['test_mysql_version_client_nf_msg'] = 'MODX не смог определить версию клиента MySQL, используя функцию mysql_get_client_info(). Проверьте версию самостоятельно, она должна быть не ниже 4.1.20.';
$_lang['test_mysql_version_client_old'] = 'Могут возникнуть проблемы в работе MODX, потому что вы используете очень старую версию MySQL клиента ([[+version]])';
$_lang['test_mysql_version_client_old_msg'] = 'MODX позволяет установку с этой версией MySQL клиента, но мы не можем гарантировать что все функциональные возможности будут доступны и будут работать должным образом при использовании старых версий MySQL клиента.';
$_lang['test_mysql_version_client_start'] = 'Проверка версии клиента MySQL:';
$_lang['test_mysql_version_fail'] = 'Используется MySQL [[+version]], но MODX Revolution требует MySQL 4.1.20 или выше. Обновите MySQL до версии не ниже 4.1.20.';
$_lang['test_mysql_version_server_nf'] = 'Не удалось определить версию сервера MySQL!';
$_lang['test_mysql_version_server_nf_msg'] = 'MODX не смог определить версию сервера MySQL, используя функцию mysql_get_server_info(). Проверьте её самостоятельно, она должна быть не ниже 4.1.20.';
$_lang['test_mysql_version_server_start'] = 'Проверка версии сервера MySQL:';
$_lang['test_mysql_version_success'] = 'OK! Работает: [[+version]]';
$_lang['test_nocompress'] = 'Проверка выключено ли сжатие CSS/JS: ';
$_lang['test_nocompress_disabled'] = 'OK! Отключено.';
$_lang['test_nocompress_skip'] = 'Не выбрано, пропускаем тест.';
$_lang['test_php_version_fail'] = 'Используется PHP [[+version]], а для работы MODX Revolution необходим PHP версии 5.1.1 или выше. Обновите PHP до версии не ниже 5.1.1. MODX рекомендует обновление до 5.3.2+.';
$_lang['test_php_version_516'] = 'MODX будет работать с ошибками на используемой версии PHP ([[+version]]), это связано с большим количеством ошибок в её драйверах PDO. Обновите PHP до версии 5.3.0 или выше, что исправит эти ошибки. MODX рекомендует обновиться до 5.3.2+. Даже если вы не будете использовать MODX, рекомендуется обновиться до этой версии для стабильности и безопасности.';
$_lang['test_php_version_520'] = 'MODX будет работать с ошибками на используемой версии PHP ([[+version]]), это связано с большим количеством ошибок в её драйверах PDO. Обновите PHP до версии 5.3.0 или выше. MODX рекомендует обновиться до 5.3.2+. Даже если вы не будете использовать MODX, рекомендуется обновиться до этой версии для стабильности и безопасности.';
$_lang['test_php_version_start'] = 'Проверка версии PHP:';
$_lang['test_php_version_success'] = 'ОК! Работает: [[+version]]';
$_lang['test_safe_mode_start'] = 'Проверка того, что  директива safe_mode выключена(off):';
$_lang['test_safe_mode_fail'] = 'MODX обнаружил, что директива safe_mode  включена(on). Для продолжения установки вы должны отключить safe_mode в вашей конфигурации PHP.';
$_lang['test_sessions_start'] = 'Проверка настроек сессий:';
$_lang['test_simplexml'] = 'Проверка SimpleXML:';
$_lang['test_simplexml_nf'] = 'Не удалось найти SimpleXML!';
$_lang['test_simplexml_nf_msg'] = 'MODX не смог найти SimpleXML в вашем окружении PHP. Управление пакетами и другие возможности не будут работать. Вы можете продолжить установку, но рекомендуется включить SimpleXML для использования всех возможностей.';
$_lang['test_suhosin'] = 'Проверка suhosin:';
$_lang['test_suhosin_max_length'] = 'Suhosin GET max значение слишком низкое!';
$_lang['test_suhosin_max_length_err'] = 'Вы используете расширение suhosin PHP, и ваши настройки suhosin.get.max_value_length установлены в слишком низкое значение для MODX для правильного сжатия JS файлов в менеджере. MODX рекомендует повысить это значение до 4096; на данный момент MODX автоматически установит для вашего сжатия JS (параметр compress_js) 0, чтобы предотвратить ошибки.';
$_lang['test_table_prefix'] = 'Проверка префикса таблиц `[[+prefix]]`: ';
$_lang['test_table_prefix_inuse'] = 'Такой префикс таблиц уже используется в указанной базе данных!';
$_lang['test_table_prefix_inuse_desc'] = 'Установка не может быть произведена в выбранной базе данных, поскольку она уже содержит таблицы с указанным префиксом. Выберите другой table_prefix и попробуйте ещё раз.';
$_lang['test_table_prefix_nf'] = 'В выбранной базе данных нет такого префикса таблиц!';
$_lang['test_table_prefix_nf_desc'] = 'Продолжение установки невозможно, так как нет таблиц с указанным префиксом. Измените table_prefix и попробуйте ещё раз.';
$_lang['test_zip_memory_limit'] = 'Проверка ограничения выделяемой памяти (должно быть не менее 24 MБ): ';
$_lang['test_zip_memory_limit_fail'] = 'Параметр memory_limit меньше 24 МБ. MODX не смог самостоятельно его повысить. Для корректной работы расширений zip, установите в файле php.ini этот параметр равным или больше 24 MБ.';