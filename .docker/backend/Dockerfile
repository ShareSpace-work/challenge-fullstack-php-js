FROM php:7.4-rc-fpm-alpine3.9

# Install extensions
RUN apk add --no-cache icu-dev
RUN apk add --no-cache rsync
RUN apk add --update --no-cache g++ gcc libxslt-dev
RUN docker-php-ext-install pdo_mysql bcmath intl xml
RUN apk add --no-cache bash

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

RUN apk add --update nodejs npm

# RUN apk add --no-cache $PHPIZE_DEPS \
#     && pecl install xdebug \
#     && docker-php-ext-enable xdebug

# Setup GD extension
RUN apk add --no-cache \
      freetype \
      libjpeg-turbo \
      libpng \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && docker-php-ext-configure gd \
      --with-freetype=/usr/include/ \
      --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && apk del --no-cache \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && rm -rf /tmp/*


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Create ssh user
ENV USER=docker
ENV UID=12345
ENV GID=23456

RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "$(pwd)" \
    --ingroup "www-data" \
    --no-create-home \
    --uid "$UID" \
    "$USER"

RUN apk add --no-cache wkhtmltopdf

#install locale
ENV MUSL_LOCALE_DEPS cmake make musl-dev gcc gettext-dev libintl
ENV MUSL_LOCPATH /usr/share/i18n/locales/musl

COPY musl-locales-master/ musl-locales-master

RUN apk add --no-cache \
    $MUSL_LOCALE_DEPS \
      && cd musl-locales-master \
      && cmake -DLOCALE_PROFILE=OFF -D CMAKE_INSTALL_PREFIX:PATH=/usr . && make && make install \
      && cd .. && rm -r musl-locales-master

# Install base packages
RUN apk update
RUN apk upgrade
RUN apk add ca-certificates && update-ca-certificates
# Change TimeZone
RUN apk add --update tzdata
ENV TZ=Europe/Warsaw
# Clean APK cache
RUN rm -rf /var/cache/apk/*