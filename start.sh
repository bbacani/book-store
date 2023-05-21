cd book-store
bash -c "composer config process-timeout 900"
bash -c "composer update"

cd ..
docker-compose build
docker-compose up -d

# Check if the database already exists
docker exec book-store-myapp-1 bash -c "php artisan migrate --pretend" > /dev/null 2>&1
if [ $? -eq 0 ]; then
  echo "Database already exists."
else
  echo "Creating the database."
  docker exec book-store-myapp-1 bash -c "php artisan migrate --force"
fi

docker exec book-store-myapp-1 bash -c "php artisan migrate:fresh --seed"
docker exec book-store-myapp-1 bash -c "npm install"
docker exec book-store-myapp-1 bash -c "npm run build"