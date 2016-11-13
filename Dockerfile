FROM greyltc/lamp

ENV MYSQL_HOST default_host
ENV MYSQL_PORT 3306
ENV MYSQL_DATABASE phpauth
ENV MYSQL_USER shepherdadmin
ENV MYSQL_PASSWORD defaultpassword

ENV START_APACHE true
ENV ALLOW_INSECURE true
ENV START_MYSQL false
ENV START_POSTGRESQL false

# here are the ports that various things in this container are listening on
# for http (apache, only if ALLOW_INSECURE = true)
EXPOSE 80
# for https (apache)
EXPOSE 443

ADD ["images","/srv/http/"]
ADD ["lib","/srv/http/"]
ADD ["packages","/srv/http/"]
ADD ["phpauth","/srv/http/"]
ADD ["*.php","/srv/http/"]

CMD sleep infinity