FROM phpswoole/swoole:php8.0-alpine

COPY ./docker/php.ini /usr/local/etc/php/
COPY ./docker/opcache.ini /usr/local/etc/php/conf.d/

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1
ENV COMPOSER_MEMORY_LIMIT -1
ENV COMPOSER_HOME /composer

RUN apk upgrade --update \
  && apk --no-cache add --virtual .build-dependencies \
  wget \
  unzip \
  git \
  tzdata \
  oniguruma-dev \
  && docker-php-ext-install -j$(nproc) \
  bcmath \
  opcache \
  && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
  && apk del .build-dependencies \
  && rm -rf /var/cache/apk/*
