FROM mysql:5.7

#コンテナのOSのlocalが日本語になっていないため日本語化設定
RUN apt update \
    && apt-get install -y locales \
    && rm -rf /var/lib/apt/lists/* \
    && echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen ja_JP.UTF-8
ENV LC_ALL ja_JP.UTF-8