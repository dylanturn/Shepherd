FROM greyltc/lamp

ENV MYSQL_HOST
ENV MYSQL_PORT
ENV MYSQL_DATABASE
ENV MYSQL_USER
ENV MYSQL_PASSWORD

# start servers
ADD startServers.sh /usr/sbin/start-servers
ENV START_APACHE true
ENV ALLOW_INSECURE true
ENV START_MYSQL false
ENV START_POSTGRESQL false
ENV ENABLE_DAV false
ENV ENABLE_CRON true

# here are the ports that various things in this container are listening on
# for http (apache, only if ALLOW_INSECURE = true)
EXPOSE 80
# for https (apache)
EXPOSE 443
# for postgreSQL server (only if START_POSTGRESQL = true)
EXPOSE 5432
# for MySQL server (mariadb, only if START_MYSQL = true)
EXPOSE 3306

COPY Shepherd/ /srv/http
CMD sleep infinity