<?php

//Class Activity 2 - Question 4
//Jack Lam

    class Stack
    {
        private $stack;
        public function __construct()
        { 
            $this->stack = array();
        }
        public function push($item)
        { 
            $this->stack[count($this->stack)]=$item;
        }

        public function pop()
        {
            $delete_item=array_splice($this->stack,count($this->stack)-1,1);
            return $delete_item[0];
        }

        public function peek()
        {
            $delete_item=array_splice($this->stack,count($this->stack)-1,1);
            return $this->stack[count($this->stack)-1];
        }

        public function is_empty()
        { 
            if(count($this->stack)==0)
            
            return true;
            return false;
        }

        public function size()
        {
            return count($this->stack);
        }

        public function show_all()
        { 
            echo nl2br("--Show All Item(s)--\n");
            for($i=count($this->stack)-1;$i>=0;$i--) echo $this->stack[$i]. nl2br("\n");
        }

        public function __toString()
        {
            //Error
        }
    }

    $stack = new Stack();

    //Check If Stack Is Empty"
    if($stack->is_empty()) echo nl2br("Item is empty.\n");
    else n2br("Item is not empty.\n\n");

    //Add 2 Items
    echo nl2br("\n --Show All After Added Two Items |   Top Is The Latest Pushed Item--\n\n");
    $stack->push("Introductory App Dev Concepts");
    $stack->push("Intermediate App Dev Concepts");

    $stack->show_all();
    echo "There are ". $stack->size() . nl2br(" item(s) in the stack.\n");

    //Add 1 Item
    echo nl2br("\n --Show All After Added 1 Item    |   Top Is The Latest Pushed Item--\n\n");
    $stack->push("Advanced App Dev Concepts");
    $stack->show_all();
    echo "There are ". $stack->size() . nl2br(" item(s) in the stack.\n");

    //Pop test
    echo nl2br("\n --Pop Test   |   1 Item Is Deleted By LIFO--\n");
    $delete_item=$stack->pop();
    echo nl2br("$delete_item is deleted.\n");

    //Peek test
    echo nl2br("\n --Peek Test--\n");
    $delete_item=$stack->pop();
    echo nl2br("$delete_item is last item.\n\n");

    //Show All
    $stack->show_all();
    echo "There are ". $stack->size() . nl2br(" item(s) in the stack.\n");

?>