FROM php:8.2-fpm
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN printf '[PHP]\ndate.timezone = "Europe/Warsaw"\n' > /usr/local/etc/php/conf.d/tzone.ini

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y install \
    apt-transport-https \
    wget \
    gnupg \
    libssh2-1 \
    libssh2-1-dev \
    locales \
    libonig-dev \
    libxml2-dev \
    unzip \
    zlib1g-dev \
    libxml2-dev \
    libpng-dev \
    libicu-dev \
    libmcrypt-dev \
    libzip-dev \
    libfontconfig1 \
    libxrender1 \
    libxtst6 \
    libxi6 \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libpng-dev \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install selected php extensions
RUN docker-php-ext-install -j$(nproc) zip \
        pdo \
        pdo_mysql \
        mbstring \
        xml \
        gd \
        intl \
        zip \
        exif

RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd

RUN echo "pl_PL.UTF-8 UTF-8" >> /etc/locale.gen
RUN locale-gen
RUN ln -s $(which php) /usr/bin/php8.1

# Install composer
RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/usr/local/bin --filename=composer --2

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs npm

RUN echo 'alias bc="php bin/console"\n' \
'alias cc="php bin/console cache:clear"\n' >> ~/.bashrc

COPY php-ini-overrides.ini /usr/local/etc/php/php.ini
