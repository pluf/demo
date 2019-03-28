FROM node:10.15-alpine

# install chromium and clear cache
ENV CHROME_BIN=/usr/bin/chromium-browser
ENV CHROME_PATH=/usr/lib/chromium/
RUN apk add --update-cache chromium && \
	rm -rf /var/cache/apk/* /tmp/*

# Run environment
ENV SERVER_DIR /root
WORKDIR ${SERVER_DIR}
EXPOSE 3000
CMD ["node", "server.js"]

# install npm packages
COPY ./package.json $SERVER_DIR
RUN npm install --no-package-lock

# Copy project files
COPY ./server.js $SERVER_DIR
COPY ./plugins $SERVER_DIR/plugins