installation:
1) php artisan migrate
2) npm install
3) npm run dev
4) php artisan schedule:run

API of Guardian:
http://127.0.0.1:8000/api/v1/guardian

Api of newsApi:
http://127.0.0.1:8000/api/v1/newsapi

Accepted Selectors: 
'eq' => '=',
'lt' => '<',
'gt' => '>',
'lte' => '<=',
'gte' => '>=',
'ne' => '!='


example : http://127.0.0.1:8000/api/v1/guardian?type[eq]=article
