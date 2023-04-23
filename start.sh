cd book-store
bash -c "composer update"

cd ..
docker-compose build
docker-compose up -d

docker exec book-store-myapp-1 bash -c "php artisan migrate --force"