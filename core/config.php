
<?php
$ip = $_SERVER['REMOTE_ADDR'];

define('GDB_HOST', "localhost");
define('GDB_USER', 'root');
define('GDB_PASS', '');
define('GDB_NAME', 'gollis');
define('ROOT_PATH', '/');
define('REL_DIR', dirname(__FILE__));

define("SB" ,DIRECTORY_SEPARATOR);

define('ROOT_URL', rtrim('http://localhost/gollis/', '/'));
define('DB_ERR', '<div class="p-2 mt-2 bg-info text-white text-center">  عفواً لوجود مشكلة في قاعدة البيانات      </div>');
define('ERR_WARNING', '<div class="p-2 mt-2 bg-danger text-white text-center">  عفواً لعدم اكتمال العملية بسبب العلة رقم      </div>');
define('ERR_EMPTY', '<div class="p-2 mt-2 bg-warning text-dark text-center">  تأكد من ملئ جميع الحقول المطلوبة      </div>');
define('NOT_UPDATED', '<div class="p-2 mt-2 bg-warning text-dark text-center">  لم تنجح عملية التحديث    </div>');
define('SUCCESS', '<div class="p-2 mt-2 success-color-dark text-white text-center">  تم اكمال العملية بنجاح      </div>');
define('ERR_NUMBER', '<div class="p-2 mt-2 bg-warning text-center">  لا يسمح بادخال الأرقام       </div>');
define('ERR_TEXT', '<div class="p-2 mt-2 bg-warning text-center">  لا يسمح بادخال الحروف       </div>');
define('ERR_CONFIRM', '<div class="p-2 mt-2 bg-warning text-center">  الرجاء تأكيد كلمة المرور        </div>');
define('ERR_LOGIN', '<div class="p-2 mt-2 bg-danger text-white text-center">  اسم المستخدم أو كلمة المرور خطأ        </div>');
define('SUCCESS_LOGIN', '<div class="p-2 mt-2 success-color-dark text-center text-white">  مرحباً بك مرة أخرى، أنت الآن في الصفحة الرئيسية        </div>');
define('ERR_STRLEN', '<div class="p-2 mt-2 bg-danger text-center"> فضلاً كلمة المرور يجب أن تكون أكير من 6 كلمات       </div>');
date_default_timezone_set('Asia/Kuwait');
define('Your_here', $_GET['controller'] . '::' . $_GET['action']);
define('FILE_TYPE_ERR', '<div class="p-2 mt-2 bg-danger text-white text-center">  عفواً ولكن الملف المختار غير مسموح به      </div>');
define('FILE_SIZE_ERR', '<div class="p-2 mt-2 bg-danger text-white text-center">  عفواً ولكن حجم الصورة كبيرة جداً      </div>');
define('File_Not_Founded', '<div class="p-2 mt-2 alert alert-danger   text-center">          عفواً ولكن الملف غير موجود       </div>');
define('Data_Not_Founded', '<div class="p-2 mt-2 alert alert-danger   text-center">          عفواً ولكن لا توجد بيانات لعرضها       </div>');
define('SELECT_ID', '<div class="p-2 mt-2 alert alert-danger   text-center">          عفواً ولكن لم تختر   %s       </div>');
define('SMALL_FILE_SIZE', '<div class="p-2 mt-2 alert alert-danger   text-center">       عفوا ولكن حجم الملف صغير جداً         </div>');
define('FILE_NOT_UPLOADED_CORRCET', '<div class="p-2 mt-2 alert alert-danger   text-center">      عفواً، ولكن لم نتمكن من رفع الملف المحدد         </div>');
define("SUCCESS_EXPORT_DATABASE", '<div class="p-2 mt-2 success-color-dark text-white text-center">          تم اضافة الملف لقائمة تحميل ملفات القاعدة       </div>');
define("NOT_CHOSIN_FILE_TO_UPLOAD", '<div class="p-2 mt-2 alert alert-danger   text-center">           عفواً، ولكن لم تختر ملفاً لرفعه        </div>');
define("ERR_UPLOADS", '<div class="p-2 mt-2 alert alert-danger   text-center">            لا يمكن رفع الملف        </div>');

define("NO_ALLOW_UNDER_ZERO", '<div class="p-2 mt-2 alert alert-danger   text-center">         عفواً، ولكن لايسمح بإدخال أرقام أقل من الصفر        </div>');
define("MUST_INSERT_UP_OF_ZERO", '<div class="p-2 mt-2 alert alert-danger   text-center w-75 m-auto">         عفواً، عليك بإدخال الأرقام فوق الأكبر من الصفر           </div>');

define('NOT_EMAIL', '<div class="p-2 mt-2 alert alert-danger   text-center">    الرجاء التأكد من صحة البريد الإلكتروني       </div>');
define('EMAIL_NOT_SEND', '<div class="p-2 mt-2 alert alert-danger   text-center">   لم يتم ارسال الرسالة بنجاح      </div>');
define('EXPIRE_REST_LINK', '<div class="p-2 mt-2 alert alert-danger   text-center">   عفواً، لكن رابط اعادة كلمة المرور قد انتهى وقته      </div>');
define("PASS_WORD_RESET_SUCCESSFULLY", '<div class="p-2 mt-2 alert alert-success   text-center">       تم اعادة كلمة المرور بشكل ناجح  \r\n الرجاء مراجعة الإيميل الخاص بك   </div>');


$_SESSION['ROOT_URL'] = ROOT_URL;
