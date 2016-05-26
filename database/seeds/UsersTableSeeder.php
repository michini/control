<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Angélica Maria Tovar Navarro', 'username' => 'atovar','email'=>'atovar@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('atovaroca')],
            ['name' => 'Edwin Fredy Flores Alvarez', 'username' => 'efloresa','email'=>'efloresa@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('efloresaoca')],
            ['name' => 'Rocío Pilar Vargas Navarro', 'username' => 'rvargas','email'=>'rvargas@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('rvargasoca')],
            ['name' => 'Ángela Capcha Vasquez', 'username' => 'acapcha','email'=>'acapcha@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('acapchaoca')],
            ['name' => 'Lidda Edith Caro Meza', 'username' => 'lcaro','email'=>'lcaro@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('lcarooca')],
            ['name' => 'Gracce Stefani Córdova Sanchez', 'username' => 'gcordova','email'=>'gcordova@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('gcordovaoca')],
            ['name' => 'Yohel Milton Santivañez Ortega', 'username' => 'ysantivanez','email'=>'ysantivanez@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('ysantivanezoca')],
            ['name' => 'Ena Rosana Paucar Espinoza', 'username' => 'epaucare','email'=>'epaucare@continental.edu.pe','rol'=>'consejero','password'=>bcrypt('epaucareoca')],

            ['name' => 'Niltón Javier Arzapalo Marcelo', 'username' => 'narzapalo','email'=>'narzapalo@continental.edu.pe','rol'=>'docente','password'=>bcrypt('narzapalooca')],
            ['name' => 'Edgard Zubilete Rivera', 'username' => 'ezubilete','email'=>'ezubilete@continental.edu.pe','rol'=>'docente','password'=>bcrypt('ezubileteoca')],
            ['name' => 'Ever Luis Poma Tintaya', 'username' => 'epoma','email'=>'epoma@continental.edu.pe','rol'=>'docente','password'=>bcrypt('epomaoca')],
            ['name' => 'Orlando Pomalaza Romero', 'username' => 'opomalaza','email'=>'opomalaza@continental.edu.pe','rol'=>'docente','password'=>bcrypt('opomalazaoca')],
            ['name' => 'Justo Inga Flores', 'username' => 'jinga','email'=>'jinga@continental.edu.pe','rol'=>'docente','password'=>bcrypt('jingaoca')],
            ['name' => 'Yeny Luz Mucha Aquino', 'username' => 'ymucha','email'=>'ymucha@continental.edu.pe','rol'=>'docente','password'=>bcrypt('ymuchaoca')],
            ['name' => 'Joel Bastidas Vila', 'username' => 'jbastidas','email'=>'jbastidas@continental.edu.pe','rol'=>'docente','password'=>bcrypt('jbastidasoca')],
            ['name' => 'Luis Huamán y Calsina', 'username' => 'lhuaman','email'=>'lhuaman@continental.edu.pe','rol'=>'docente','password'=>bcrypt('lhuamanoca')],
            ['name' => 'Javier (Voluntario)', 'username' => 'javier','email'=>'javier@continental.edu.pe','rol'=>'docente','password'=>bcrypt('javieroca')],
        ]);
    }
}
