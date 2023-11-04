# BOT TELEGRAM SCREENER SAHAM

## Persiapan

- Token Bot Telegram
- API Key [GOAPI](https://goapi.io/register)

## Update .env file

```bash
TELEGRAM_BOT_TOKEN=
TELEGRAM_BOT_USERNAME=
GOAPI_API_KEY=
```

## Jalankan

```bash
php server.php
```

## Contoh Command Script

### Mendapatkan saham dengan perubahan harga lebih dari 3%

```
/screener
((($high - $Prev1Close) /  $Prev1Close) * 100) > 3
```
