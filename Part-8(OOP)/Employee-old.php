<?php 
// Calculate the employee salary based on the id, name, number of working days, working hours per day, hourly rate, total leave taken.

// class Employee{
//     private $working_days;

//     public function __construct(
//         public int $id,
//         public string $name,
//         public int $total_leave_taken,
//         public int $working_hours_per_day = 8,
//         public int $hourly_rate = 15
//     ) {
        
//     }

//     public function getSalaryAmount($total_days){
//         $this->working_days = $total_days - $this->total_leave_taken;
//         $salary = $this->working_days * $this->working_hours_per_day * $this->hourly_rate;
//         return $salary;
//     }
// }

// $employee1 = new Employee(101, 'Asad', 0);
// echo $employee1->getSalaryAmount(26); echo "<br>";

// $employee2 = new Employee(101, 'Mijan', 2, 10, 20);
// echo $employee2->getSalaryAmount(26); echo "<br>";





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

    public function getSalaryAmount($total_days = 26){
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
    new Employee(102, 'Mijan', 2, 10, 20)
];

$modified_total_days = 20;  // You can modify this value

echo "<h3>Total working days considered for all employees: ";
if(isset($modified_total_days)){
    echo $modified_total_days;
}else{
    echo $employee->getSalaryAmount();
}
echo " Days </h3>";


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

    if(isset($modified_total_days)){
        $salary = $employee->getSalaryAmount($modified_total_days);
    }else{
        $salary = $employee->getSalaryAmount();
    }

    echo "<td> {$employee->getId()} </td>
        <td> {$employee->getName()} </td>
        <td> {$employee->getTotalLeaveTaken()} </td>
        <td> {$employee->getWorkingHoursPerDay()} </td>
        <td> {$employee->getHourlyRate()} </td>
        <td> {$salary} </td>";

    echo "</tr>";
}

echo "</table>";


// $employee1 = new Employee(101, 'Asad', 0);
// echo $employee1->getSalaryAmount(26);
// echo $employee1->getId();
// echo $employee1->getName();
// echo $employee1->getTotalLeaveTaken();
// echo $employee1->getWorkingHoursPerDay();
// echo $employee1->getHourlyRate();

// echo "<br>";

// $employee2 = new Employee(102, 'Mijan', 2, 10, 20);
// echo $employee2->getSalaryAmount(26);
// echo $employee2->getId();
// echo $employee2->getName();
// echo $employee2->getTotalLeaveTaken();
// echo $employee2->getWorkingHoursPerDay();
// echo $employee2->getHourlyRate();