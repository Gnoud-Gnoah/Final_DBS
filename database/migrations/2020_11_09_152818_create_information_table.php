<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoten', 50);
            $table->dateTime('ngaysinh');
            $table->enum('gioitinh', ['male', 'female']);
            $table->enum('nhommau', ['O', 'A', 'B', 'AB']);
            $table->enum('honnhan', ['married', 'not married', 'divorce']);
            $table->string('noikhaisinh');
            $table->string('quequan');
            $table->enum('dantoc', ['BANA','BO Y','BRAU','BRU-VAN KIEU','CHAM','CHO RO','CHU-RU','CHUT',
            'CO','CO HO','CO LAO','CO TU',
            'CONG','DAO','E-ĐE','GIA RAI',
            'GIAY','GIE-TRIENG','HA NHI','HOA',
            'HRE','KHANG','KHMER','KHƠ MU',
            'LA CHI','LA HA','LA HU','LAO',
            'LO LO','LA','MA','MANG',
            'MNONG','MONG','MUONG','NGAI',
            'NUNG','O ĐU','PA THEN','PHU LA',
            'PU PEO','RA GLAI','RO MAM','SAN CHAY',
            'SAN DIU','SI LA','TA OI', 'TAY',
            'THAI','THO','KINH','XINH MUN',
            'XO ĐANG','XTIENG']);
            $table->bigInteger('socmnd')->unique();
            $table->string('noithuongchu');
            $table->string('noihientai');
            $table->longText('ghichu')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
