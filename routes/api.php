<?php

//use App\Http\Controllers\API\V1\GoogleDriveController;

use App\Http\Resources\Hr\HrDocumentResource;
use App\Models\HrDocument;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;

require __DIR__.'/api/authRoute.php';
require __DIR__.'/api/archiveRoute.php';
require __DIR__.'/api/stockRoute.php';
require __DIR__.'/api/userRoute.php';
require __DIR__.'/api/employeeRoute.php';
require __DIR__.'/api/vacationRoute.php';
require __DIR__.'/api/botRoute.php';

Route::get('/', function () {
    return 'Workflow API running...';
});
//region upload file to drive
Route::get('/info', function () {
    return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
});
Route::get('/getBotInfo', function () {
    $url='https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/getWebhookInfo';// return $url;
    $reposnse = Http::get($url);
    return response()->json($reposnse->json());
});
Route::get('/setBotWebhook/{site}', function ($site) {
    $url='https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/setWebhook?url=https://'.$site.'/ihec-backend/public/api/bot/onBoard&drop_pending_updates=true';// return $url;
    $reposnse = Http::get($url);
    return response()->json($reposnse->json());
});

// Route::post('/upload', [GoogleDriveController::class, 'handleUpload']);
// Route::get('/upload/get', [GoogleDriveController::class, 'getRefreshToken']);
// Route::get('/info/drive', function () {
//     $client = new Google\Client();
//     $client->setAuthConfig(public_path('/storage/client_secret.json'));
//     $client->addScope(Google\Service\Drive::DRIVE);
//     $redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//     $client->setRedirectUri($redirect_uri);
//     if (isset($_GET['code'])) {
//         $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     }

//     return $_GET;
// });
//endregion
