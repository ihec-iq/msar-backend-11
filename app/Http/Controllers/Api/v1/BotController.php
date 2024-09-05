<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\HrDocumentResource;
use App\Http\Resources\Vacation\VacationResource;
use App\Models\Document;
use App\Models\Employee;
use App\Models\HrDocument;
use App\Models\Vacation;
use Artisan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Process\Exceptions\ProcessFailedException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Process;
use Telegram\Bot\Api;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

enum MessageCommand: string
{
    case Start = '/start';
    case Services = '/services';
    case Command = '/command';
    case Profile = '/profile';
    // etc.
}
enum KeyboardMessageCommand: string
{
    case VacationReport = 'استعلام عن رصيد الاجازات';
    case VacationDaily = 'الاجازات الاعتيادية';
    case VacationTimely = 'الاجازات الزمنية';
    case VacationSick = 'الاجازات المرضية';
    case CommandQuery = 'تنفيذ امر';
    case HrDocument = 'ضبارتي الشخصية';

    // etc.
}

class BotController extends Controller
{
    protected $telegram;

    protected $chat_id = '563390643';

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getMe()
    {
        $response = $this->telegram->getMe();

        return $response;
    }

    public function getUpdates($offset = 0)
    {
        $updates = $this->telegram->getUpdates(['offset' => $offset]);

        //Log::info($updates);
        return $updates;
    }

