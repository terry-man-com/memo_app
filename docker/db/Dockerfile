FROM mariadb:10.7.1

RUN apt-get update -qq \
    && apt-get install -y locales \
    && locale-gen ja_JP.UTF-8 \
    && echo "export LANG=ja_JP.UTF-8" >> ~/.bashrc

ENV LANG ja_JP.UTF-8
ENV LC_CTYPE ja_JP.UTF-8
RUN localedef -f UTF-8 -i ja_JP ja_JP.utf8
ENV LC_ALL ja_JP.UTF-8

RUN echo 'export PS1="\n\[\033[32m\]\u@\h\[\033[00m\]:\[\033[36m\]\w\[\033[00m\]\n[db] \$ "' >> ~/.bashrc