FROM php:7.3-fpm

COPY php.ini /usr/local/etc/php/
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Xdebugをインストール
# pecl拡張を有効化
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update \
    && apt-get install -y locales \
    && apt-get install -y git \
    zlib1g-dev libzip-dev mysql-common wget npm \
    && docker-php-ext-install zip pdo_mysql \
    && locale-gen ja_JP.UTF-8 \
    && echo "export LANG=ja_JP.UTF-8" >> ~/.bashrc

ENV LANG ja_JP.UTF-8
ENV LC_CTYPE ja_JP.UTF-8
RUN localedef -f UTF-8 -i ja_JP ja_JP.utf8
ENV LC_ALL ja_JP.UTF-8

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer self-update --2
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer global require "laravel/installer"

WORKDIR /var/www/html

RUN echo 'export PS1="\n\[\033[35m\]\u@\h\[\033[00m\]:\[\033[36m\]\w\[\033[00m\]\n[app] \$ "' >> ~/.bashrc