    public function onBoard(Request $request)
    {

        //$updates = $this->telegram->getUpdates();
        //Log::info($request);
        //Log::info($updates);
        // return $updates;


        $update = Telegram::getWebhookUpdates();

        if ($update->isType('callback_query')) {
            $callbackQuery = $update->getCallbackQuery();
            $data = $callbackQuery->getData();
            $chatId = $callbackQuery->getMessage()->getChat()->getId();



            $delimiter = ":";
            $array = explode($delimiter, $data);

            if (is_array($array) && count($array) > 0) {
                // The result is a non-empty array
                $idOrPath = $array[1];
                $this->SendFile($idOrPath, $chatId);
            } else {
                // The result is not an array or it's empty

                // Handle the callback data
                switch ($data) {
                    case 'data_1':
                        Telegram::sendMessage([
                            'chat_id' => $chatId,
                            'text' => 'You clicked Button 1'
                        ]);
                        break;
                    case 'data_2':
                        Telegram::sendMessage([
                            'chat_id' => $chatId,
                            'text' => 'You clicked Button 2'
                        ]);
                        break;
                        // Add more cases as needed
                }

            }





        } else {


            $chat_id = $request->message['from']['id'];
            $first_name = $request->message['from']['first_name'];
            $reply_to_message_id = $request->message['message_id'];
            $message = $request->message;
            $msg = $request->message['text'];
            //Log::alert('onBoard : ' . $msg);

            // $response = Telegram::setAsyncRequest(true)->sendMessage([
            //     'chat_id' => $chat_id,
            //     'text' => "Hi From Bot",
            //     'reply_to_message_id' => $reply_to_message_id
            // ]);
            //Log::alert("Msg : " . $msg);

            if ($msg == MessageCommand::Start->value) {
                $this->startReplayCommand(message: $message);
            } elseif ($msg == MessageCommand::Services->value) {
                $this->serviceReplayCommand(message: $message);
            } elseif ($msg == MessageCommand::Command->value) {
                $this->commandReplayCommand(message: $message);
            } elseif ($msg == MessageCommand::Profile->value) {
                $this->profileReplayCommand(message: $message);
            } else {
                $this->parseReplayCommand(message: $message);
            }
        }
    }
    //region funs for replays
    public function serviceReplayCommand($message)
    {
        $chat_id = $message['from']['id'];
        $reply_to_message_id = $message['message_id'];
        $reply_markup = Keyboard::make()
            ->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->row([
                Keyboard::button(KeyboardMessageCommand::VacationReport->value),
                Keyboard::button(KeyboardMessageCommand::VacationDaily->value),
            ])
            ->row([
                    Keyboard::button(KeyboardMessageCommand::VacationTimely->value),
                    Keyboard::button(KeyboardMessageCommand::VacationSick->value),
                ])
            ->row([
                    Keyboard::button(KeyboardMessageCommand::HrDocument->value),
               ]);
        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => '🤖 قم بأختيار الخدمات المتوفرة من القائمة ادناه :',
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ]);

        // $inlineKeyboard = [
        //     [
        //         ['text' => 'Button 1', 'callback_data' => 'data_1'],
        //         ['text' => 'Button 2', 'callback_data' => 'data_2']
        //     ],
        //     [
        //         ['text' => 'Button 3', 'callback_data' => 'data_3']
        //     ]
        // ];


        // $keyboard = Keyboard::make()->inline()->row(...$inlineKeyboard);

        // Telegram::sendMessage([
        //     'chat_id' => $chat_id,
        //      'reply_to_message_id' => $reply_to_message_id,
        //      'text' => 'Choose an option:',
        //     'reply_markup' => $keyboard
        // ]);

    }

    public function commandReplayCommand($message)
    {
        $chat_id = $message['from']['id'];
        $reply_to_message_id = $message['message_id'];
        $reply_markup = Keyboard::make()
            ->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->row([
                Keyboard::button(KeyboardMessageCommand::CommandQuery->value),
            ]);
        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => '🤖 قم بأختيار الخدمات المتوفرة من القائمة ادناه :',
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ]);
    }

    public function profileReplayCommand($message)
    {
        $chat_id = $message['from']['id'];
        $reply_to_message_id = $message['message_id'];
        $reply_markup = Keyboard::make()
            ->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->row([]);
        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => '🤖 قم بأختيار الخدمات المتوفرة من القائمة ادناه :',
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ]);
    }

    public function startReplayCommand($message)
    {
        $chat_id = $message['from']['id'];
        $first_name = $message['from']['first_name'];
        $reply_to_message_id = $message['message_id'];
        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => 'مرحباً بك ' . $first_name . ' في 🤖 البوت الخاص بالمفوضية العليا المستقلة للانتخابات ',
            'reply_to_message_id' => $reply_to_message_id,
        ]);
    }

    public function removeReplayCommand($message)
    {
        $chat_id = $message['from']['id'];
        $reply_to_message_id = $message['message_id'];
        $reply_markup = Keyboard::remove(['selective' => false]);

        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => '',
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ]);
    }

    public function parseReplayCommand($message)
    {
        //Log::info($message);

        $chat_id = $message['from']['id'];
        $reply_to_message_id = $message['message_id'];
        $msg = $message['text'];
        $reply_markup = Keyboard::remove(['selective' => false]);

        //Log::alert($msg);

        //Log::alert("parseReplayCommand : " . $msg);

        $replay = ' 🤖 ';

        if ($msg == KeyboardMessageCommand::VacationReport->value) {
            $replay .= $this->getEmployeeVacationReport(chat_id: $chat_id);
        } elseif ($msg == KeyboardMessageCommand::VacationDaily->value) {
            $replay .= $this->getEmployeeVacationDailyReport(chat_id: $chat_id);
        } elseif ($msg == KeyboardMessageCommand::VacationTimely->value) {
            $replay .= $this->getEmployeeVacationTimeReport(chat_id: $chat_id);
        } elseif ($msg == KeyboardMessageCommand::VacationSick->value) {
            $replay .= $this->getEmployeeVacationSickReport(chat_id: $chat_id);
        } elseif ($msg == KeyboardMessageCommand::HrDocument->value) {
            $replay .= $this->getEmployeeHrDocument(chat_id: $chat_id);
            return ;
        } else {
            // $reMsg = explode(' ', $msg);
            // Log::alert($msg);
            if ($msg == KeyboardMessageCommand::CommandQuery->value) {
                $replay .= $this->executeCommandChangTelegramForEmployee(chat_id: $chat_id);
            } else {
                $replay .= 'حاليا لا تتوفر خدمة التواصل بشكل مباشر مع النظام , الخدمات المتوفرة متواجدة في القائمة المنسدلة , الرجاء الاخيار منها';
            }
        }
        // Log::alert('result from  parseReplayCommand : ' . $replay);
        if ($replay == '') {
            $replay = 'لا توجد نتائج للعرض';
        }
        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => $replay,
            'reply_to_message_id' => $reply_to_message_id,
            //'reply_markup' => $reply_markup

        ]);
    }

    //region Reports
    public function getEmployeeVacationReport($chat_id)
    {
        if ($chat_id == '') {
            $chat_id = '563390643';
        }
        //Log::alert("inside getEmployeeVacationReport : " . $chat_id );
        $replay = '';
        $employee = Employee::where(['telegram' => $chat_id])->first();
        //return $vacation;
        if ($employee) {
            $vacation = Vacation::withSum('VacationDaily as sumDaily', 'record')
                ->withSum('VacationTime as sumTime', 'record')
                ->withSum('VacationSick as sumSick', 'record')->find($employee->Vacation->id);
            $vacation = json_decode((new VacationResource($vacation))->toJson(), true);
            $replay = ' --- استعلام عن رصيد الاجازات  ' . "\n";
            $replay .= ' اسم الموظف ' . $employee->name . '  ' . "\n";
            $replay .= '  ------------------------ ' . "\n";
            $replay .= ' ===== تقرير يوم ' . date('Y/m/d') . ' =====';
            $replay .= ' الرصيد الاجازات المستحق الكلي' . ' : ' . round($vacation['deservedRecord'], 2) . ' يوم ' . "\n";
            $replay .= ' الرصد المستنفذ' . ' : ' . round($vacation['totalTaken'], 2) . ' يوم ' . "\n";
            $replay .= ' الرصيد المتبقي' . ' : ' . round($vacation['remaining'], 2) . ' يوم ' . "\n";
            $replay .= ' عدد الاجازات المأخوذة هذه السنة' . ' : ' . round($vacation['currentYearVacations'], 2) . ' يوم ' . "\n";
            $replay .= ' عدد الاجازات الزمنية المأخوذة هذه السنة' .
                ' : ' . round($vacation['currentYearTimeVacations'], 2) . ' ساعة ' . "\n";
            $replay .= ' عدد الاجازات الاعتيادية المأخوذة هذه السنة' .
                ' : ' . round($vacation['currentYearDailyVacations'], 2) . ' يوم ' . "\n";
            $replay .= ' رصد الاجازات المرضية المستحق الكلي' . ' : ' . round($vacation['deservedSickRecord'], 2) . ' يوم ' . "\n";
            $replay .= ' رصيد المرضية المستنفذ' . ' : ' . round($vacation['takenSick'], 2) . ' يوم ' . "\n";
            $replay .= ' رصيد المرضية المتبقي' . ' : ' . round($vacation['remainingSick'], 2) . ' يوم ' . "\n";
            $replay .= ' عدد الاجازات المرضية مأخوذ هذه السنة' .
                ' : ' . round($vacation['currentYearSickVacations'], 2) . ' يوم ' . "\n";
            $replay .= ' =============================== ';
        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }
    public function getEmployeeVacationReportMy()
    {
        // $vacation = Vacation::withSum('VacationDaily as sumDaily', 'record')
        //     ->withSum('VacationTime as sumTime', 'record')
        //     ->withSum('VacationSick as sumSick', 'record')->find(auth()->user()->Employee->id);
        // $vacation = json_decode((new VacationResource($vacation))->toJson(), true);
        // return $this->ok($vacation);
        $response =  [
            'myVacationReport' => $this->getEmployeeVacationReportByID(auth()->user()->Employee->id)
        ];
        return $this->ok($response);
    }

    public function getEmployeeVacationReportByID($vacationId)
    {
        //Log::alert("inside getEmployeeVacationReport : " . $chat_id );
        $replay = '';
        //return $vacation;
        if ($vacationId) {
            $vacation = Vacation::withSum('VacationDaily as sumDaily', 'record')
                ->withSum('VacationTime as sumTime', 'record')
                ->withSum('VacationSick as sumSick', 'record')->find($vacationId);
            $vacation = json_decode((new VacationResource($vacation))->toJson(), true); //return $vacation;
            $replay = ' استعلام عن رصيد الاجازات  ' . "\n";

            $replay .= '  ------------------------ ' . "\n";
            $replay .= ' تقرير يوم ' . date('Y/m/d') . "\n";
            $replay .= '  ------------------------ ' . "\n";
            $replay .= ' اسم الموظف ' . $vacation['Employee']['name'] . '  ' . "\n";

            $replay .= ' الرصيد الاجازات المستحق الكلي' . ' : ' . round($vacation['deservedRecord'], 2) . ' يوم ' . "\n";
            $replay .= ' الرصد المستنفذ' . ' : ' . round($vacation['totalTaken'], 2) . ' يوم ' . "\n";
            $replay .= ' الرصيد المتبقي' . ' : ' . round($vacation['remaining'], 2) . ' يوم ' . "\n";
            $replay .= ' عدد الاجازات المأخوذة هذه السنة' . ' : ' . round($vacation['currentYearVacations'], 2) . ' يوم ' . "\n";
            $replay .= ' عدد الاجازات الزمنية المأخوذة هذه السنة' .
                ' : ' . round($vacation['currentYearTimeVacations'], 2) . ' ساعة ' . "\n";
            $replay .= ' عدد الاجازات الاعتيادية المأخوذة هذه السنة' .
                ' : ' . round($vacation['currentYearDailyVacations'], 2) . ' يوم ' . "\n";
            $replay .= ' رصد الاجازات المرضية المستحق الكلي' . ' : ' . round($vacation['deservedSickRecord'], 2) . ' يوم ' . "\n";
            $replay .= ' رصيد المرضية المستنفذ' . ' : ' . round($vacation['takenSick'], 2) . ' يوم ' . "\n";
            $replay .= ' رصيد المرضية المتبقي' . ' : ' . round($vacation['remainingSick'], 2) . ' يوم ' . "\n";
            $replay .= ' عدد الاجازات المرضية مأخوذ هذه السنة' .
                ' : ' . round($vacation['currentYearSickVacations'], 2) . ' يوم ' . "\n";
            $replay .= ' =============================== ';
        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }

    public function getEmployeeVacationDailyReport($chat_id)
    {
        $replay = '';
        $employee = Employee::where(['telegram' => $chat_id])->first();
        if ($employee) {
            $vactionController = new VacationDailyController();
            $replay = ' --- تقرير الاجازات الاعيادية   ' . "\n";
            $replay .= ' اسم الموظف ' . $employee->name . '  ' . "\n";
            $replay .= '  ------------------------ ' . "\n";
            $replay .= ' ===== تقرير يوم ' . date('Y/m/d') . ' =====';

            $replay .= $vactionController->dailyReportByEmployee(employeeId: $employee->id);
        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }

    public function getEmployeeVacationTimeReport($chat_id)
    {
        $replay = '';
        $employee = Employee::where(['telegram' => $chat_id])->first();
        if ($employee) {
            $vactionController = new VacationTimeController();
            $replay = ' --- تقرير الاجازات الزمنية  ' . "\n";
            $replay .= ' اسم الموظف ' . $employee->name . '  ' . "\n";
            $replay .= '  ------------------------ ' . "\n";
            $replay .= ' ===== تقرير يوم ' . date('Y/m/d') . ' =====';
            $replay .= $vactionController->timeReportByEmployee(employeeId: $employee->id);
        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }

    public function getEmployeeVacationSickReport($chat_id)
    {
        $replay = '';
        $employee = Employee::where(['telegram' => $chat_id])->first();
        if ($employee) {
            $vactionController = new VacationSickController();
            $replay = ' ================ تقرير الاجازات المرضية =============== ' . "\n";
            $replay .= ' ===== تقرير يوم ' . date('Y/m/d') . ' =============== ';
            $replay .= $vactionController->sickReportByEmployee(employeeId: $employee->id);
        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }
    public function getEmployeeHrDocument($chat_id)
    {
        $replay = '';
        $employee = Employee::where(['telegram' => $chat_id])->first();
        if ($employee) {
            $inlineKeyboard = [];
            $data = HrDocument::orderBy('issue_date', 'desc')
                        ->where('employee_id', '=', $employee->id)
                        ->get();
            $result = '';

            $data = json_decode((HrDocumentResource::collection($data))->toJson(), true);


            $replay = ' ================ ملفات الضبارة الخاصة بك =============== ' . "\n";
            $replay .= ' ===== تقرير يوم ' . date('Y/m/d') . ' =============== ';


            foreach ($data as $key => $value) {
                $result .=
                    "تسلسل الملف :#  " . $value['id'] . PHP_EOL .
                    "اسم الكتاب " . $value['title'] . PHP_EOL .
                    "نوع الكتاب " . $value['Type']['name']. PHP_EOL .
                    "تاريخ الكتاب " . $value['issueDate'] . PHP_EOL .
                    "المرافقات " . PHP_EOL ;

                $result .= "--------------------------------------------------". PHP_EOL;

                foreach ($value['FilesLocal'] as $keyFile => $file) {
                    $result .= "الملف  " .$keyFile. PHP_EOL ;
                    $result .= "اسم الملف  " . basename($file['path']) . PHP_EOL ;
                    $inlineKeyboard[] = ['text' => 'تحميل الملف '.$keyFile , 'callback_data' => 'Download:'.$file['id']];
                }

                //Log::alert($result);

                $replay .=   "\n".$result;

                $inlineKeyboard = [
                                                    [
                                                        ...$inlineKeyboard
                                                    ]
                                                 ];
                $keyboard = Keyboard::make()->inline()->row(...$inlineKeyboard);

                $response = Telegram::setAsyncRequest(true)->sendMessage([
                                                                  'chat_id' => $chat_id,
                                                                  'text' => $replay .'\n Choose an option:',
                                                                  'reply_markup' => $keyboard
                                                                  //'reply_to_message_id' => $reply_to_message_id,
                                                              ]);

                $result = "";
                $replay = "";



                //$inlineKeyboard = [];

            }
            // Log::alert($data);
            //Log::alert("hrDocumentReportByEmployee : " . $result);


            //$replay .= $hrDocumentController->hrDocumentReportByEmployee(employeeId: $employee->id);



            // $inlineKeyboard = [
            //     [
            //         ['text' => 'Button 1', 'callback_data' => 'data_1'],
            //         ['text' => 'Button 2', 'callback_data' => 'data_2']
            //     ],
            //     [
            //         ['text' => 'Button 3', 'callback_data' => 'data_3']
            //     ]
            // ];


            // Log::alert(...$inlineKeyboard);
            // Log::alert('finsh send keybord');

        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }
    public function SendFile($id, $chat_id)
    {
        $file = Document::find($id);

        $filename = $file->path;

        $fileBasename = basename($filename);
        if (Storage::exists($filename)) {
            $document = InputFile::create(storage_path('app/'.$file->path), $fileBasename);
            $response = Telegram::sendDocument([
                       'chat_id' => $chat_id, // Replace with the chat ID or username
                       'document' => $document, // Path to the file
                       'caption' => $fileBasename
                   ]);
            // return response()->json(['contents' => $contents , 'path' => $filename], 200);
        } else {
            //return response()->json(['message' => 'File not found', 'path' => $filename], 404);
        }

    }
    public function executeCommandChangTelegramForEmployee($chat_id)
    {
        $replay = '';
        $employee = Employee::where(['telegram' => $chat_id])->first();
        if ($employee) {
            $vactionController = new VacationSickController();
            $replay = ' ================  =============== ';
            $replay .= ' ===== يوم ' . date('Y/m/d') . ' =============== ';
        } else {
            $replay = 'لم يتم الربط مع حساب الموظف بعد , الرجاء التواصل مع مدير النظام لاكمال العملية';
        }

        return $replay;
    }
    //endregion

    //endregion
    public function sendMessage(Request $request)
    {

        // $response = Http::get('https://api.telegram.org/'.env('TELEGRAM_BOT_TOKEN').'/sendMessage?chat_id=563390643&text=FromLaravel');
        // return $response;
        $chat_id = '';
        $message = '';
        $reply_to_message_id = '';
        if (!isset($request->chat_id) || $request->chat_id == '') {
            $chat_id = $this->chat_id;
        } else {
            $chat_id = $request->chat_id;
        }
        if (isset($request->message)) {
            $message = $request->message;
        }
        if (isset($request->reply_to_message_id)) {
            $reply_to_message_id = $request->reply_to_message_id;
        }

        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => $message,
            'reply_to_message_id' => $reply_to_message_id,
        ]);

        //$response->getMessageId();
        return $response;
    }

    public function sendMessageChatId($chat_id, $message)
    {
        $response = Telegram::setAsyncRequest(true)->sendMessage([
            'chat_id' => $chat_id,
            'text' => $message,
        ]);

        $response->getMessageId();

        return $response;
    }

    public function sendPhoto(Request $request)
    {

        // $response = Http::get('https://api.telegram.org/'.env('TELEGRAM_BOT_TOKEN').'/sendMessage?chat_id=563390643&text=FromLaravel');
        // return $response;
        $path = config('app.url') . Storage::url('public/archives/2/20240404064136SWScan00001.pdf');
        $response = $this->telegram->sendPhoto([
            'chat_id' => $this->chat_id,
            'photo' => $path,
            'caption' => 'Some caption',
        ]);

        $response->getMessageId();

        return $response;
    }

    public function getUserProfilePhotos(Request $request)
    {

        // $response = Http::get('https://api.telegram.org/'.env('TELEGRAM_BOT_TOKEN').'/sendMessage?chat_id=563390643&text=FromLaravel');
        // return $response;
        $response = $this->telegram->getUserProfilePhotos(['user_id' => $this->chat_id]);

        $photos_count = $response->getTotalCount();
        $photos = $response->getPhotos();

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
