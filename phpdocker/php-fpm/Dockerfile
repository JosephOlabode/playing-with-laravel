FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"
# install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.2-mysql libmcrypt-dev \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /temp/* /var/tmp/* /usr/share/doc/*
