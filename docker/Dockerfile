#
# F2ML Webserver - front Dockerfile
#
FROM ubuntu:16.04

#================================================   
LABEL version="1.0"
LABEL description="Webserver PHP+AngularJs Container"


#================================================   

# Update the package repository
RUN apt-get update

#================================================
# Upgrade packages
RUN apt-get -y upgrade --fix-missing


RUN addgroup --gid 999 vboxsf 

RUN adduser www-data vboxsf

RUN apt-get install -y software-properties-common curl build-essential fakeroot dpkg-dev libcurl4-openssl-dev
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
ENV TZ=Europe/Paris
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update -y
#RUN dpkg-reconfigure -f noninteractive tzdata
RUN apt-get install -y \
        curl \
        apache2 \
        php7.2  \
        libapache2-mod-php7.2 \
        libpcre3-dev \
        libfreetype6-dev \
        libjpeg-turbo8 \
        libpng-dev \
        libmcrypt-dev \
        libicu-dev \
        libpq-dev \
        libbz2-dev \
        libxml2-dev \
        wget \
        libevent-dev \
        php7.2-iconv \
        php7.2-bz2 \
        php7.2-mbstring \
        php7.2-intl \
        php7.2-bcmath \
        php7.2-opcache \
        php7.2-gd \
        php7.2-soap \
        php7.2-opcache \
        php7.2-curl \
        php-xdebug \
        vim \
        nano \
        
         php7.2-dev \
         pkg-config \
        
         
         build-essential

RUN echo "deb http://packages.dotdeb.org jessie all" >> /etc/apt/sources.list.d/dotdeb.list
RUN gpg --keyserver keys.gnupg.net --recv-key 89DF5277
RUN gpg -a --export 89DF5277 | apt-key add -
RUN apt-get update -yqq
RUN apt-get install -y apt-file
RUN apt-get install git -yqq
RUN apt-get install -y apt-transport-https
RUN apt-get install -y zip unzip unixodbc-dev re2c gnupg2
RUN apt-get install -y php7.2-zip php7.2-tidy php7.2-dev php-pear re2c php7.2-xml php7.2-pgsql
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version

# install xdebug
COPY ./xdebug/xdebug.ini /etc/php/7.2/apache2/xdebug.ini
COPY ./xdebug/xdebug.ini /etc/php/7.2/cli/xdebug.ini

# Conf files - Apache
RUN rm -fr /etc/apache2/sites-available/
COPY ./apache/conf /etc/apache2/
RUN rm -fr /etc/apache2/sites-enabled \
    && ln -s /etc/apache2/sites-available /etc/apache2/sites-enabled
RUN apt-get install -y acl

COPY ./php /etc/php
RUN mkdir -p /var/www/html/SfAngularJs

RUN apt-get install -y curl supervisor

# NodeJs install from updated sources
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs

RUN apt-get install -y build-essential
#RUN npm install npm@latest -g
#RUN ln -sf /usr/bin/nodejs /usr/bin/node


RUN apt-get install -y git

WORKDIR /var/www/html/SfAngularJs/
#================================================




ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
RUN chown -R www-data:www-data /var/www/

RUN ln -s /etc/php/7.2/mods-available/xdebug.ini /etc/php/7.2/cli/conf.d/
RUN ln -s /etc/php/7.2/mods-available/xdebug.ini /etc/php/7.2/apache2/conf.d/
# installer wkhtmlto pdf

#================================================
# Entrypoint script
#COPY ./docker-entrypoint.sh /
#RUN chmod +x /docker-entrypoint.sh



#================================================ 
# Expose ports : HTTP SSL XDEBUG
EXPOSE 80 8082

#================================================ 

