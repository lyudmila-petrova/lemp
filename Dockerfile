FROM ubuntu:20.04

EXPOSE 80
EXPOSE 3306

ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y supervisor nginx php-fpm mysql-server php-mysql && apt clean

RUN sed -i 's/listen = .*/listen = 127.0.0.1:9000/' /etc/php/*/fpm/pool.d/www.conf

COPY ./supervisor/nginx.conf /etc/supervisor/conf.d/
COPY ./supervisor/php.conf /etc/supervisor/conf.d/
COPY ./supervisor/mysqld.conf /etc/supervisor/conf.d/

COPY ./bootstrap/init_mysql.sh /init_mysql.sh
RUN bash init_mysql.sh

COPY nginx_config/default /etc/nginx/sites-available/

COPY ./data /data

WORKDIR /data

CMD ["supervisord", "-n"]
