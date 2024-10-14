<?php 

// class Human{
//     public $human_name;
//     function sayHi(){
//         echo "Salam";
//     }
// }
// class Cat{
//     public $cat_name;
//     function sayHi(){
//         echo "Meow";
//     }
// }
// class Dog{
//     public $dog_name;
//     function sayHi(){
//         echo "Woof";
//     }
// }

// $human1 = new Human(); // instantiate
// $cat1 = new Cat(); // instantiate
// $dog1 = new Dog(); // instantiate

// $human1->human_name = "Asad"; // set property
// $cat1->cat_name = "Billi"; // set property
// $dog1->dog_name = "Tom"; // set property

// $human1->sayHi(); // get method
// echo $human1->human_name; // get property

// $cat1->sayHi(); // get method
// echo $cat1->cat_name; // get property

// $dog1->sayHi(); // get method
// echo $dog1->dog_name; // get property




// class Human{
//     public $human_name;
// }
// $human1 = new Human();



// class Human{
//     public $human_name;

//     function sayName(){
//         echo "My name is {$this->human_name}"; // access the property using 'this'
//     }
// }

// $human1 = new Human(); // instantiate
// $human1->human_name = "Asad"; // set property

// echo $human1->human_name; // get property
// $human1->sayName(); // get method





// So, where can we change the value of the $name property? There are two ways:
// 1. Inside the class (by adding a set_name() method and use $this):

// class Human{
//     public $human_name;
//     function sayName($name){
//         $this->human_name = $name;
//     }
// }
// $human1 = new Human(); // instantiate
// $human1->sayName("Asad"); // passing the argument
// echo $human1->human_name; // get property





// 2. Outside the class (by directly changing the property value)

// class Human{
//     public $human_name;
// }
// $human1 = new Human(); // instantiate
// $human1->human_name = "Asad"; // set property

// echo $human1->human_name; // get property

// var_dump($human1 instanceof Human);





// class Human{
//     public $human_name;
//     public $human_age;

//     // Name
//     function set_name($name){
//         $this->human_name = $name;
//     }
//     function get_name(){
//         return $this->human_name;
//     }

//     // Age
//     function set_age($age){
//         $this->human_age = $age;
//     }
//     function get_age(){
//         return $this->human_age;
//     }
// }
// $human1 = new Human();

// // Name
// $human1->set_name("Asadujjaman");
// echo $human1->get_name();

// // Age
// $human1->set_age("29");
// echo $human1->get_age();




// class Fruit{
//     public $fruit_name;
//     public $fruit_color;

//     function __construct($name){
//         $this->fruit_name = $name;
//     }
//     function get_name(){
//         return $this->fruit_name;
//     }
// }

// $fruit_1 = new Fruit("Apple");
// echo $fruit_1->get_name();

// $fruit_1 = new Fruit("Banana");
// echo $fruit_1->get_name();



// class Human{
//     public $human_name;
//     public $human_age;

//     function __construct($name, $age){
//         $this->human_name = $name;
//         $this->human_age = $age;
//     }
//     function get_name(){
//         return $this->human_name;
//     }
//     function get_age(){
//         return $this->human_age;
//     }
// }
// $human1 = new Human("Asad Bin Hasan", 29);
// echo $human1->get_name();
// echo $human1->get_age();




// class Human{
//     public $human_name;
//     public $human_age;

//     function __construct($name, $age=0){
//         $this->human_name = $name;
//         $this->human_age = $age;
//     }
//     function sayHi(){
//         echo "Salam ::: ";
//         $this->sayInfo();
//     }
//     function sayInfo(){
//         if($this->human_age){
//             echo "My name is {$this->human_name} and I'm {$this->human_age} years old" . "<br>";
//         }else{
//             echo "My name is {$this->human_name} and I don't know my age" . "<br>";
//         }
//     }
// }
// $human1 = new Human("Asad", 29);
// $human1->sayHi();

// $human2 = new Human("Nusaibah");
// $human2->sayHi();




// class Person{
//     private $birth_year; // not accessible outside the class

