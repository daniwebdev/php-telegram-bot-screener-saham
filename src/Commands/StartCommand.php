<?php
namespace DANIWEBDEV\BotTelegramStockScreener\Commands;

class StartCommand extends \Longman\TelegramBot\Commands\SystemCommand {

    protected $name = 'start';
    protected $description = "Start Command";
    protected $usage = '/start';


    public function execute(): \Longman\TelegramBot\Entities\ServerResponse {
        

        $this->replyToChat("Hi!, silahkan gunakan /screener untuk melakukan filter saham");

        $this->replyToChat('Variable yang tersedia adalah :
```$open
$high
$low
$close
$volume
$Prev1Open
$Prev2Open
$Prev3Open
$Prev4Open
$Prev5Open
$Prev1Close
$Prev2Close
$Prev3Close
$Prev4Close
$Prev5Close
$Prev1High
$Prev2High
$Prev3High
$Prev4High
$Prev5High
$Prev1Low
$Prev2Low
$Prev3Low
$Prev4Low
$Prev5Low
$change
$changePct
$MA10
$MA20
$MA50
$MA200
$EMA10
$EMA20
$EMA50
$EMA200
$RSI
$Day20MA
$Upper
$Lower
$Day12EMA
$Day26EMA
$MACD
$SignalLine
$StochOSC
$TR
$ATR
$Day9High
$Day9Low
$Day26High
$Day26Low
$Day52High
$Day52Low```
', ['parse_mode' => 'MarkdownV2']);

return $this->replyToChat('
Mendapatkan saham dengan perubahan harga lebih dari 3%

```
/screener
\(\(\($high - $Prev1Close\) /  $Prev1Close\) \* 100\) \> 3
```
', 
['parse_mode' => 'MarkdownV2']);
    }
}