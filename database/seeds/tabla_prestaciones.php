<?php

use Illuminate\Database\Seeder;

class tabla_prestaciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var[1]='Seguridad Social';
$var[2]='Aguinaldo';
$var[3]='Días de descanso ';
$var[4]='Vacaciones ';
$var[5]='Prima vacacional';
$var[6]='Prima dominical';
$var[7]='Pago de Utilidades';
$var[8]='Incapacidad por maternidad';
$var[9]='Licencia de paternidad';
$var[10]='Licencia por adopción';
$var[11]='Lactancia';
$var[12]='Prima de antigüedad';
$var[13]='Finiquito Laboral';
$var[14]='Liquidación';


$var2[1]='Tienes derecho a ser afiliado al Instituto Mexicano del Seguro Social (IMSS) para recibir atención médica gratuita y tramitar incapacidad por enfermedad, maternidad, entre otras.';
$var2[2]='Pago anual de 15 días de salario por un año completo laborando. De lo contrario, será la parte proporcional por el tiempo que lleves en la empresa. ';
$var2[3]='Un día de descanso por cada 6 días laborados. Además de los días de descanso obligatorios que indica la ley. ';
$var2[4]='Un año laboral cumplido te permite gozar de por lo menos 6 días de vacaciones, los cuales tendrán un incremento gradual.';
$var2[5]='Prestación que permite al trabajador un ingreso extra para disfrutar en sus vacaciones. ';
$var2[6]='Si trabajas el domingo o en tu día de descanso sea o no un fin de semana, deberán pagarse al menos 25 por ciento más de tu salario base ';
$var2[7]='Recibir una parte de las ganancias obtenidas por tu patrón en el año anterior que laboraste. El plazo para que recibas este pago es del 1 de abril al 30 de mayo si es una empresa y hasta el 29 de junio si es persona física. ';
$var2[8]='Si eres madre tienen derecho a un descanso de 6 semanas anteriores y 6 posteriores al parto sin dejar de percibir su salario íntegro durante este período. ';
$var2[9]='Si eres padres tienen derecho a disfrutar 5 días por paternidad a nacer tu hijo ';
$var2[10]='Madres trabajadoras tienen derecho a descansar 6 semanas si adoptan, para convivir con su hijo, en caso de los padres serán 5 días. ';
$var2[11]='En período de lactancia, las mamás tienen derecho a dos reposos extraordinarios por día. Estos de media hora cada uno, para alimentar a sus hijos. No deben descontar cantidad alguna a su salario. ';
$var2[12]='Si sumas 15 años o más de trabajo y decides terminar la relación laboral voluntariamente, deberás recibir un pago adicional de 12 días de salario por cada año trabajado. ';
$var2[13]='En caso de renuncia tienes derecho a recibir el salario del periodo que trabajaste, parte proporcional de aguinaldo, vacaciones, prima vacacional, utilidades y la prima de antigüedad (solo si tienes laborando 15 años o más). ';
$var2[14]='Si sufres un despido injustificado, tienes derecho a recibir una indemnización constitucional: pago de 3 meses de salario, aguinaldo, vacaciones, prima vacacional, utilidades y prima de antigüedad (en su caso). ';
		for ($i=1; $i <= 14; $i++) { 
			DB::table('prestaciones')->insert([
        	'nombre'=>$var[$i],
        	'descripcion'=>$var2[$i],
        	'estatus'=>1,
        ]);
		}
    }
}