//     function __construct($year){
//         $this->birth_year = $year;
//     }
//     function current_age(){
//         echo 2024 - $this->birth_year;
//     }
// }

// $person1 = new Person(1995);
// $person1->current_age();





// class Fund{
//     public $fund;

//     function __construct($initial_fund = 0){
//         $this->fund = $initial_fund;
//     }
//     function add_fund($money){
//         $this->fund += $money;
//     }
//     function deduct_fund($money){
//         $this->fund -= $money;
//     }
//     function get_total(){
//         echo "Total fund is {$this->fund}";
//     }
// }

// $fund1 = new Fund(500);
// $fund1->get_total();





// class Fruits{
//     public $title = "New Title";
//     public function __construct(public string $content) {

//     }
//     public function printContent(){
//         echo $this->content; echo "<br>";
//         echo $this->title;
//     }
// }
// $fruit_1 = new Fruits("Hello Asad!");
// $fruit_1->printContent();




//////////////////////////////// The __destruct Function
// class Person{
//     public $name;

//     function __construct($name){
//         $this->name = $name;
//         echo "The person name \"{$this->name}\" will run first. <br>";
//     }
//     function __destruct(){
//         echo "I will be called at the End of the script";
//     }
// }
// $person1 = new Person("Asad");



// class Person{
//     public $name;
//     public $age;

//     function __construct($name, $age){
//         $this->name = $name;
//         $this->age = $age;
//     }
//     function __destruct(){
//         echo "I'm {$this->name} and {$this->age} years old";
//     }
// }
// $person1 = new Person("Asad", 29);




// class File{
//     private $handle;
//     private $fileName;

//     function __construct($fileName, $mode = 'r'){
//         $this->fileName = $fileName;
//         $this->handle = fopen($fileName, $mode);
//     }
//     function read(){
//         return fread($this->handle, filesize($this->fileName));
//     }
//     function __destruct(){
//         if($this->handle){
//             fclose($this->handle);
//         }
//     }
// }
// $file1 = new File('./test.txt');
// echo $file1->read();



////////////////////// PHP constructor promotion
//////////// you can use this:
// class BankAccount{
//     function __construct(
//         private $accountNumber,
//         private $balance
//     ){

//     }
// }


///////////// instead of writing this:
// class BankAccount{
//     private $accountNumber;
//     private $balance;
//     function __construct($accountNumber, $balance){
//         $this->accountNumber = $accountNumber;
//         $this->balance = $balance;
//     }
// }




//////////////// Typed properties
// class BankAccount{
//     public float $balance = 10.55;
//     function __construct(float $balance){
//         $this->balance = $balance;
//     }
// }
// $account = new BankAccount(22);

// echo "<pre>";
// var_dump($account);

// unset($account->balance);
// var_dump($account->balance);



////////////// Readonly properties
// class User
// {
//     public readonly string $username;

//     public function __construct(string $username)
//     {
//         $this->username = $username;
//         echo $this->username;
//     }
// }
// $user = new User('Asad','Mijan');



/////////////////// PHP inheritance
// class BankAccount{
//     private $balance;

//     function getBalance(){
//         return $this->balance;
//     }

//     function deposit($amount){
//         if($amount > 0){
//             $this->balance += $amount;
//         }else{
//             echo "Deposit should be greater than 0!";
//         }
        
//         return $this;
//     }
// }
// $account = new BankAccount();
// $account->deposit(100);
// echo $account->getBalance(); // 100

// $account->deposit(200);
// echo $account->getBalance(); // 300

// echo "<hr>";

// class SavingAccount extends BankAccount{
//     private $interestRate;

//     function setInterestRate($interestRate){
//         $this->interestRate = $interestRate;
//     }
//     function addInterest(){
//         $interest = $this->interestRate * $this->getBalance();
//         $this->deposit($interest);
//     }
// }
// $savingAccount = new SavingAccount();
// $savingAccount->deposit(500);
// echo $savingAccount->getBalance(); // 500

// $savingAccount->setInterestRate(0.05);
// $savingAccount->addInterest();
// echo $savingAccount->getBalance(); // 525




//////////////// How to Call the Parent Constructor




