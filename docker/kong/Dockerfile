FROM kong:2.8.1-alpine

USER root

RUN apk add --no-cache curl git gcc musl-dev
RUN luarocks install kong-oidc && \
    luarocks install kong-jwt2header && \
    luarocks install kong-upstream-jwt && \
    luarocks install luaossl OPENSSL_DIR=/usr/local/kong CRYPTO_DIR=/usr/local/kong

USER kong
