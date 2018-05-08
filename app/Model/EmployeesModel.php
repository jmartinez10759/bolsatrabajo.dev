<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeesModel extends Model
{
    
    protected $table = "employees";
    protected $connection = "blm_mysql";
    public $timestamps = false;
    public $fillable = [
		'id'
		,'account_person_id'
		,'account_id'
		,'employee_type_id'
		,'account_job_position_id'
		,'account_division_department_id'
		,'employee_status_id'
		,'person_id'
		,'photo'
		,'position'
		,'department'
		,'begin_date'
		,'end_date'
		,'is_active'
		,'is_deleted'
		,'user_id'
		,'mark_id'
		,'registro_patronal_id'
		,'unidad_medicina_familiar_id'
		,'working_days_type_id'
		,'salary_type_id'
		,'salario_diario_integrado'
		,'salario_infonavit'
		,'fecha_del_movimiento'
		,'clave_del_trabajador'
		,'created'
		,'modified'
    ];































}
