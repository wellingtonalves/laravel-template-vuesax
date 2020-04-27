#!/bin/bash
GIT=`which git`
NPM=`which npm`
cd .. &&
${GIT} reset --hard HEAD && ${GIT} pull &&
echo "________Deploy iniciado...."
echo "________Rodando composer"
./composer.phar install &&
./composer.phar dumpautoload &&
echo "________Rodando npm"
${NPM} install &&
echo "________Copiando env"
cp .env.example .env &&
php artisan config:clear &&
php artisan view:clear &&
php artisan cache:clear &&
echo "________Criando link para storage"
php artisan storage:link &&
echo "________Migrando as tabelas"
php artisan migrate:fresh --seed &&
echo "________Gerando build..."
${NPM} run dev &&

echo "Finalizado" >> /var/www/versatil/scripts/webhook.log

