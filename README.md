### Установка

Composer:
```bash 
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Компоненты проекта:

```bash 
php composer.phar install
```

Настройка Nginx

```
server {
    set $host_path "/www/tochka";
    access_log  /www/tochka/log/access.log  main;

    server_name  mysite;
    root   $host_path/htdocs;
    set $yii_bootstrap "index.php";

    charset utf-8;

    location / {
        index  index.html $yii_bootstrap;
        try_files $uri $uri/ /$yii_bootstrap?$args;
    }

    location ~ ^/(protected|framework|themes/\w+/views) {
        deny  all;
    }

    # отключаем обработку запросов фреймворком к несуществующим статичным файлам
    location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        try_files $uri =404;
    }

    # передаем PHP-скрипт серверу FastCGI, прослушивающему адрес 127.0.0.1:9000
    location ~ \.php {
        fastcgi_split_path_info  ^(.+\.php)(.*)$;

        # позволяем yii перехватывать запросы к несуществующим PHP-файлам
        set $fsn /$yii_bootstrap;
        if (-f $document_root$fastcgi_script_name){
            set $fsn $fastcgi_script_name;
        }

        fastcgi_pass   127.0.0.1:9000;
        include fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fsn;

        # PATH_INFO и PATH_TRANSLATED могут быть опущены, но стандарт RFC 3875 определяет для CGI
        fastcgi_param  PATH_INFO        $fastcgi_path_info;
        fastcgi_param  PATH_TRANSLATED  $document_root$fsn;
    }

    # не позволять nginx отдавать файлы, начинающиеся с точки (.htaccess, .svn, .git и прочие)
    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }
}
```

Добавление записи в hosts

```
127.0.0.1 tochka
```

Создание базы данных и применение миграций

```
php yii db-init
php yii migrate
```

В адресной строке браузера

```
http://tochka/task
```