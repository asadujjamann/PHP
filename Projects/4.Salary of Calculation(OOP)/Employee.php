<?php 
// Calculate the employee salary based on the id, name, number of working days, working hours per day, hourly rate, total leave taken.


class Employee{
    private $working_days;

    public function __construct(
        private int $id,
        private string $name,
        private int $total_leave_taken,
        private int $working_hours_per_day = 8,
        private int $hourly_rate = 15
    ) {
        
    }

    public function getSalaryAmount($total_days = 26) {
        $this->working_days = $total_days - $this->total_leave_taken;
        $salary = $this->working_days * $this->working_hours_per_day * $this->hourly_rate;
        return $salary;
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getTotalLeaveTaken() {
        return $this->total_leave_taken;
    }
    public function getWorkingHoursPerDay() {
        return $this->working_hours_per_day;
    }
    public function getHourlyRate() {
        return $this->hourly_rate;
    }
}

$employees = [
    new Employee(101, 'Asad', 0),
    new Employee(102, 'Mijan', 2, 9, 20)
];

echo "
<table border='1' cellspacing='0' cellpadding='10'>
<tr>
<th>Id</th>
<th>Name</th>
<th>Leave Taken (days)</th>
<th>Work Per day (hours)</th>
<th>Hourly Rate ($)</th>
<th>Salary ($)</th>
</tr>
";

foreach($employees as $employee){
    echo "<tr>";

    echo "<td> {$employee->getId()} </td>
        <td> {$employee->getName()} </td>
        <td> {$employee->getTotalLeaveTaken()} </td>
        <td> {$employee->getWorkingHoursPerDay()} </td>
        <td> {$employee->getHourlyRate()} </td>
        <td> {$employee->getSalaryAmount()} </td>";

    echo "</tr>";
}


echo "</table>";