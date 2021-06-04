FROM alpine:3.9 as main

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk --update add ca-certificates \
    # Packages
    tini \
    git \
    zip \
    curl \
    php7 \
    php7-amqp \
    php7-dev \
    php7-common \
    php7-apcu \
    php7-bcmath \
    php7-ctype \
    php7-curl \
    php7-exif \
    php7-fileinfo \
    php7-gd \
    php7-iconv \
    php7-intl \
    php7-json \
    php7-mbstring \
    php7-opcache \
    php7-openssl \
    php7-pcntl \
    php7-pdo \
    php7-mysqlnd \
    php7-pdo_mysql \
    php7-pdo_pgsql \
    php7-phar \
    php7-posix \
    php7-session \
    php7-xml \
    php7-xsl \
    php7-zip \
    php7-zlib \
    php7-dom \
    php7-redis \
    php7-fpm \
    php7-tokenizer \
    php7-xmlwriter \
    php7-simplexml \
    php7-event \
    openssh \
	# Clean up
    && rm -rf /var/cache/apk/*

VOLUME ["/var/www/heros-worker-demo"]
WORKDIR /var/www/heros-worker-demo

CMD php composer.phar install && php bin/start start

EXPOSE 8080