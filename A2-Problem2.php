<?php

    class Employee
    {
        protected $first_name;
        protected $last_name;
        protected $salary;

        public function __construct($first_name, $last_name, $salary)
        {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->salary = $salary;
        }
        public function __toString()
        { 
            return $this->first_name . " " . $this->last_name; 
        }
    }

    class SoftwareDeveloper extends Employee
    {
        public function __construct($first_name, $last_name, $salary,$proglang)
        {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->salary = $salary;
            $this->proglang = $proglang;
        }
    }

    class AgileCoach extends Employee
    {
        public function __construct($first_name, $last_name, $salary,$employees)
        {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->salary = $salary;
            $this->employees = $employees;
        }

        public function add($employee)
        {
            $this->employees[count($this->employees)]=$employee;
        }

        public function remove($first_name,$last_name)
        {
            for($i=0;$i<count($this->employees);$i++)
            {
                if($this->employees[$i]->first_name == $first_name && $this->employees[$i]->last_name==$last_name) break;
            }
            $delete_item=array_splice($this->employees,$i,1);
            return $delete_item[0];
        }
    
        public function search($first_name,$last_name)
        {
            foreach($this->employees as $x)
            {
                if($x->first_name == $first_name && $x->last_name == $last_name) return true;
            }
            return false;
        }

        public function show_all()
        {
            foreach($this->employees as $x)
            {
                echo "$x->first_name $x->last_name".nl2br("\n");    
            }
        }
    }

    $sft_dev_one = new SoftwareDeveloper("Alfredo", "Boyle", 50000, "C#");
    $sft_dev_two = new SoftwareDeveloper("Malik", "Martin", 55000, "JavaScript");
    $sft_dev_three = new SoftwareDeveloper("Livia", "Martin", 75000, "Kotlin");
    $agile_coach = new AgileCoach("Lillian", "Cunningham", 100000, array($sft_dev_one, $sft_dev_two)); 
    
    echo $sft_dev_one . nl2br("\n");
    echo $sft_dev_two  . nl2br("\n");
    echo $sft_dev_three  . nl2br("\n");
    echo $agile_coach  . nl2br("\n");

    //Show All Current Employees
    echo nl2br("\n--Show All Current Employees--\n");
    $agile_coach->show_all();
    
    //Add Employees
    echo nl2br("\n--Added Livia Mertin--\n");
    $agile_coach->add($sft_dev_three);

    //Show All Current Employees
    echo nl2br("\n--Show All Current Employees--\n");
    $agile_coach->show_all();

    //Remove Alfredo Boyle For Testing
    $delete_sft_dev = $agile_coach->remove("Alfredo","Boyle");
    echo nl2br("\n")."Deleted $delete_sft_dev". nl2br("\n");
    

    //Show All After Deleted Alfredo Boyle
    echo nl2br("\n--Show All After Deleted Alfredo Boyle--\n");
    $agile_coach->show_all();

    //Search Employees
    echo nl2br("\n--Search Results--\n");
    if($agile_coach->search("Alfredo","Boyle")) echo nl2br("Alfredo Boyle - Found\n");
    else echo nl2br("Alfredo Boyle - Not Found\n");
    
    if($agile_coach->search("Livia","Martin")) echo nl2br("Livia Martin - Found\n");
    else echo nl2br("Livia Martin - Not Found\n");

    //Show All Employees
    echo nl2br("\n--Show All--\n");
    $agile_coach->show_all();

    //Expected Output:
    //Malik Martin
    //Livia Martin
    //Alfredo Boyle Not Found
    //Livia Martin Found
?>