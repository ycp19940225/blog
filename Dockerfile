FROM webdevops/php-nginx:8.0-alpine

WORKDIR /app

RUN #apt update && \
#    apt install zip unzip

#CMD bash start.sh
#COPY . .
#RUN chmod +x /app/start.sh
#RUN chmod -R 777 storage

CMD ["sh", "/app/start.sh"]