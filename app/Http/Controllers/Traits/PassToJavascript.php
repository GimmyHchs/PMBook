<?php
namespace App\Http\Controllers\Traits;

use JavaScript;
use Auth;
/**
 * 傳送變數至前端javascript
 */
trait PassToJavascript
{
    /**
     * 將 user資訊 傳送至 javascript
     */
    public function shareUserToJS()
    {
        $user = Auth::user();
        JavaScript::put([
            'user' => $user->toSafeArray()
        ]);
    }

    public function shareToJs($array)
    {
        JavaScript::put($array);
    }
}
