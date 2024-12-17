<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    public function testFactory()
    {
        $employee1 = Employee::Factory()->programmer()->make();
        $employee1->id = 1;
        $employee1->name = 'Employee 1';
        $employee1->save();

        self::assertNotNull(Employee::where('id', '1')->first());

        $employee2 = Employee::Factory()->seniorProgrammer()->create([
            'id' => 2,
            'name' => 'Employee 2',
        ]);

        self::assertNotNull($employee2);
        self::assertNotNull(Employee::where('id', '2')->first());
    }
}
