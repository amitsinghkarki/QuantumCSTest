<?php

/**
 * Title: Single linked list
 * Description: Implementation of a single linked list in PHP
 * @author Sameer Borate | codediesel.com
 * @version 1.0.1 16th August 2012
 */

class ListNode
{
    /* Data to hold */
    public $data;

    /* Link to next node */
    public $next;

    /* Node constructor */
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function readNode()
    {
        return $this->data;
    }
}

class LinkList
{
    /* Link to the first node in the list */
    private $firstNode;

    /* Link to the last node in the list */
    private $lastNode;

    /* Total nodes in the list */
    private $count;

    /* List constructor */
    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

    public function isEmpty()
    {
        return ($this->firstNode == null);
    }

    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;

        /* If this is the first node inserted in the list
        then set the lastNode pointer to it.
         */
        if ($this->lastNode == null) {
            $this->lastNode = &$link;
        }

        $this->count++;
    }

    public function insertLast($data)
    {
        if ($this->firstNode != null) {
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $link->next = null;
            $this->lastNode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;
        if ($this->firstNode != null) {
            $this->count--;
        }

        return $temp;
    }

    public function deleteLastNode()
    {
        if ($this->firstNode != null) {
            if ($this->firstNode->next == null) {
                $this->firstNode = null;
                $this->count--;
            } else {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;

                while ($currentNode->next != null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
                $this->count--;
            }
        }
    }

    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        while ($current->data != $key) {
            if ($current->next == null) {
                return null;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstNode) {
            if ($this->count == 1) {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        } else {
            if ($this->lastNode == $current) {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    public function find($key)
    {
        $current = $this->firstNode;
        while ($current->data != $key) {
            if ($current->next == null) {
                return null;
            } else {
                $current = $current->next;
            }

        }
        return $current;
    }

    public function readNode($nodePos)
    {
        if ($nodePos <= $this->count) {
            $current = $this->firstNode;
            $pos = 1;
            while ($pos != $nodePos) {
                if ($current->next == null) {
                    return null;
                } else {
                    $current = $current->next;
                }

                $pos++;
            }
            return $current->data;
        } else {
            return null;
        }

    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != null) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }

    public function reverseList()
    {
        if ($this->firstNode != null) {
            if ($this->firstNode->next != null) {
                $current = $this->firstNode;
                $new = null;

                while ($current != null) {
                    $temp = $current->next;
                    $current->next = $new;
                    $new = $current;
                    $current = $temp;
                }
                $this->firstNode = $new;
            }
        }
    }

    public function swapElementsPairWise() //Only created this function rest is used from Sameer Borate | codediesel.com

    {
        if ($this->firstNode != null) {
            if ($this->firstNode->next != null) {
                $current = $this->firstNode;
                while ($current != null && $current->next != null) {
                    $temp = $current->data; //save to temp variable
                    $current->data = $current->next->data; //swap first value with second in pair
                    $current->next->data = $temp; //store first value back to second element from temp
                    $current = $current->next->next; //move current to next pair
                }
            }
        }
    }
}
/**
 * Prints Test results
 *
 * @param string $title Test title.
 * @param array $test_list An array for testing against.
 *
 * @return NULL
 */
function test($title, $test_list)
{
    echo '<pre>';
    echo '</br>' . $title . ' Test </br>';
    print_r($test_list->readList());
    $test_list->swapElementsPairWise();
    echo '</br>' . $title . ' Result </br></br>';
    print_r($test_list->readList());
    echo '</pre>';

}

//First Test
$first_list = new LinkList();
for ($i = 1; $i <= 6; $i++) {
    $first_list->insertLast($i);
}
test('First', $first_list);

//Second Test
$second_list = new LinkList();
for ($i = 1; $i <= 5; $i++) {
    $second_list->insertLast($i);
}
test('Second', $second_list);

//Third Test
$third_list = new LinkList();
for ($i = 1; $i <= 1; $i++) {
    $third_list->insertLast($i);
}
test('Third', $third_list);
