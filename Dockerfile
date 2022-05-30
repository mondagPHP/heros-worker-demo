FROM php:8.0-alpine3.15

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/g' /etc/apk/repositories \
    && apk --update add --no-cache \
    # Packages
    zip \
    curl \
    # gd
    libpng-dev \
    libjpeg-turbo-dev \
    && docker-php-ext-install bcmath opcache pcntl pdo_mysql \
    # gd
    gd \
    && install-php-extensions sockets zip redis-5.3.6 event-3.0.6 \
    # Clean up
    && rm -rf /var/cache/apk/*

ADD . /var/www/heros-worker-demo
WORKDIR /var/www/heros-worker-demo
RUN php composer.phar config -g repo.packagist composer https://mirrors.aliyun.com/composer && php composer.phar install -vvv --no-dev

CMD php bin/start start

EXPOSE 8082