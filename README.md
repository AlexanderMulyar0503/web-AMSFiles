# AMServices Files
Общий доступ к файлам


## Возможности
- Создание папок
- Загрузка файлов
- Удаление папок и файлов


## Системные требования
- Веб-сервер (Apache, Nginx, Lighttpd)
- PHP 7.4


## Настройка
### Права доступа
Необходимо настроить права доступа для папки, в которую будут загружаться файлы

```
chown -R www-data:www-data /path/to/folder
```

*www-data* - пользователь, от имени которого запущен web-сервер
    

### Параметры PHP
Необходимо настроить следующие параметры PHP
- post_max_size = 1G
- file_uploads = On
- upload_max_filesize = 1G
- max_file_uploads = 20


### Настройки AMSFiles
Настройки AMSFiles находятся в файле *conf.php*
