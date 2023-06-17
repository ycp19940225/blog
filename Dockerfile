FROM webdevops/php-nginx:7.3


WORKDIR /app

RUN apt-get update && \
    apt-get install zip unzip

#CMD bash start.sh
COPY . .
RUN chmod +x /app/start.sh

CMD ["sh", "/app/start.sh"]