<?php
namespace App\Http\Models;

class FakeDB {

    public function books()
    {
        $books = [];
        
        $csv = "type,title,isbn,price,authors
        ExclusiveBook,Introduction to Python,ZAB,25,Guido van rossum
        UsedBook,The Art of Computer Programming,USY,140,Donalth Knuth
        NewBook,JavaScript: The Good Parts,1AB,40,Douglas Crockford
        UsedBook,The Art of Computer Programming,USY,140,Donalth Knuth
        UsedBook,The C Programming Language,AAA,30,Dennis M. Ritchie|Brian W. Kernighan
        NewBook,The C Programming Language,AAA,30,Dennis M. Ritchie|Brian W. Kernighan";

        $csv = explode('        ',$csv);

        unset($csv[0]);

        foreach ($csv as $key => $value) {
            $array = explode(',', $value);

            array_push($books, 
                array(
                    'type' => $array[0],
                    'title' => $array[1],
                    'isbn' => $array[2],
                    'price' => $array[3],
                    'authors' => substr(str_replace('|',', ',$array[4]), 0, -1)
                    ));
        }
    
        return $books;
    }

}