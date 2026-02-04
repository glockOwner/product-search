composer install && \
cp .env.example .env && \
source ./.env && \
./vendor/bin/sail up -d && \
docker exec product-search-laravel.test-1 php artisan migrate && \
docker exec product-search-laravel.test-1 php artisan db:seed CategorySeeder && \
docker exec product-search-laravel.test-1 php artisan db:seed ProductSeeder
