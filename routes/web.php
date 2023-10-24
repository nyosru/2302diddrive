<?php

use App\Http\Controllers\DiDrive;
use App\Http\Controllers\DiDriveController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::livewire('/', 'avtoas/orders-show');
//Route::get('/orders', [DiDrive\OrderController::class, 'index']);

Route::get('/', [DiDriveController::class, 'index']);
Route::get('/orders', \App\Livewire\Avtoas\OrdersShow::class );
Route::get('/logs', \App\Livewire\Didrive\Log::class );

//
//Route::get('{any?}', [DiDriveController::class, 'index0']);


// super hacker
if (1 == 2) {


    function asdd($start, $num = 0, $list = [])
    {

        $n = hexdec($start);

//    if( $num == 0 ){ $start = 0; $end = -10; }
//    else if( $num == 2 ){ $start = 2; $end = -12; }
        $start = 0;
        $end = -15;
        $inar = -11 - $num;
//    $start = 0-$num; $end = -10-$num }

        echo '<table>';
        $e = 0;
        for ($i = $start + 15; $i >= $end; $i--) {
            $e++;
            echo '<tr><td>' .
                ($i == $num ? '<span style="background-color:#eeffee;">' : '') .
                $i .
                ' / ' .
//            ($list[(($i * -1) + $num * 2)] ?? '') .
                ($list[(($i) + $num * 2)] ?? '') .

//            ' /= ' .
//            ($inar + $e) .
//            ' /= ' .
//            ($list[$inar + $e] ?? '') .

                ' / ' .
//            (($i * -1) + $num * 2) .
                (($i) + $num * 2) .
                ' </td><td>' .
                dechex(($n + ($i * 48))) .
                ' ' .
                ($i == $num ? '(+)' : '') .
                ($i == $num ? '</span>' : '');
            echo '</td></tr>';
        }
        echo '</table>';
    }


    Route::get('/33', function (Request $re) {

        $l = [];
        $l[] = '2B96D01F4'; // eda
        $l[] = '2B96D00A4'; // brevna
        $l[] = '2B96D8F14'; // kamni
        $l[] = '2B96D8DC4'; // gelezo
        $l[] = '2B96D8C74'; // oil
        $l[] = '2b96d8b24'; // gas
        $l[] = '2B96D86A4'; // benzik
        $l = [];
        $l[] = '1'; //
        $l[] = '25E1F4014'; // eda
        $l[] = '25E1FD074'; // cement
        $l[] = '25E1FD5B4'; // stal
        $l[] = ''; //

        checkRaznica($l);

    });


    function checkRaznica($ar)
    {
        $last = 0;

        foreach ($ar as $t) {
            echo $t . ' = ' .
                hexdec($t) . ' // ' .
                ($last > 0 ? $last - hexdec($t) : 0);

            $last = hexdec($t);
            echo '<br/>';
        }
    }


    Route::get('/22', function (Request $re) {

//    dd( $_GET['cod'] );
        $list = [
            'eda', // 55
            'zelen', // 52
            'brevna', // 4f
            'camni', // 4c
            'a0', // 49
            'doski', // 46
            'kirpich', // 43
            'gelezo', // 40
            'gas', // 3d
            'oil', // 3a
            'steklo', // 37
            'a1', // 34
            'a2', // 31
            'a3', //
            'a4', //
        ];

        echo '<form action="/22" method="get">
<input type="text" name="cod" value="' . ($_GET['cod'] ?? '') . '"/>
<Select name="start">';
        foreach ($list as $k => $v) {
            echo '<option value="' . $k . '">' . $v . '</opton>';
        }
        echo '</Select>
<button type="submit" >показать</button>
</form>';

        if (empty($_GET['cod']))
            return '';

        asdd($_GET['cod'], $_GET['start'] ?? 0, $list);

//    //    die(77);
//
        $e = [];

        $e[] = '1E21C35B4'; // eda
        $e[] = '1E21C3464'; //brevno
        $e[] = '1E21C3314'; // kamni
//    $e[] = '';
//    $e[] = '';
//
//    $e[] = '288bd2bb4';
//    $e[] = '288bd2b84';
//    $e[] = '288bd2b54';
//    $e[] = '288bd2b24';
//    $e[] = '288bd2af4';
//    $e[] = '288bd2ac4';

        if (1 == 2) {
            $last = 0;

            foreach ($e as $t) {
                echo $t . ' = ' . hexdec($t) . ' // ' . ($last > 0 ? $last - hexdec($t) : 0);
                $last = hexdec($t);
                echo '<br/>';

                /*
        //<?xml version="1.0" encoding="utf-8"?>
        <!--<CheatTable>-->
        <!--  <CheatEntries>-->
        <!--    <CheatEntry>-->
        <!--      <ID>3</ID>-->
        <!--      <Description>"metal 2"</Description>-->
        <!--      <VariableType>4 Bytes</VariableType>-->
        <!--      <Address>2B9555164</Address>-->
        <!--    </CheatEntry>-->
        <!--  </CheatEntries>-->
        <!--</CheatTable>-->
        */


            }
        }

//    dd(123);

        $t = '555a94';
        $t = $_GET['cod'] ?? '11';

        $s =
            '<?xml version="1.0" encoding="utf-8"?>
<CheatTable><CheatEntries>';

        $prom = 336;
//    $prom = 336/6;
//    $prom = 46;

        for ($a = 0; $a <= 20; $a++) {

            $hex = dechex(hexdec($t) + $prom * ($a * -1));

            echo
                $a . ' // ' .
                dechex(hexdec($t) + 336 * $a) .
                ' // ' .
                dechex(hexdec($t) + 336 * $a) .
                '<Br/>';


            $s .= '<CheatEntry>
      <ID>' . $a . '</ID>
      <Description>"' . ($list[$a] ?? 'x' . $a) . '"</Description>
      <VariableType>4 Bytes</VariableType>
      <Address>' . $hex . '</Address>
    </CheatEntry>';


//  <CheatEntries>
//    <CheatEntry>
//      <ID>0</ID>
//      <Description>"eda"</Description>
//      <VariableType>4 Bytes</VariableType>
//      <Address>2B96D01F4</Address>
//    </CheatEntry>
//    <CheatEntry>
//      <ID>2</ID>
//      <Description>"No description"</Description>
//      <VariableType>4 Bytes</VariableType>
//      <Address>2B96D00A4</Address>
//    </CheatEntry>
//  </CheatEntries>


        }

        $s .= '</CheatEntries></CheatTable>';

        echo '<textarea rows="10" style="width:100%;" >' . $s . '</textarea>';

//    return view('welcome');
    });


}

if( 1 == 2 ) {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
}
