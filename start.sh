cd book-store
bash -c "composer config process-timeout 900"
bash -c "composer update"

cd ..
docker-compose build
docker-compose up -d

# TODO: Improve this!!!
docker exec book-store-myapp-1 bash -c "php artisan migrate --force"
docker exec book-store-myapp-1 bash -c "php artisan migrate:fresh --seed"
docker exec book-store-myapp-1 bash -c "npm install"
docker exec book-store-myapp-1 bash -c "npm run build"