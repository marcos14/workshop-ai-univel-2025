FROM php:7.4-apache

# Instalar dependências necessárias
RUN docker-php-ext-install mysqli

# Copiar arquivos da aplicação para o diretório padrão do Apache
COPY . /var/www/html/

# Expor a porta 80 para acesso HTTP
EXPOSE 80
