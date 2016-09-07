FROM openlabs/docker-wkhtmltopdf:latest
MAINTAINER Sergey Chuprunov <sergey2lee@gmail.com>

# can take from docker-compose also
ENV WKHTMLTOPDF_DATA=/tmp/wkhtmltopdf

# Install dependencies for running web service
RUN apt-get update && apt-get install -y \
    php5 \
    curl \
    nano

RUN mkdir ${WKHTMLTOPDF_DATA} && chmod 777 -R ${WKHTMLTOPDF_DATA}

#for nano working
ENV TERM xterm

ADD index.php /index.php
EXPOSE 80

# to make php -S handle sigterm
ENTRYPOINT ["php"]
CMD ["-S", "0.0.0.0:80"]