# Dockerfile
#
# SEE: https://github.com/docker-library/php/blob/67efd89c36bf15cb5ba096213e0536b2cab5eb38/7.2/stretch/apache/Dockerfile
#
FROM debian:stretch

MAINTAINER ViraWeb123.ir <info@viraweb123.com>

###########################################################
# Build process
###########################################################
RUN apt-get update

# Install SSL
# SEE: https://certbot.eff.org/docs/using.html?highlight=hook#pre-and-post-validation-hooks
RUN apt-get install --no-install-recommends -y certbot
RUN apt-get install --no-install-recommends -y openjdk-8-jre-headless ca-certificates-java
COPY "webpich-dns-server-0.0.1.jar" /root


WORKDIR /root
ENTRYPOINT ["java", "-jar", "webpich-dns-server-0.0.1.jar"]
