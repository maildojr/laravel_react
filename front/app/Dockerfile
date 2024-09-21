# use node image
FROM node

# create app dir
RUN mkdir -p /usr/src/app

RUN chown node:node /usr/src/app

# set work dir
WORKDIR /usr/src/app

RUN chmod -R 777 /usr/src/app

# install app dependencies
RUN yarn install

# Ensure port 3000 is available to our system
EXPOSE 3000

# Run yarn dev for start
CMD ["yarn", "start"]